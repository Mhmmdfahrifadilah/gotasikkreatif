<?php 
require_once __DIR__ . "/db.php"; 
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Ambil info toko
$stmt = $db->prepare("SELECT id, shop_name FROM artisans WHERE user_id = ?");
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$artisan = $stmt->get_result()->fetch_assoc();
$artisan_id = $artisan['id'] ?? 0;
?>
<!DOCTYPE html><?php require_once __DIR__ . "/db.php"; ?><html class="light" lang="id"><head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>Manajemen Inventaris - TasikKreatifGo</title>
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
            vertical-align: middle;
        }
        .batik-pattern {
            background-color: transparent;
            background-image: radial-gradient(circle at 2px 2px, rgba(26, 35, 126, 0.05) 1px, transparent 0);
            background-size: 24px 24px;
        }
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #bdc2ff;
            border-radius: 10px;
        }
    </style>
</head>
<body class="bg-surface font-body-md text-on-surface batik-pattern min-h-screen">
<!-- Sidebar Navigation -->
<aside class="hidden lg:flex flex-col py-8 gap-4 fixed left-0 top-0 h-screen w-64 bg-surface-container-low border-r border-outline-variant/30 z-40 transition-all duration-300" id="side-nav">
<div class="px-6 mb-8">
<h1 class="font-headline-md text-primary tracking-tight">Mitra Tasik</h1>
<div class="flex items-center gap-3 mt-4 p-3 bg-surface-container rounded-xl">
<img class="w-10 h-10 rounded-full object-cover" data-alt="A professional portrait of a West Javanese artisan, wearing a subtle batik shirt, in a brightly lit pottery studio. The aesthetic is clean, corporate, and trustworthy, with soft natural light highlighting clay textures in the background. The mood is modern yet deeply rooted in cultural heritage." src="https://lh3.googleusercontent.com/aida-public/AB6AXuA67H844t2AqH5o_i8u9OrqWKQGLOHog4Ez8fes39KG9xvcagUUOXDodrXr6FDNmLxXj-GVze7LlDtsqK2fmzAB_mzZLwy3,-OgrWI6YVyI8qkpAdRmjSMGGWPdS-8X0J0d_lJJpnnkhexmYS1FdWVG5alyLMxURwcoFhNyM9h675A3DUQ4ajpUZhcYKYp3Pr_lV26ydawUWi6dT3wRIu4dK1ksAFxc077jNUhNesYmH_AigvbpHon1hUCP1XPTEngzInpVvjtUMZogz">
<div>
<p class="font-label-md text-on-surface"><?php echo htmlspecialchars($artisan['shop_name'] ?? 'nama toko'); ?></p>
<p class="text-xs text-on-surface-variant">UMKM Profile</p>
</div>
</div>
</div>
<nav class="flex-1 flex flex-col gap-1">
<a class="flex items-center gap-3 py-3 px-4 <?php echo basename($_SERVER['PHP_SELF']) == 'overview.php' ? 'bg-blue-600 text-white shadow-md' : 'text-on-surface-variant hover:bg-surface-variant/50'; ?> hover:translate-x-1 transition-transform duration-200 rounded-xl mx-2" href="overview.php">
<span class="material-symbols-outlined">grid_view</span>
<span class="font-label-md">Overview</span>
</a>
<a class="flex items-center gap-3 py-3 px-4 <?php echo basename($_SERVER['PHP_SELF']) == 'inventory.php' ? 'bg-blue-600 text-white shadow-md' : 'text-on-surface-variant hover:bg-surface-variant/50'; ?> hover:translate-x-1 transition-transform duration-200 rounded-xl mx-2" href="inventory.php">
<span class="material-symbols-outlined">inventory_2</span>
<span class="font-label-md">Inventory</span>
</a>
<a class="flex items-center gap-3 py-3 px-4 <?php echo basename($_SERVER['PHP_SELF']) == 'sales.php' ? 'bg-blue-600 text-white shadow-md' : 'text-on-surface-variant hover:bg-surface-variant/50'; ?> hover:translate-x-1 transition-transform duration-200 rounded-xl mx-2" href="sales.php">
<span class="material-symbols-outlined">receipt_long</span>
<span class="font-label-md">Sales</span>
</a>
<a class="flex items-center gap-3 py-3 px-4 text-on-surface-variant hover:bg-surface-variant/50 hover:translate-x-1 transition-transform duration-200 rounded-xl mx-2" href="#">
<span class="material-symbols-outlined">analytics</span>
<span class="font-label-md">Insights</span>
</a>
<a class="flex items-center gap-3 py-3 px-4 text-on-surface-variant hover:bg-surface-variant/50 hover:translate-x-1 transition-transform duration-200 rounded-xl mx-2" href="#">
<span class="material-symbols-outlined">settings</span>
<span class="font-label-md">Settings</span>
</a>
</nav>
<div class="px-4 mt-auto">
<a href="tambah_produk.php" class="w-full bg-secondary-container text-on-secondary-container py-3 rounded-xl font-label-md flex items-center justify-center gap-2 hover:opacity-90 transition-opacity inline-flex">
<span class="material-symbols-outlined">add</span>
                Add Product
            </a>
