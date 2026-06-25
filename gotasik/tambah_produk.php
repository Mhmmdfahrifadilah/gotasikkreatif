<?php require_once __DIR__ . "/db.php"; ?>
<?php
session_start();
// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
header('Location: login.php');
 exit;
}

$product_error = '';
$product_success = '';
$user_id = $_SESSION['user_id'];

// Get artisan info for user
$stmt = $db->prepare('SELECT id FROM artisans WHERE user_id = ? LIMIT 1');
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();
$artisan = $result->fetch_assoc();
$stmt->close();

if (!$artisan) {
    // If no artisan profile, create one
 $s = $db->prepare('SELECT full_name FROM users WHERE id = ? LIMIT 1');
 $s->bind_param('i', $user_id);
 $s->execute();
 $r = $s->get_result();
 $user = $r->fetch_assoc();
 $s->close();
    $shop_name = $user['full_name'] . ' Shop';
    $ver = 'pending';
    $insert = $db->prepare('INSERT INTO artisans (user_id, shop_name, verification_status, created_at) VALUES (?, ?, ?, NOW())');
    $insert->bind_param('iss', $user_id, $shop_name, $ver);
    $insert->execute();
    $artisan_id = $insert->insert_id;
    $insert->close();
} else {
    $artisan_id = $artisan['id'];
}

// Handle product creation
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_product'])) {
    $name = isset($_POST['product_name']) ? trim($_POST['product_name']) : '';
    $category_id = isset($_POST['category_id']) ? (int)$_POST['category_id'] : 0;
    $description = isset($_POST['description']) ? trim($_POST['description']) : '';
    $price = isset($_POST['price']) ? (float)$_POST['price'] : 0;
    $stock = isset($_POST['stock']) ? (int)$_POST['stock'] : 0;
    $sku = isset($_POST['sku']) ? trim($_POST['sku']) : '';
    $sku_was_auto = ($sku === '');
    if ($sku_was_auto) {
        $sku = 'SKU' . strtoupper(substr(bin2hex(random_bytes(4)), 0, 8));
    }
    $weight_kg = isset($_POST['weight_kg']) ? (float)$_POST['weight_kg'] : 0;
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name), '-'));
    $is_active = isset($_POST['is_active']) ? 1 : 0;

    $image_url = '';
    $upload_error = '';

    // Handle image file upload
    if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] !== UPLOAD_ERR_NO_FILE) {
        $file = $_FILES['product_image'];

        if ($file['error'] !== UPLOAD_ERR_OK) {
            $upload_error = 'Gagal mengunggah gambar (kode error: ' . $file['error'] . ').';
        } else {
            $allowed_types = ['image/jpeg' => 'jpg', 'image/png' => 'png', 'image/webp' => 'webp', 'image/gif' => 'gif'];
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $file['tmp_name']);
            finfo_close($finfo);

            $max_size = 5 * 1024 * 1024; // 5MB

            if (!isset($allowed_types[$mime])) {
                $upload_error = 'Tipe file tidak didukung. Gunakan JPG, PNG, WEBP, atau GIF.';
            } elseif ($file['size'] > $max_size) {
                $upload_error = 'Ukuran file maksimal 5MB.';
            } else {
                $ext = $allowed_types[$mime];
                $upload_dir = __DIR__ . '/uploads/products/';
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0755, true);
                }
                $new_filename = 'prod_' . bin2hex(random_bytes(8)) . '_' . time() . '.' . $ext;
                $dest_path = $upload_dir . $new_filename;

                if (move_uploaded_file($file['tmp_name'], $dest_path)) {
                    $image_url = 'uploads/products/' . $new_filename;
                } else {
                    $upload_error = 'Gagal menyimpan file gambar ke server.';
                }
            }
        }
    }

    if ($name === '' || $category_id <= 0 || $price <= 0 || $stock < 0) {
        $product_error = 'Nama, kategori, harga, dan stok wajib diisi dengan benar.';
    } elseif ($upload_error !== '') {
        $product_error = $upload_error;
    } else {
        $insert_prod = $db->prepare('INSERT INTO products (artisan_id, category_id, name, slug, description, price, stock,sku, image_url, weight_kg, is_active, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())');
        if ($insert_prod) {
            $insert_prod->bind_param('iisssdddsdi', $artisan_id, $category_id, $name, $slug, $description, $price, $stock, $sku, $image_url, $weight_kg, $is_active);

            $max_attempts = $sku_was_auto ? 5 : 1;
            $attempt = 0;
            $inserted = false;

            while ($attempt < $max_attempts && !$inserted) {
                $attempt++;
                try {
                    if ($insert_prod->execute()) {
                        $inserted = true;
                        $product_success = 'Produk berhasil ditambahkan! Silakan tambah produk lainnya atau kembali ke inventaris.';
                    } else {
                        $product_error = 'Gagal menyimpan produk: ' . $insert_prod->error;
                        break;
                    }
                } catch (mysqli_sql_exception $e) {
                    $msg = $e->getMessage();
                    if (strpos($msg, 'sku') !== false) {
                        if ($sku_was_auto && $attempt < $max_attempts) {
                            // Regenerate and retry silently
                            $sku = 'SKU-' . strtoupper(substr(bin2hex(random_bytes(4)), 0, 8));
                            $insert_prod->bind_param('iisssdddsdi', $artisan_id, $category_id, $name, $slug, $description, $price, $stock, $sku, $image_url, $weight_kg, $is_active);
                            continue;
                        }
                        $product_error = 'SKU "' . htmlspecialchars($sku) . '" sudah digunakan oleh produk lain. Silakan gunakan SKU yang berbeda atau kosongkan untuk membuat otomatis.';
                    } elseif (strpos($msg, 'slug') !== false) {
                        // Make slug unique by appending a short random suffix and retry
                        if ($attempt < $max_attempts) {
                            $slug = $slug . '-' . strtolower(substr(bin2hex(random_bytes(2)), 0, 4));
                            $insert_prod->bind_param('iisssdddsdi', $artisan_id, $category_id, $name, $slug, $description, $price, $stock, $sku, $image_url, $weight_kg, $is_active);
                            $max_attempts = max($max_attempts, $attempt + 1);
                            continue;
                        }
                        $product_error = 'Produk dengan nama yang sama sudah ada. Silakan gunakan nama yang berbeda.';
                    } else {
                        $product_error = 'Gagal menyimpan produk: data duplikat terdeteksi.';
                    }
                    break;
                }
            }
            $insert_prod->close();
        } else {
            $product_error = 'Terjadi kesalahan saat mempersiapkan query.';
        }
    }
}

