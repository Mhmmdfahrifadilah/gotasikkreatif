<?php
session_start();
require_once __DIR__ . "/db.php";

// Logika untuk menambah produk (jika link diklik dari index.php)
if (isset($_GET['add'])) {
    $product_id = intval($_GET['add']);
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    // Tambahkan ID ke session cart
    $_SESSION['cart'][] = $product_id;
    header("Location: keranjang.php");
}
// Logika hitung total
$subtotal = 0;
$items_data = [];

if (!empty($_SESSION['cart'])) {
    $cart_ids = implode(',', array_unique($_SESSION['cart']));
    $query = "SELECT * FROM products WHERE id IN ($cart_ids)";
    $result = $db->query($query);
    
    while ($row = $result->fetch_assoc()) {
        $subtotal += $row['price'];
        $items_data[] = $row;
    }
}
$pajak = $subtotal * 0.11;
$total_tagihan = $subtotal + $pajak;

?>
<!DOCTYPE html><?php require_once __DIR__ . "/db.php"; ?><html lang="id"><head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&amp;family=Work+Sans:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .batik-pattern {
            background-color: transparent;
            background-image: radial-gradient(#4c56af11 1px, transparent 1px);
            background-size: 24px 24px;
        }
        .glass-effect {
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
    </style>
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
</head>
<body class="bg-background font-body-md text-on-surface min-h-screen batik-pattern">
<!-- TopAppBar -->
<header class="fixed top-0 left-0 w-full z-40 bg-surface/80 dark:bg-inverse-surface/80 backdrop-blur-xl border-b border-outline-variant/30">
<div class="flex justify-between items-center w-full px-margin-desktop h-20 max-w-container-max mx-auto">
<h1 class="font-headline-md text-headline-md font-bold text-primary dark:text-inverse-primary tracking-tight">TasikKreatifGo</h1>
<nav class="hidden md:flex items-center gap-8">
<a class="font-label-md text-label-md text-on-surface-variant dark:text-on-surface-variant/80 hover:text-primary transition-colors" href="katalog.php">Catalog</a>
<a class="font-label-md text-label-md text-on-surface-variant dark:text-on-surface-variant/80 hover:text-primary transition-colors" href="#">Artisans</a>
<a class="font-label-md text-label-md text-on-surface-variant dark:text-on-surface-variant/80 hover:text-primary transition-colors" href="#">Heritage</a>
<a class="font-label-md text-label-md text-on-surface-variant dark:text-on-surface-variant/80 hover:text-primary transition-colors" href="#">Community</a>
</nav>
<div class="flex items-center gap-4">
<button class="p-2 rounded-full hover:bg-surface-container-low transition-all duration-200">
<span class="material-symbols-outlined text-primary">notifications</span>
</button>
<button class="p-2 rounded-full hover:bg-surface-container-low transition-all duration-200">
<span class="material-symbols-outlined text-primary">account_circle</span>
</button>
</div>
</div>
</header>
<main class="pt-32 pb-24 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
<div class="flex flex-col lg:flex-row gap-gutter">
<!-- Shopping Cart List -->
<div class="flex-grow space-y-6">
<header class="mb-8">
<h2 class="font-headline-lg text-headline-lg text-primary">Keranjang Belanja</h2>
<p class="font-body-md text-on-surface-variant">Anda memiliki 2 item dalam keranjang Anda</p>
</header>
<div class="flex-grow space-y-6">
    <?php
    // Pastikan session sudah aktif di bagian paling atas file
    if (!empty($_SESSION['cart'])):
        // Ambil ID unik agar tidak ada duplikat dalam query
        $cart_ids = implode(',', array_unique($_SESSION['cart']));
        
        // Query ke database
        $query = "SELECT * FROM products WHERE id IN ($cart_ids)";
        $result = $db->query($query);
        
        while ($item = $result->fetch_assoc()): ?>
            <div class="bg-surface-container-lowest border border-outline-variant/30 rounded-xl p-4 md:p-6 flex items-center gap-6">
                <div class="w-24 h-24 bg-surface-container rounded-lg overflow-hidden">
                    <img class="w-full h-full object-cover" src="<?php echo htmlspecialchars($item['image_url']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>">
                </div>
                <div class="flex-grow">
                    <h3 class="font-headline-md text-primary"><?php echo htmlspecialchars($item['name']); ?></h3>
                </div>
                <div class="text-right">
                    <p class="font-bold text-secondary">Rp <?php echo number_format($item['price'], 0, ',', '.'); ?></p>
                </div>
            </div>
        <?php endwhile;
    else:
        echo "<p>Keranjang Anda masih kosong.</p>";
    endif;
    ?>
</div>
</div>
<!-- Order Summary Section -->
<aside class="w-full lg:w-[400px] flex-shrink-0">
    <div class="sticky top-28 bg-surface-container-lowest border border-outline-variant/30 rounded-xl p-8 space-y-6">
        <h3 class="font-headline-md text-headline-md text-primary">Ringkasan Pesanan</h3>
        
        <div class="space-y-4 border-b border-outline-variant/20 pb-6">
            <div class="flex justify-between font-body-md">
                <span class="text-on-surface-variant">Subtotal Produk</span>
                <span class="font-bold">Rp <?php echo number_format($subtotal, 0, ',', '.'); ?></span>
            </div>
            <div class="flex justify-between font-body-md">
                <span class="text-on-surface-variant">Biaya Pengiriman</span>
                <span class="text-primary font-bold">Gratis</span>
            </div>
            <div class="flex justify-between font-body-md">
                <span class="text-on-surface-variant">Pajak (PPN 11%)</span>
                <span class="font-bold">Rp <?php echo number_format($pajak, 0, ',', '.'); ?></span>
            </div>
        </div>

        <div class="pt-2">
            <div class="flex justify-between items-end mb-8">
                <span class="font-headline-md text-headline-md text-primary">Total Tagihan</span>
                <span class="font-headline-md text-headline-md text-secondary">Rp <?php echo number_format($total_tagihan, 0, ',', '.'); ?></span>
            </div>
            <form action="pembayaran.php" method="POST">
            <button class="w-full py-4 bg-primary text-white font-label-md text-label-md rounded-full hover:bg-primary-container active:scale-95 transition-all duration-200 flex items-center justify-center gap-3 shadow-md">
                Lanjut ke Pembayaran
                <span class="material-symbols-outlined">arrow_forward</span>
            </button>
        </div>
    </div>

    <div class="mt-6 p-4 border border-primary/20 rounded-xl bg-primary/5 flex items-start gap-4">
        <span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">verified_user</span>
        <div>
            <p class="font-label-md text-label-md text-primary mb-1">Transaksi Aman & Terjamin</p>
            <p class="font-label-sm text-label-sm text-on-surface-variant">TasikKreatifGo melindungi setiap transaksi Anda.</p>
        </div>
    </div>
</aside>
</div>
<!-- Promotional Banner -->
<div class="relative overflow-hidden rounded-xl bg-primary-container p-8 text-white">
<div class="relative z-10">
<h4 class="font-headline-md text-headline-md mb-2">Gratis Ongkir ke Seluruh Tasik!</h4>
<p class="font-body-md opacity-80 mb-4">Dukung UMKM lokal dengan belanja minimal Rp 500.000</p>
<span class="inline-block bg-secondary px-4 py-2 rounded-full font-label-md text-label-md">Gunakan Kode: BANGGALOKAL</span>
</div>
<div class="absolute -right-10 -bottom-10 opacity-10 rotate-12">
<span class="material-symbols-outlined text-[200px]" style="font-variation-settings: 'FILL' 1;">local_shipping</span>
</div>
</div>
</div>
</main>
<!-- BottomNavBar (Mobile Only) -->
<nav class="fixed bottom-0 left-0 w-full z-50 flex justify-around items-center px-4 py-3 md:hidden bg-surface/90 dark:bg-inverse-surface/90 backdrop-blur-md border-t border-outline-variant/20 shadow-lg rounded-t-xl">
<a class="flex flex-col items-center justify-center text-on-surface-variant dark:text-on-surface-variant/70 active:bg-surface-variant/50 transition-all duration-150" href="#">
<span class="material-symbols-outlined">home</span>
<span class="font-label-sm text-label-sm">Home</span>
</a>
<a class="flex flex-col items-center justify-center text-on-surface-variant dark:text-on-surface-variant/70 active:bg-surface-variant/50 transition-all duration-150" href="#">
<span class="material-symbols-outlined">search</span>
<span class="font-label-sm text-label-sm">Search</span>
</a>
<a class="flex flex-col items-center justify-center bg-secondary-container dark:bg-secondary text-on-secondary-container dark:text-on-secondary rounded-full px-4 py-1 active:scale-90 transition-all duration-150" href="#">
<span class="material-symbols-outlined">shopping_basket</span>
<span class="font-label-sm text-label-sm">Cart</span>
</a>
<a class="flex flex-col items-center justify-center text-on-surface-variant dark:text-on-surface-variant/70 active:bg-surface-variant/50 transition-all duration-150" href="#">
<span class="material-symbols-outlined">person</span>
<span class="font-label-sm text-label-sm">Profile</span>
</a>
</nav>
<script>
        // Simple Micro-interaction for quantity buttons
        document.querySelectorAll('button').forEach(btn => {
            btn.addEventListener('click', function(e) {
                if (this.innerText === 'add' || this.innerText === 'remove') {
                    const span = this.parentElement.querySelector('span:not(.material-symbols-outlined)');
                    let val = parseInt(span.innerText);
                    if (this.innerText === 'add') val++;
                    if (this.innerText === 'remove' && val > 1) val--;
                    span.innerText = val;
                }
            });
        });
    </script>
</body></html>