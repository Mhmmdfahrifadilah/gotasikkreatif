<!DOCTYPE html><?php require_once __DIR__ . "/db.php"; ?>
<?php
$products = [];
$query = 'SELECT p.id, p.name, p.price, p.image_url, p.slug, p.stock, a.shop_name, c.name as category_name FROM products p JOIN artisans a ON p.artisan_id = a.id JOIN categories c ON p.category_id = c.id WHERE p.is_active = 1 ORDER BY p.created_at DESC';
$result = $db->query($query);
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
    $result->free();
}
?><html class="scroll-smooth" lang="en"><head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>Katalog Produk | TasikKreatifGo</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&amp;family=Work+Sans:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
<!-- Tailwind Configuration -->
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "on-secondary": "#ffffff",
                    "surface": "#f3faff",
                    "tertiary": "#191c10",
                    "inverse-on-surface": "#dff4ff",
                    "surface-container-lowest": "#ffffff",
                    "on-secondary-fixed": "#3b0900",
                    "primary": "#000666",
                    "secondary-container": "#fe5e2f",
                    "secondary-fixed-dim": "#ffb5a0",
                    "on-tertiary-fixed": "#1a1d11",
                    "surface-dim": "#c7dde9",
                    "on-tertiary": "#ffffff",
                    "on-primary-container": "#8690ee",
                    "on-background": "#071e27",
                    "surface-tint": "#4c56af",
                    "surface-variant": "#cfe6f2",
                    "primary-fixed": "#e0e0ff",
                    "on-primary-fixed": "#000767",
                    "tertiary-fixed": "#e2e4d1",
                    "error-container": "#ffdad6",
                    "on-primary-fixed-variant": "#343d96",
                    "error": "#ba1a1a",
                    "surface-container-high": "#d5ecf8",
                    "surface-container": "#dbf1fe",
                    "on-secondary-fixed-variant": "#872000",
                    "surface-bright": "#f3faff",
                    "background": "#f3faff",
                    "primary-container": "#1a237e",
                    "on-error-container": "#93000a",
                    "secondary-fixed": "#ffdbd1",
                    "on-secondary-container": "#581200",
                    "inverse-primary": "#bdc2ff",
                    "on-tertiary-fixed-variant": "#45483a",
                    "outline-variant": "#c6c5d4",
                    "primary-fixed-dim": "#bdc2ff",
                    "on-error": "#ffffff",
                    "on-primary": "#ffffff",
                    "on-surface": "#071e27",
                    "on-tertiary-container": "#969988",
                    "inverse-surface": "#1e333c",
                    "outline": "#767683",
                    "tertiary-container": "#2e3124",
                    "surface-container-low": "#e6f6ff",
                    "surface-container-highest": "#cfe6f2",
                    "on-surface-variant": "#454652",
                    "secondary": "#b12d00",
                    "tertiary-fixed-dim": "#c6c8b5"
            },
            "borderRadius": {
                    "DEFAULT": "0.125rem",
                    "lg": "0.25rem",
                    "xl": "0.5rem",
                    "full": "0.75rem"
            },
            "spacing": {
                    "margin-mobile": "16px",
                    "gutter": "24px",
                    "base": "8px",
                    "margin-desktop": "48px",
                    "container-max": "1200px"
            },
            "fontFamily": {
                    "headline-md": ["Manrope"],
                    "headline-lg-mobile": ["Manrope"],
                    "headline-xl": ["Manrope"],
                    "body-lg": ["Work Sans"],
                    "headline-lg": ["Manrope"],
                    "body-md": ["Work Sans"],
                    "label-md": ["Work Sans"],
                    "label-sm": ["Work Sans"]
            },
            "fontSize": {
                    "headline-md": ["24px", {"lineHeight": "32px", "fontWeight": "600"}],
                    "headline-lg-mobile": ["28px", {"lineHeight": "36px", "fontWeight": "700"}],
                    "headline-xl": ["48px", {"lineHeight": "56px", "letterSpacing": "-0.02em", "fontWeight": "800"}],
                    "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}],
                    "headline-lg": ["32px", {"lineHeight": "40px", "letterSpacing": "-0.01em", "fontWeight": "700"}],
                    "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                    "label-md": ["14px", {"lineHeight": "20px", "letterSpacing": "0.05em", "fontWeight": "600"}],
                    "label-sm": ["12px", {"lineHeight": "16px", "fontWeight": "500"}]
            }
          },
        },
      }
    </script>
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .batik-pattern {
            background-image: url("https://www.transparenttextures.com/patterns/cubes.png");
            opacity: 0.03;
        }
        .glass-nav {
            backdrop-filter: blur(12px);
            background-color: rgba(243, 250, 255, 0.85);
        }
        input:focus {
            outline: none;
            box-shadow: none;
            border-color: #000666;
        }
    </style>
