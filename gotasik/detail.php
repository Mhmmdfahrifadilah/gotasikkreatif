<!DOCTYPE html>
<?php
require_once __DIR__ . "/db.php";

// =========================================================
// Ambil ID produk dari URL (?id=20). Default ke produk pertama jika tidak ada.
// =========================================================
$productId = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($productId <= 0) {
    $fallback = $db->query("SELECT id FROM products WHERE is_active = 1 ORDER BY id ASC LIMIT 1");
    if ($fallback && $fallback->num_rows > 0) {
        $productId = (int) $fallback->fetch_assoc()['id'];
    }
}

// =========================================================
// Query data produk + data perajin (artisans)
// =========================================================
$stmt = $db->prepare("
    SELECT 
        p.id, p.artisan_id, p.category_id, p.name, p.slug, p.description,
        p.price, p.stock, p.sku, p.image_url, p.weight_kg, p.is_active,
        a.shop_name, a.logo_url, a.description AS artisan_description, a.rating
    FROM products p
    LEFT JOIN artisans a ON a.id = p.artisan_id
    WHERE p.id = ? AND p.is_active = 1
    LIMIT 1
");
$stmt->bind_param("i", $productId);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();
$stmt->close();

// Jika produk tidak ditemukan, hentikan dengan pesan sederhana (layout tetap, tanpa data palsu)
if (!$product) {
    http_response_code(404);
    echo "<!DOCTYPE html><html><body><h1>Produk tidak ditemukan.</h1></body></html>";
    exit;
}

// Helper format harga
function formatRupiah($value) {
    return "Rp " . number_format((float) $value, 0, ',', '.');
}

// Path gambar utama (fallback ke placeholder jika kosong)
$mainImage = !empty($product['image_url']) ? $product['image_url'] : 'https://via.placeholder.com/600x500?text=No+Image';

// =========================================================
// Query rekomendasi produk lain (kategori sama, exclude produk ini sendiri)
// =========================================================
$recoStmt = $db->prepare("
    SELECT p.id, p.name, p.slug, p.price, p.image_url, a.shop_name
    FROM products p
    LEFT JOIN artisans a ON a.id = p.artisan_id
    WHERE p.is_active = 1 AND p.id != ?
    ORDER BY p.created_at DESC
    LIMIT 4
");
$recoStmt->bind_param("i", $productId);
$recoStmt->execute();
$recoResult = $recoStmt->get_result();
$recommendations = $recoResult->fetch_all(MYSQLI_ASSOC);
$recoStmt->close();
?>
<html class="light" lang="id"><head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title><?= htmlspecialchars($product['name']) ?> - TasikKreatifGo</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&amp;family=Work+Sans:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "inverse-primary": "#bdc2ff",
                    "outline": "#767683",
                    "on-surface": "#071e27",
                    "inverse-surface": "#1e333c",
                    "inverse-on-surface": "#dff4ff",
                    "tertiary-fixed-dim": "#c6c8b5",
                    "on-surface-variant": "#454652",
                    "on-tertiary-fixed": "#1a1d11",
                    "error": "#ba1a1a",
                    "on-primary-container": "#8690ee",
                    "secondary-container": "#fe5e2f",
                    "on-secondary-fixed": "#3b0900",
                    "surface-bright": "#f3faff",
                    "on-primary-fixed-variant": "#343d96",
                    "on-primary": "#ffffff",
                    "primary-fixed-dim": "#bdc2ff",
                    "primary": "#000666",
                    "on-tertiary": "#ffffff",
                    "secondary-fixed": "#ffdbd1",
                    "surface-container": "#dbf1fe",
                    "tertiary": "#191c10",
                    "surface": "#f3faff",
                    "primary-container": "#1a237e",
                    "surface-container-low": "#e6f6ff",
                    "on-error-container": "#93000a",
                    "on-secondary-fixed-variant": "#872000",
                    "surface-container-high": "#d5ecf8",
                    "on-tertiary-fixed-variant": "#45483a",
                    "surface-tint": "#4c56af",
                    "surface-container-highest": "#cfe6f2",
                    "on-secondary-container": "#581200",
                    "primary-fixed": "#e0e0ff",
                    "secondary": "#b12d00",
                    "background": "#f3faff",
                    "secondary-fixed-dim": "#ffb5a0",
                    "on-background": "#071e27",
                    "surface-variant": "#cfe6f2",
                    "tertiary-fixed": "#e2e4d1",
                    "surface-container-lowest": "#ffffff",
                    "on-primary-fixed": "#000767",
                    "error-container": "#ffdad6",
                    "surface-dim": "#c7dde9",
                    "outline-variant": "#c6c5d4",
                    "on-secondary": "#ffffff",
                    "on-error": "#ffffff",
                    "tertiary-container": "#2e3124",
                    "on-tertiary-container": "#969988"
            },
            "borderRadius": {
                    "DEFAULT": "0.125rem",
                    "lg": "0.25rem",
                    "xl": "0.5rem",
                    "full": "0.75rem"
            },
            "spacing": {
                    "margin-desktop": "48px",
                    "margin-mobile": "16px",
                    "container-max": "1200px",
                    "base": "8px",
                    "gutter": "24px"
            },
            "fontFamily": {
                    "label-sm": ["Work Sans"],
                    "label-md": ["Work Sans"],
                    "headline-md": ["Manrope"],
                    "headline-lg-mobile": ["Manrope"],
                    "headline-xl": ["Manrope"],
                    "headline-lg": ["Manrope"],
                    "body-md": ["Work Sans"],
                    "body-lg": ["Work Sans"]
            },
            "fontSize": {
                    "label-sm": ["12px", {"lineHeight": "16px", "fontWeight": "500"}],
                    "label-md": ["14px", {"lineHeight": "20px", "letterSpacing": "0.05em", "fontWeight": "600"}],
                    "headline-md": ["24px", {"lineHeight": "32px", "fontWeight": "600"}],
                    "headline-lg-mobile": ["28px", {"lineHeight": "36px", "fontWeight": "700"}],
                    "headline-xl": ["48px", {"lineHeight": "56px", "letterSpacing": "-0.02em", "fontWeight": "800"}],
                    "headline-lg": ["32px", {"lineHeight": "40px", "letterSpacing": "-0.01em", "fontWeight": "700"}],
                    "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                    "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}]
            }
          },
        },
      }
    </script>
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            display: inline-block;
            line-height: 1;
        }
        .glass-nav {
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
        .batik-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M30 0l15 15-15 15-15-15zM0 30l15 15-15 15-15-15zM60 30l15 15-15 15-15-15zM30 60l15 15-15 15-15-15z' fill='%23000666' fill-opacity='0.03' fill-rule='evenodd'/%3E%3C/svg%3E");
        }
    </style>