</div>
</aside>
<!-- Main Content Area -->
<main class="lg:ml-64 min-h-screen px-4 md:px-margin-desktop py-8 pb-24 md:pb-8">
<!-- Header Section -->
<header class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
<div>
<h2 class="font-headline-lg text-primary">Manajemen Inventaris</h2>
<p class="text-on-surface-variant font-body-md">Pantau stok dan status produk kerajinan Anda di satu tempat.</p>
</div>
<div class="flex gap-3">
<button class="flex items-center gap-2 px-4 py-2 border border-outline-variant text-primary rounded-lg font-label-md hover:bg-surface-container-low transition-colors">
<span class="material-symbols-outlined">filter_list</span>
                    Filter
                </button>
<a href="tambah_produk.php" class="flex items-center gap-2 px-6 py-2 bg-primary text-on-primary rounded-lg font-label-md shadow-md hover:opacity-90 active:scale-95 transition-all inline-flex">
<span class="material-symbols-outlined">add_circle</span>
                    Tambah Produk Baru
                </a>
</div>
</header>
<!-- Stats Overview (Bento Style) -->
<section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-gutter mb-8">
<div class="bg-surface-container-lowest p-6 rounded-xl border border-outline-variant/30 flex items-center gap-4">
<div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center text-primary">
<span class="material-symbols-outlined">box</span>
</div>
<div>
<p class="text-xs font-label-md text-on-surface-variant uppercase tracking-wider">Total Produk</p>
<p class="font-headline-md text-primary">128</p>
</div>
</div>
<div class="bg-surface-container-lowest p-6 rounded-xl border border-outline-variant/30 flex items-center gap-4">
<div class="w-12 h-12 rounded-full bg-secondary-container/10 flex items-center justify-center text-secondary">
<span class="material-symbols-outlined">warning</span>
</div>
<div>
<p class="text-xs font-label-md text-on-surface-variant uppercase tracking-wider">Stok Menipis</p>
<p class="font-headline-md text-secondary">12</p>
</div>
</div>
<div class="bg-surface-container-lowest p-6 rounded-xl border border-outline-variant/30 flex items-center gap-4">
<div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center text-green-700">
<span class="material-symbols-outlined">check_circle</span>
</div>
<div>
<p class="text-xs font-label-md text-on-surface-variant uppercase tracking-wider">Produk Aktif</p>
<p class="font-headline-md text-green-700">115</p>
</div>
</div>
<div class="bg-surface-container-lowest p-6 rounded-xl border border-outline-variant/30 flex items-center gap-4">
<div class="w-12 h-12 rounded-full bg-outline-variant/20 flex items-center justify-center text-outline">
<span class="material-symbols-outlined">draft</span>
</div>
<div>
<p class="text-xs font-label-md text-on-surface-variant uppercase tracking-wider">Draf</p>
<p class="font-headline-md text-outline">13</p>
</div>
</div>
</section>
<!-- Product Table Container -->
<section class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 shadow-sm overflow-hidden">
<!-- Table Controls -->
<div class="p-4 border-b border-outline-variant/20 flex flex-col sm:flex-row justify-between items-center gap-4">
<div class="relative w-full sm:w-96">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant">search</span>
<input class="w-full pl-10 pr-4 py-2 bg-surface-container-low border-none rounded-lg focus:ring-2 focus:ring-primary/20 text-body-md" placeholder="Cari nama produk atau SKU..." type="text">
</div>
<div class="flex items-center gap-2 w-full sm:w-auto">
<select class="w-full sm:w-auto bg-surface-container-low border-none rounded-lg text-label-md py-2 px-4 focus:ring-primary/20">
<option>Semua Kategori</option>
<option>Batik</option>
<option>Anyaman</option>
<option>Kerajinan Tanah Liat</option>
</select>
</div>
</div>
<!-- Table -->
<div class="overflow-x-auto custom-scrollbar">
<table class="w-full text-left border-collapse">
<thead class="bg-surface-container-high/30">
<tr>
<th class="px-6 py-4 font-label-md text-on-surface-variant">Produk</th>
<th class="px-6 py-4 font-label-md text-on-surface-variant">SKU</th>
<th class="px-6 py-4 font-label-md text-on-surface-variant">Kategori</th>
<th class="px-6 py-4 font-label-md text-on-surface-variant">Stok</th>
<th class="px-6 py-4 font-label-md text-on-surface-variant">Harga</th>
<th class="px-6 py-4 font-label-md text-on-surface-variant">Status</th>
<th class="px-6 py-4 font-label-md text-on-surface-variant text-right">Aksi</th>
</tr>
</thead>
<tbody class="divide-y divide-outline-variant/10">
    <?php
    // Query untuk mengambil data produk berdasarkan artisan_id
    $stmt = $db->prepare("SELECT * FROM products WHERE artisan_id = ?");
    $stmt->bind_param("i", $artisan_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $is_active = $row['stock'] > 0;
    ?>
    <tr class="hover:bg-surface-container-low transition-colors group">
        <td class="px-6 py-4">
            <div class="flex items-center gap-4">
                <img class="w-12 h-12 rounded-lg object-cover border border-outline-variant/20" src="<?php echo htmlspecialchars($row['image_url'] ?? ''); ?>">
                <div>
                    <p class="font-label-md text-on-surface"><?php echo htmlspecialchars($row['name']); ?></p>
                    <p class="text-xs text-on-surface-variant">Produk</p>
                </div>
            </div>
        </td>
        <td class="px-6 py-4 text-body-md text-on-surface-variant"><?php echo htmlspecialchars($row['sku'] ?? '-'); ?></td>
        <td class="px-6 py-4">-</td>
        <td class="px-6 py-4">
            <p class="text-body-md font-bold text-primary"><?php echo $row['stock']; ?> <span class="text-xs font-normal text-on-surface-variant">pcs</span></p>
        </td>
        <td class="px-6 py-4">
            <p class="text-body-md font-bold text-on-surface">Rp <?php echo number_format($row['price'], 0, ',', '.'); ?></p>
        </td>
        <td class="px-6 py-4">
            <span class="flex items-center gap-1 <?php echo $is_active ? 'text-green-700' : 'text-on-surface-variant'; ?> text-xs font-label-md">
                <span class="w-2 h-2 rounded-full <?php echo $is_active ? 'bg-green-500' : 'bg-outline-variant'; ?>"></span>
                <?php echo $is_active ? 'Aktif' : 'Draft'; ?>
            </span>
        </td>
        <td class="px-6 py-4 text-right">
            <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                <button class="p-2 text-primary hover:bg-primary/10 rounded-lg transition-colors" title="Edit">
                    <span class="material-symbols-outlined">edit</span>
                </button>
                <button class="p-2 text-error hover:bg-error/10 rounded-lg transition-colors" title="Hapus">
                    <span class="material-symbols-outlined">delete</span>
                </button>
            </div>
        </td>
    </tr>
    <?php 
        } // akhir while
    } else {
        echo '<tr><td colspan="7" class="px-6 py-4 text-center text-on-surface-variant">Belum ada produk.</td></tr>';
    }
    ?>