</head>
<body class="bg-surface text-on-surface font-body-md selection:bg-secondary-fixed">
<!-- Top Navigation Bar -->
<nav class="fixed top-0 left-0 w-full z-[100] h-20 glass-nav border-b border-outline-variant">
<div class="flex justify-between items-center w-full px-margin-desktop max-w-container-max mx-auto h-full">
<div class="flex items-center gap-8">
<a class="text-headline-md font-headline-md font-extrabold text-primary" href="#">TasikKreatifGo</a>
<div class="hidden md:flex items-center gap-6">
<a class="text-on-surface-variant font-medium hover:text-secondary transition-colors duration-200 text-label-md font-label-md" href="index.php">Home</a>
<a class="text-primary font-bold border-b-2 border-primary pb-1 text-label-md font-label-md" href="">Catalog</a>
<a class="text-on-surface-variant font-medium hover:text-secondary transition-colors duration-200 text-label-md font-label-md" href="tentang.php">About</a>
</div>
</div>
<div class="flex items-center gap-4">
<div class="hidden lg:flex items-center bg-surface-container border border-outline-variant rounded-full px-4 py-2 w-64 focus-within:ring-2 focus-within:ring-primary transition-all">
<span class="material-symbols-outlined text-on-surface-variant mr-2">search</span>
<input class="bg-transparent border-none p-0 text-sm w-full focus:ring-0" placeholder="Search crafts..." type="text">
</div>
<button class="bg-primary text-on-primary px-6 py-2.5 rounded-full font-label-md text-label-md hover:bg-primary-container transition-all active:scale-95">UMKM Login</button>
</div>
</div>
</nav>
<!-- Main Content Layout -->
<main class="pt-32 pb-24 px-margin-desktop max-w-container-max mx-auto min-h-screen">
<div class="flex flex-col md:flex-row gap-gutter">
<!-- Sidebar Filters -->
<aside class="w-full md:w-64 lg:w-72 shrink-0 space-y-8">
<!-- Mobile Search (Visible on Mobile Only) -->
<div class="lg:hidden">
<div class="flex items-center bg-surface-container border border-outline-variant rounded-full px-4 py-3">
<span class="material-symbols-outlined text-on-surface-variant mr-2">search</span>
<input class="bg-transparent border-none p-0 text-sm w-full focus:ring-0" placeholder="Search crafts..." type="text">
</div>
</div>
<!-- Category Filter -->
<section>
<h3 class="text-headline-md font-headline-md text-primary mb-4 flex items-center gap-2">
<span class="material-symbols-outlined">category</span> Categories
                    </h3>
<div class="space-y-2">
<label class="flex items-center gap-3 group cursor-pointer">
<input checked="" class="w-5 h-5 rounded border-outline-variant text-primary focus:ring-primary" type="checkbox">
<span class="text-body-md text-on-surface group-hover:text-secondary">Batik Tasikmalaya</span>
</label>
<label class="flex items-center gap-3 group cursor-pointer">
<input class="w-5 h-5 rounded border-outline-variant text-primary focus:ring-primary" type="checkbox">
<span class="text-body-md text-on-surface group-hover:text-secondary">Bordir Kawalu</span>
</label>
<label class="flex items-center gap-3 group cursor-pointer">
<input class="w-5 h-5 rounded border-outline-variant text-primary focus:ring-primary" type="checkbox">
<span class="text-body-md text-on-surface group-hover:text-secondary">Anyaman Rajapolah</span>
</label>
<label class="flex items-center gap-3 group cursor-pointer">
<input class="w-5 h-5 rounded border-outline-variant text-primary focus:ring-primary" type="checkbox">
<span class="text-body-md text-on-surface group-hover:text-secondary">Kelom Geulis</span>
</label>
<label class="flex items-center gap-3 group cursor-pointer">
<input class="w-5 h-5 rounded border-outline-variant text-primary focus:ring-primary" type="checkbox">
<span class="text-body-md text-on-surface group-hover:text-secondary">Culinary Delights</span>
</label>
</div>
</section>
<!-- District Filter (Kecamatan) -->
<section>
<h3 class="text-headline-md font-headline-md text-primary mb-4 flex items-center gap-2">
<span class="material-symbols-outlined">location_on</span> District
                    </h3>
<select class="w-full bg-surface-container-lowest border-outline-variant rounded-xl p-3 text-body-md focus:border-primary">
<option>All Districts</option>
<option>Cihideung</option>
<option>Cipedes</option>
<option>Tawang</option>
<option>Indihiang</option>
<option>Kawalu</option>
<option>Cibeureum</option>
<option>Tamansari</option>
<option>Mangkubumi</option>
<option>Bungursari</option>
<option>Purbaratu</option>
</select>
</section>
<!-- Price Range Filter -->
<section>
<h3 class="text-headline-md font-headline-md text-primary mb-4 flex items-center gap-2">
<span class="material-symbols-outlined">payments</span> Price Range
                    </h3>