</head>
<body class="bg-background text-on-surface batik-pattern min-h-screen font-body-md">
<!-- TopAppBar -->
<header class="fixed top-0 left-0 w-full z-50 bg-surface/80 glass-nav border-b border-outline-variant/30">
<div class="flex justify-between items-center w-full px-margin-desktop h-20 max-w-container-max mx-auto">
<div class="flex items-center gap-8">
<a class="font-headline-md text-headline-md font-bold text-primary tracking-tight" href="#">TasikKreatifGo</a>
<nav class="hidden md:flex gap-6">
<a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors" href="#">Catalog</a>
<a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors" href="#">Artisans</a>
<a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors" href="#">Heritage</a>
<a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors" href="#">Community</a>
</nav>
</div>
<div class="flex items-center gap-4">
<button class="p-2 hover:bg-surface-container-low rounded-full transition-all active:scale-95">
<span class="material-symbols-outlined text-primary">notifications</span>
</button>
<button class="p-2 hover:bg-surface-container-low rounded-full transition-all active:scale-95">
<span class="material-symbols-outlined text-primary">account_circle</span>
</button>
</div>
</div>
</header>
<main class="pt-28 pb-20 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
<!-- Breadcrumb -->
<nav class="mb-8 flex items-center gap-2 text-on-surface-variant font-label-sm">
<a class="hover:text-primary" href="#">Home</a>
<span class="material-symbols-outlined text-[14px]">chevron_right</span>
<a class="hover:text-primary" href="#">Catalog</a>
<span class="material-symbols-outlined text-[14px]">chevron_right</span>
<span class="text-primary font-bold"><?= htmlspecialchars($product['name']) ?></span>
</nav>
<div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
<!-- Left: Product Images (Bento-style layout for premium feel) -->
<div class="lg:col-span-7 grid grid-cols-4 gap-4">
<div class="col-span-4 rounded-xl overflow-hidden bg-white border border-outline-variant/20 shadow-sm transition-shadow hover:shadow-lg">
<img class="w-full h-[500px] object-cover" alt="<?= htmlspecialchars($product['name']) ?>" src="<?= htmlspecialchars($mainImage) ?>">
</div>
</div>
<!-- Right: Product Info -->
<div class="lg:col-span-5 flex flex-col gap-6">
<div>
<div class="flex items-center gap-2 mb-2">
<span class="bg-secondary-fixed text-on-secondary-fixed px-3 py-1 rounded-full font-label-sm uppercase tracking-wider">Verified Local</span>
<span class="text-on-surface-variant font-label-sm">SKU: <?= htmlspecialchars($product['sku']) ?></span>
</div>
<h1 class="font-headline-lg text-headline-lg text-primary mb-2"><?= htmlspecialchars($product['name']) ?></h1>
<div class="flex items-baseline gap-4">
<span class="font-headline-md text-headline-md text-secondary"><?= formatRupiah($product['price']) ?></span>
</div>
</div>
<div class="h-[1px] bg-outline-variant/30 w-full"></div>
<!-- Artisan Profile -->
<div class="flex items-center gap-4 p-4 bg-surface-container-low rounded-xl">
<img class="w-12 h-12 rounded-full object-cover border-2 border-primary/20" alt="<?= htmlspecialchars($product['shop_name'] ?? 'Perajin') ?>" src="<?= htmlspecialchars($product['logo_url'] ?: 'https://via.placeholder.com/100?text=Logo') ?>">
<div>
<p class="font-label-md text-primary"><?= htmlspecialchars($product['shop_name'] ?? 'Perajin Lokal') ?></p>
<p class="text-on-surface-variant text-[12px] flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">location_on</span>
                            Tasikmalaya, Jawa Barat
                        </p>