</tbody>
</tbody>
<td class="px-6 py-4 text-right">
<div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
<button class="p-2 text-primary hover:bg-primary/10 rounded-lg transition-colors" title="Edit">
<span class="material-symbols-outlined">edit</span>
</button>
<button class="p-2 text-error hover:bg-error/10 rounded-lg transition-colors" title="Hapus">
<span class="material-symbols-outlined">delete</span>
</button>
</div>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Pagination -->
<div class="px-6 py-4 bg-surface-container-low/50 border-t border-outline-variant/20 flex flex-col sm:flex-row justify-between items-center gap-4">
<p class="text-xs font-label-md text-on-surface-variant">Menampilkan 1-4 dari 128 produk</p>
<div class="flex items-center gap-1">
<button class="p-2 rounded-lg hover:bg-surface-variant transition-colors disabled:opacity-30" disabled="">
<span class="material-symbols-outlined">chevron_left</span>
</button>
<button class="w-8 h-8 rounded-lg bg-primary text-on-primary text-xs font-bold">1</button>
<button class="w-8 h-8 rounded-lg hover:bg-surface-variant text-xs font-bold transition-colors">2</button>
<button class="w-8 h-8 rounded-lg hover:bg-surface-variant text-xs font-bold transition-colors">3</button>
<span class="px-1 text-on-surface-variant">...</span>
<button class="w-8 h-8 rounded-lg hover:bg-surface-variant text-xs font-bold transition-colors">32</button>
<button class="p-2 rounded-lg hover:bg-surface-variant transition-colors">
<span class="material-symbols-outlined">chevron_right</span>
</button>
</div>
</div>
</section>
</main>
<!-- Mobile Navigation Bar -->
<nav class="fixed bottom-0 left-0 w-full z-50 bg-surface/90 backdrop-blur-md border-t border-outline-variant/20 flex justify-around items-center px-4 py-3 md:hidden shadow-lg rounded-t-xl">
<a class="flex flex-col items-center justify-center text-on-surface-variant" href="#">
<span class="material-symbols-outlined">home</span>
<span class="text-[10px] font-label-sm">Home</span>
</a>
<a class="flex flex-col items-center justify-center text-on-surface-variant" href="#">
<span class="material-symbols-outlined">search</span>
<span class="text-[10px] font-label-sm">Search</span>
</a>
<div class="flex flex-col items-center justify-center bg-secondary-container text-on-secondary-container rounded-full px-4 py-1 -mt-6 shadow-lg border-4 border-surface">
<span class="material-symbols-outlined">inventory_2</span>
<span class="text-[10px] font-label-sm">Inventory</span>
</div>
<a class="flex flex-col items-center justify-center text-on-surface-variant" href="#">
<span class="material-symbols-outlined">shopping_basket</span>
<span class="text-[10px] font-label-sm">Cart</span>
</a>
<a class="flex flex-col items-center justify-center text-on-surface-variant" href="#">
<span class="material-symbols-outlined">person</span>
<span class="text-[10px] font-label-sm">Profile</span>
</a>
</nav>
<!-- Micro-interaction Scripts -->
<script>
        // Simple row highlight and tooltips simulation
        document.querySelectorAll('tbody tr').forEach(row => {
            row.addEventListener('mouseenter', () => {
                row.querySelector('div.opacity-0')?.classList.remove('opacity-0');
            });
            row.addEventListener('mouseleave', () => {
                row.querySelector('div.opacity-0')?.classList.add('opacity-0');
            });
        });

        // Search highlight simulation
        const searchInput = document.querySelector('input[type="text"]');
        searchInput.addEventListener('focus', () => {
            searchInput.parentElement.classList.add('ring-2', 'ring-primary/10');
        });
        searchInput.addEventListener('blur', () => {
            searchInput.parentElement.classList.remove('ring-2', 'ring-primary/10');
        });
    </script>
</body></html>