<div class="space-y-4">
<input class="w-full h-2 bg-surface-container rounded-lg appearance-none cursor-pointer accent-secondary" max="1000000" min="0" step="50000" type="range">
<div class="flex justify-between items-center text-label-sm font-label-sm text-on-surface-variant">
<span>Rp 0</span>
<span>Rp 1.000.000+</span>
</div>
</div>
</section>
<button class="w-full py-4 bg-secondary text-on-secondary rounded-xl font-label-md text-label-md hover:brightness-110 transition-all shadow-md active:scale-[0.98]">
                    Apply Filters
                </button>
</aside>
<!-- Product Grid -->
<div class="flex-1">
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
<div>
<h1 class="text-headline-lg font-headline-lg text-on-surface">Jelajahi Keunggulan Lokal</h1>
<p class="text-on-surface-variant text-body-md"> <?= count($products) ?> produk dari pengrajin Tasikmalaya bersertifikat</p>
</div>
<div class="flex items-center gap-3">
<span class="text-label-md font-label-md text-on-surface-variant">Sort by:</span>
<select class="bg-transparent border-none font-bold text-primary focus:ring-0 cursor-pointer">
<option>Produk Terbaru</option>
<option>Harga: Rendah ke Tinggi</option>
<option>Harga: Tinggi ke Rendah</option>
<option>Paling Populer</option>
</select>
</div>
</div>
<!-- Bento-like Responsive Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-gutter">
<?php if (empty($products)): ?>
    <div class="col-span-full text-center py-12">
        <p class="text-on-surface-variant text-body-lg">Belum ada produk. Kembali lagi nanti!</p>
    </div>
<?php else: ?>
    <?php foreach ($products as $product): ?>
<!-- Product Card -->
<div class="group bg-surface-container-lowest border border-outline-variant rounded-2xl overflow-hidden hover:shadow-[0_8px_24px_rgba(26,35,126,0.08)] transition-all duration-300">
<div class="relative aspect-square overflow-hidden bg-surface-container-high">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="<?= htmlspecialchars($product['image_url'] ?: 'https://via.placeholder.com/400') ?>" alt="<?= htmlspecialchars($product['name']) ?>">
<div class="absolute top-3 left-3 bg-primary/90 text-on-primary text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-widest"><?= htmlspecialchars($product['category_name']) ?></div>
</div>
<div class="p-5">
<div class="flex justify-between items-start mb-2">
<div>
<h4 class="text-on-surface-variant text-label-sm font-label-sm mb-1"><?= htmlspecialchars($product['shop_name']) ?></h4>
<h3 class="text-headline-md font-headline-md text-on-surface group-hover:text-primary transition-colors"><?= htmlspecialchars($product['name']) ?></h3>
</div>
<button class="p-2 hover:bg-surface-variant rounded-full transition-colors">
<span class="material-symbols-outlined text-secondary">favorite</span>
</button>
</div>
<div class="flex justify-between items-center mt-6">
<span class="text-headline-md font-bold text-secondary">Rp <?= number_format($product['price'], 0, ',', '.') ?></span>
<a href="detail.php?id=<?= $product['id'] ?>" class="flex items-center gap-2 bg-primary text-on-primary px-4 py-2 rounded-lg font-label-md text-label-md hover:bg-secondary-container transition-all">
                                    Lihat Detail
                                </a>
</div>
</div>
</div>
    <?php endforeach; ?>
<?php endif; ?>