</div>
<button class="ml-auto text-primary font-label-md hover:underline">Lihat Toko</button>
</div>
<!-- Tabs/Accordion for Depth -->
<div class="space-y-4">
<details class="group" open="">
<summary class="flex justify-between items-center cursor-pointer list-none font-label-md text-primary py-2 border-b border-outline-variant/20">
<span>Deskripsi Produk</span>
<span class="material-symbols-outlined transition-transform group-open:rotate-180">expand_more</span>
</summary>
<div class="py-4 text-on-surface-variant font-body-md leading-relaxed">
                            <?= nl2br(htmlspecialchars($product['description'])) ?>
                        </div>
</details>
<details class="group">
<summary class="flex justify-between items-center cursor-pointer list-none font-label-md text-primary py-2 border-b border-outline-variant/20">
<span>Spesifikasi Produk</span>
<span class="material-symbols-outlined transition-transform group-open:rotate-180">expand_more</span>
</summary>
<div class="py-4 text-on-surface-variant font-body-md grid grid-cols-2 gap-4">
<div>
<p class="text-[12px] uppercase text-outline">Harga</p>
<p class="font-bold"><?= formatRupiah($product['price']) ?></p>
</div>
<div>
<p class="text-[12px] uppercase text-outline">Stok</p>
<p class="font-bold"><?= (int) $product['stock'] ?> pcs</p>
</div>
<div>
<p class="text-[12px] uppercase text-outline">SKU</p>
<p class="font-bold"><?= htmlspecialchars($product['sku']) ?></p>
</div>
<div>
<p class="text-[12px] uppercase text-outline">Berat</p>
<p class="font-bold"><?= htmlspecialchars($product['weight_kg']) ?> kg</p>
</div>
</div>
</details>
</div>
<!-- CTA Actions -->
<div class="mt-4 flex flex-col gap-3">
<div class="flex gap-4">
<div class="flex items-center border border-outline rounded-xl px-4 py-2 bg-white">
<button class="text-primary hover:scale-110" onclick="decrement()">-</button>
<input class="w-12 text-center border-none focus:ring-0 font-bold" id="qty" readonly="" type="number" value="1">
<button class="text-primary hover:scale-110" onclick="increment()">+</button>
</div>
<a href="keranjang.php?add=<?= (int) $product['id'] ?>" class="flex-1 bg-primary text-on-primary font-label-md py-4 rounded-xl flex items-center justify-center gap-2 active:scale-95 transition-transform hover:bg-primary-container shadow-md">
<span class="material-symbols-outlined">shopping_basket</span>
                            Tambah ke Keranjang
                        </a>