// Fetch all categories for the form
$categories = [];
$cat_res = $db->query('SELECT id, name FROM categories ORDER BY name');
if ($cat_res) {
    while ($row = $cat_res->fetch_assoc()) {
        $categories[] = $row;
    }
    $cat_res->free();
}
?>
<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Tambah Produk - TasikKreatifGo</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
</head>
<body class="bg-surface font-body-md text-on-surface">
<div class="min-h-screen flex items-center justify-center px-4 py-8">
    <div class="w-full max-w-2xl bg-white rounded-2xl shadow-xl border border-outline-variant/20 p-8">
        <div class="mb-8">
            <a href="kelola.php" class="text-primary font-label-md flex items-center gap-2 mb-4">
                <span class="material-symbols-outlined">arrow_back</span>
                Kembali ke Inventaris
            </a>
            <h1 class="font-headline-lg text-primary">Tambah Produk Baru</h1>
            <p class="text-on-surface-variant">Isi detail produk Anda untuk ditampilkan di katalog</p>
        </div>

        <?php if (!empty($product_error)): ?>
            <div class="mb-6 p-4 bg-red-50 text-red-800 rounded-lg border border-red-200"><?= htmlspecialchars($product_error) ?></div>
        <?php endif; ?>
        
        <?php if (!empty($product_success)): ?>
            <div class="mb-6 p-4 bg-green-50 text-green-800 rounded-lg border border-green-200"><?= htmlspecialchars($product_success) ?></div>
        <?php endif; ?>

        <form method="post" enctype="multipart/form-data" class="space-y-6">
            <input type="hidden" name="add_product" value="1">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block font-label-md text-on-surface mb-2">Nama Produk <span class="text-error">*</span></label>
                    <input type="text" name="product_name" required class="w-full px-4 py-3 border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all" placeholder="Contoh: Tas Anyaman Bambu Premium">
                </div>
                
                <div>
                    <label class="block font-label-md text-on-surface mb-2">Kategori <span class="text-error">*</span></label>
                    <select name="category_id" required class="w-full px-4 py-3 border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all appearance-none">
                        <option value="">-- Pilih Kategori --</option>
                        <?php foreach ($categories as $cat): ?>
                            <option value="<?= $cat['id'] ?>"><?= htmlspecialchars($cat['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            
            <div>
                <label class="block font-label-md text-on-surface mb-2">Deskripsi</label>
                <textarea name="description" rows="4" class="w-full px-4 py-3 border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all" placeholder="Jelaskan detail, material, ukuran, dan keunikan produk Anda..."></textarea>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block font-label-md text-on-surface mb-2">Harga (Rp) <span class="text-error">*</span></label>
                    <input type="number" name="price" required min="0" step="1000" class="w-full px-4 py-3 border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all" placeholder="150000">
                </div>
                
                <div>
                    <label class="block font-label-md text-on-surface mb-2">Stok (pcs) <span class="text-error">*</span></label>
                    <input type="number" name="stock" required min="0" class="w-full px-4 py-3 border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all" placeholder="10">
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block font-label-md text-on-surface mb-2">SKU (Kode Produk)</label>
                    <input type="text" name="sku" class="w-full px-4 py-3 border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all" placeholder="Contoh: TSK-BAG-001">
                </div>
                
                <div>
                    <label class="block font-label-md text-on-surface mb-2">Berat (kg)</label>
                    <input type="number" name="weight_kg" min="0" step="0.1" class="w-full px-4 py-3 border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all" placeholder="0.5">
                </div>
            </div>
            
            <div>
                <label class="block font-label-md text-on-surface mb-2">Foto Produk</label>
                <input type="file" name="product_image" accept="image/jpeg,image/png,image/webp,image/gif" class="w-full px-4 py-3 border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-primary/10 file:text-primary file:font-label-md file:cursor-pointer cursor-pointer">
                <p class="text-xs text-on-surface-variant mt-1">Format yang didukung: JPG, PNG, WEBP, GIF. Maksimal 5MB.</p>
            </div>
            
            <div class="flex items-center gap-3 p-4 bg-surface-container rounded-lg">
                <input type="checkbox" id="is_active" name="is_active" value="1" checked class="rounded border-outline-variant cursor-pointer">
                <label for="is_active" class="font-label-md text-on-surface cursor-pointer">Produk Aktif (Tampilkan di katalog segera)</label>
            </div>
            
            <div class="flex gap-3 justify-end pt-6 border-t border-outline-variant/20">
                <a href="kelola.php" class="px-6 py-3 border border-outline-variant text-on-surface rounded-lg font-label-md hover:bg-surface-variant/50 transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-6 py-3 bg-primary text-on-primary rounded-lg font-label-md hover:opacity-90 active:scale-95 transition-all">
                    Simpan Produk
                </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>