</div>
<!-- Pagination -->
<div class="mt-16 flex justify-center items-center gap-2">
<button class="p-2 rounded-full border border-outline-variant hover:bg-surface-variant transition-colors disabled:opacity-30" disabled="">
<span class="material-symbols-outlined">chevron_left</span>
</button>
<button class="w-10 h-10 rounded-full bg-primary text-on-primary font-bold">1</button>
<button class="w-10 h-10 rounded-full hover:bg-surface-variant text-on-surface font-medium transition-colors">2</button>
<button class="w-10 h-10 rounded-full hover:bg-surface-variant text-on-surface font-medium transition-colors">3</button>
<span class="px-2">...</span>
<button class="w-10 h-10 rounded-full hover:bg-surface-variant text-on-surface font-medium transition-colors">12</button>
<button class="p-2 rounded-full border border-outline-variant hover:bg-surface-variant transition-colors">
<span class="material-symbols-outlined">chevron_right</span>
</button>
</div>
</div>
</div>
</main>
<!-- Footer Component -->
<footer class="bg-tertiary-container text-on-tertiary-container w-full py-12 px-margin-desktop grid grid-cols-1 md:grid-cols-4 gap-gutter max-w-container-max mx-auto border-t border-tertiary/10">
<div class="space-y-4">
<h2 class="text-headline-sm font-headline-sm font-bold text-on-tertiary-container">TasikKreatifGo</h2>
<p class="text-body-md opacity-80">Connecting the world to the exquisite craftsmanship of Tasikmalaya's MSMEs. Authentic, premium, and locally sourced.</p>
</div>
<div>
<h3 class="font-bold text-on-tertiary-container mb-4">Craft Categories</h3>
<ul class="space-y-2 text-label-sm font-label-sm">
<li><a class="opacity-80 hover:opacity-100 hover:text-secondary-container transition-opacity" href="#">Batik</a></li>
<li><a class="opacity-80 hover:opacity-100 hover:text-secondary-container transition-opacity" href="#">Bordir</a></li>
<li><a class="opacity-80 hover:opacity-100 hover:text-secondary-container transition-opacity" href="#">Anyaman</a></li>
<li><a class="opacity-80 hover:opacity-100 hover:text-secondary-container transition-opacity" href="#">Kelom Geulis</a></li>
</ul>
</div>
<div>
<h3 class="font-bold text-on-tertiary-container mb-4">Support</h3>
<ul class="space-y-2 text-label-sm font-label-sm">
<li><a class="opacity-80 hover:opacity-100 hover:text-secondary-container transition-opacity" href="#">Contact Us</a></li>
<li><a class="opacity-80 hover:opacity-100 hover:text-secondary-container transition-opacity" href="#">Privacy Policy</a></li>
<li><a class="opacity-80 hover:opacity-100 hover:text-secondary-container transition-opacity" href="#">Shipping Info</a></li>
</ul>
</div>
<div class="space-y-4">
<h3 class="font-bold text-on-tertiary-container mb-4">Newsletter</h3>
<div class="flex">
<input class="bg-surface/10 border-on-tertiary-container/20 rounded-l-lg p-2 text-sm w-full focus:ring-0" placeholder="Your email" type="email">
<button class="bg-secondary-container text-on-secondary-container px-4 py-2 rounded-r-lg font-bold hover:brightness-110">Join</button>
</div>
<p class="text-label-sm opacity-80 mt-8">© 2024 TasikKreatifGo. Celebrating Tasikmalaya's MSME Excellence.</p>
</div>
</footer>
<!-- Bottom Navigation (Mobile Only) -->
<nav class="fixed bottom-0 left-0 w-full z-50 flex justify-around items-center px-4 py-3 md:hidden glass-nav shadow-[0_-4px_12px_rgba(0,0,0,0.05)] rounded-t-full">
<a class="flex flex-col items-center justify-center text-on-surface-variant hover:bg-surface-variant transition-colors p-2 rounded-full" href="#">
<span class="material-symbols-outlined">home</span>
<span class="text-label-sm font-label-sm-mobile">Home</span>
</a>
<a class="flex flex-col items-center justify-center bg-secondary-container text-on-secondary-container rounded-full px-4 py-1 scale-90 transition-transform" href="#">
<span class="material-symbols-outlined">grid_view</span>
<span class="text-label-sm font-label-sm-mobile">Catalog</span>
</a>
<a class="flex flex-col items-center justify-center text-on-surface-variant hover:bg-surface-variant transition-colors p-2 rounded-full" href="#">
<span class="material-symbols-outlined">storefront</span>
<span class="text-label-sm font-label-sm-mobile">Portal</span>
</a>
<a class="flex flex-col items-center justify-center text-on-surface-variant hover:bg-surface-variant transition-colors p-2 rounded-full" href="#">
<span class="material-symbols-outlined">person</span>
<span class="text-label-sm font-label-sm-mobile">Profile</span>
</a>
</nav>
<script>
        // Micro-interactions for product cards
        document.querySelectorAll('.group').forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-4px)';
            });
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0)';
            });
        });

        // Filter button toggle (simulated logic)
        const filterBtn = document.querySelector('button.w-full.py-4');
        filterBtn.addEventListener('click', () => {
            filterBtn.innerHTML = '<span class="material-symbols-outlined animate-spin mr-2">refresh</span> Loading...';
            setTimeout(() => {
                filterBtn.innerHTML = 'Apply Filters';
                // Trigger a small pulse effect on products
                document.querySelectorAll('.grid > div').forEach((div, i) => {
                    setTimeout(() => {
                        div.classList.add('opacity-50');
                        setTimeout(() => div.classList.remove('opacity-50'), 200);
                    }, i * 50);
                });
            }, 800);
        });
    </script>
</body></html>