</div>
<a href="pembayaran.php?add=<?= (int) $product['id'] ?>" class="w-full border-2 border-secondary text-secondary font-label-md py-4 rounded-xl flex items-center justify-center gap-2 hover:bg-secondary/5 transition-colors active:scale-95">
<span class="material-symbols-outlined">payments</span>
                        Beli Sekarang
                    </a>
</div>
<div class="flex items-center gap-6 mt-2">
<button class="flex items-center gap-1 text-on-surface-variant font-label-sm hover:text-primary">
<span class="material-symbols-outlined text-[18px]">share</span> Share
                    </button>
<button class="flex items-center gap-1 text-on-surface-variant font-label-sm hover:text-primary">
<span class="material-symbols-outlined text-[18px]">favorite</span> Wishlist
                    </button>
<button class="flex items-center gap-1 text-on-surface-variant font-label-sm hover:text-primary">
<span class="material-symbols-outlined text-[18px]">chat</span> Tanya Perajin
                    </button>
</div>
</div>
</div>
<!-- Recommendations Section -->
<section class="mt-24">
<div class="flex justify-between items-end mb-8">
<div>
<h2 class="font-headline-lg text-headline-lg text-primary">Rekomendasi Serupa</h2>
<p class="text-on-surface-variant font-body-md mt-1">Koleksi pilihan dari perajin Tasikmalaya lainnya.</p>
</div>
<a class="text-primary font-label-md flex items-center gap-1 hover:underline" href="#">
                    Lihat Semua <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
</a>
</div>
<div class="grid grid-cols-2 md:grid-cols-4 gap-6">
<?php foreach ($recommendations as $reco): ?>
<!-- Product Card -->
<a href="detail_produk.php?id=<?= (int) $reco['id'] ?>" class="group bg-white rounded-xl overflow-hidden border border-[#ECEFF1] transition-all duration-300 hover:shadow-[0px_8px_24px_rgba(26,35,126,0.08)]">
<div class="aspect-square overflow-hidden relative">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" alt="<?= htmlspecialchars($reco['name']) ?>" src="<?= htmlspecialchars($reco['image_url'] ?: 'https://via.placeholder.com/400x400?text=No+Image') ?>">
</div>
<div class="p-4">
<h3 class="font-headline-md text-[16px] text-primary truncate"><?= htmlspecialchars($reco['name']) ?></h3>
<div class="flex justify-between items-center mt-2">
<span class="text-on-surface-variant font-label-sm"><?= htmlspecialchars($reco['shop_name'] ?? '-') ?></span>
<span class="text-secondary font-bold font-label-md"><?= formatRupiah($reco['price']) ?></span>
</div>
</div>
</a>
<?php endforeach; ?>
</div>
</section>
</main>
<!-- BottomNavBar (Mobile) -->
<nav class="fixed bottom-0 left-0 w-full z-50 flex justify-around items-center px-4 py-3 md:hidden bg-surface/90 glass-nav border-t border-outline-variant/20 shadow-lg rounded-t-xl">
<button class="flex flex-col items-center justify-center text-on-surface-variant active:bg-surface-variant/50 transition-all duration-150 active:scale-90">
<span class="material-symbols-outlined">home</span>
<span class="font-label-sm text-label-sm">Home</span>
</button>
<button class="flex flex-col items-center justify-center text-on-surface-variant active:bg-surface-variant/50 transition-all duration-150 active:scale-90">
<span class="material-symbols-outlined">search</span>
<span class="font-label-sm text-label-sm">Search</span>
</button>
<button class="flex flex-col items-center justify-center text-on-surface-variant active:bg-surface-variant/50 transition-all duration-150 active:scale-90">
<span class="material-symbols-outlined">shopping_basket</span>
<span class="font-label-sm text-label-sm">Cart</span>
</button>
<button class="flex flex-col items-center justify-center text-on-surface-variant active:bg-surface-variant/50 transition-all duration-150 active:scale-90">
<span class="material-symbols-outlined">person</span>
<span class="font-label-sm text-label-sm">Profile</span>
</button>
</nav>
<!-- Footer (Desktop Only) -->
<footer class="hidden md:block py-12 bg-primary text-on-primary mt-12 border-t border-outline-variant/10">
<div class="max-w-container-max mx-auto px-margin-desktop grid grid-cols-4 gap-12">
<div class="col-span-1">
<h4 class="font-headline-md text-[20px] mb-4">TasikKreatifGo</h4>
<p class="text-on-primary/70 font-body-md">Menghubungkan perajin lokal Tasikmalaya dengan dunia melalui kurasi produk berkualitas dan narasi budaya yang mendalam.</p>
</div>
<div class="col-span-1">
<h5 class="font-label-md mb-4 text-secondary-fixed">Tentang Kami</h5>
<ul class="space-y-2 text-on-primary/70">
<li><a class="hover:text-white" href="#">Visi &amp; Misi</a></li>
<li><a class="hover:text-white" href="#">Daftar Perajin</a></li>
<li><a class="hover:text-white" href="#">Proses Produksi</a></li>
</ul>
</div>
<div class="col-span-1">
<h5 class="font-label-md mb-4 text-secondary-fixed">Bantuan</h5>
<ul class="space-y-2 text-on-primary/70">
<li><a class="hover:text-white" href="#">Pengiriman</a></li>
<li><a class="hover:text-white" href="#">Panduan Ukuran</a></li>
<li><a class="hover:text-white" href="#">Hubungi Kami</a></li>
</ul>
</div>
<div class="col-span-1">
<h5 class="font-label-md mb-4 text-secondary-fixed">Ikuti Kami</h5>
<div class="flex gap-4">
<span class="material-symbols-outlined p-2 border border-on-primary/20 rounded-full hover:bg-white/10 cursor-pointer">face_nod</span>
<span class="material-symbols-outlined p-2 border border-on-primary/20 rounded-full hover:bg-white/10 cursor-pointer">photo_camera</span>
<span class="material-symbols-outlined p-2 border border-on-primary/20 rounded-full hover:bg-white/10 cursor-pointer">alternate_email</span>
</div>
</div>
</div>
<div class="max-w-container-max mx-auto px-margin-desktop mt-12 pt-8 border-t border-on-primary/10 text-center text-on-primary/50 font-label-sm">
            © 2024 TasikKreatifGo. Seluruh hak cipta dilindungi. Bangga Buatan Indonesia.
        </div>
</footer>
<script>
        const qtyInput = document.getElementById('qty');
        function increment() {
            qtyInput.value = parseInt(qtyInput.value) + 1;
        }
        function decrement() {
            if (parseInt(qtyInput.value) > 1) {
                qtyInput.value = parseInt(qtyInput.value) - 1;
            }
        }

        // Add scroll animation to navbar
        window.addEventListener('scroll', () => {
            const header = document.querySelector('header');
            if (window.scrollY > 20) {
                header.classList.add('shadow-md');
            } else {
                header.classList.remove('shadow-md');
            }
        });
    </script>
</body></html>