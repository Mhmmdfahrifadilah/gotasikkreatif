<?php
session_start();
require_once "db.php"; // Pastikan file koneksi database benar

// Ambil ID dari keranjang
$cart_ids = isset($_SESSION['cart']) ? implode(',', array_unique($_SESSION['cart'])) : '';
$items = [];

if ($cart_ids != '') {
    $result = $db->query("SELECT * FROM products WHERE id IN ($cart_ids)");
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }
}
?>
<!DOCTYPE html><?php require_once __DIR__ . "/db.php"; ?><html lang="id"><head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>Checkout - TasikKreatifGo</title>
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
        .batik-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M20 0l5 15h15l-12 9 5 16-13-10-13 10 5-16-12-9h15z' fill='%231a237e' fill-opacity='0.03' fill-rule='evenodd'/%3E%3C/svg%3E");
        }
        .glass-panel {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
    </style>
</head>
<body class="bg-surface font-body-md text-on-surface batik-pattern min-h-screen">
<!-- TopAppBar -->
<header class="bg-surface/80 dark:bg-inverse-surface/80 backdrop-blur-xl border-b border-outline-variant/30 docked full-width top-0 sticky z-50">
<div class="flex justify-between items-center w-full px-margin-mobile md:px-margin-desktop h-20 max-w-container-max mx-auto">
<div class="flex items-center gap-4">
<a class="flex items-center gap-2" href="#">
<span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">shopping_basket</span>
<span class="font-headline-md text-headline-md font-bold text-primary dark:text-inverse-primary tracking-tight">TasikKreatifGo</span>
</a>
</div>
<div class="hidden md:flex items-center gap-8">
<a class="text-on-surface-variant dark:text-on-surface-variant/80 hover:text-primary transition-colors font-label-md text-label-md" href="katalog.php">Catalog</a>
<a class="text-on-surface-variant dark:text-on-surface-variant/80 hover:text-primary transition-colors font-label-md text-label-md" href="#">Artisans</a>
<a class="text-on-surface-variant dark:text-on-surface-variant/80 hover:text-primary transition-colors font-label-md text-label-md" href="#">Heritage</a>
<a class="text-on-surface-variant dark:text-on-surface-variant/80 hover:text-primary transition-colors font-label-md text-label-md" href="#">Community</a>
</div>
<div class="flex items-center gap-4">
<button class="p-2 hover:bg-surface-container-low transition-all duration-200 rounded-full">
<span class="material-symbols-outlined text-on-surface-variant">notifications</span>
</button>
<button class="p-2 hover:bg-surface-container-low transition-all duration-200 rounded-full">
<span class="material-symbols-outlined text-on-surface-variant">account_circle</span>
</button>
</div>
</div>
</header>
<main class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-12">
<div class="flex flex-col gap-4 mb-10">
<h1 class="font-headline-lg text-headline-lg text-primary">Proses Checkout</h1>
<p class="text-on-surface-variant font-body-md max-w-2xl">Selesaikan pesanan Anda dengan melengkapi detail pengiriman dan metode pembayaran untuk mendapatkan karya terbaik dari pengrajin Tasikmalaya.</p>
</div>
<div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
<!-- Left Column: Forms -->
<div class="lg:col-span-8 flex flex-col gap-8">
<!-- Shipping Address Section -->
<section class="bg-surface-container-lowest p-8 rounded-xl border border-outline-variant/30">
<div class="flex items-center gap-3 mb-8">
<span class="material-symbols-outlined text-secondary" style="font-variation-settings: 'FILL' 1;">local_shipping</span>
<h2 class="font-headline-md text-headline-md">Detail Pengiriman</h2>
</div>
<form class="grid grid-cols-1 md:grid-cols-2 gap-6">
<div class="md:col-span-2">
<label class="block font-label-md text-label-md mb-2 text-on-surface-variant">Nama Penerima</label>
<input class="w-full bg-surface-container-low border-0 border-b-2 border-outline-variant focus:border-primary focus:ring-0 transition-colors p-3 font-body-md" placeholder="Masukkan nama lengkap" type="text">
</div>
<div class="md:col-span-2">
<label class="block font-label-md text-label-md mb-2 text-on-surface-variant">Alamat Lengkap</label>
<textarea class="w-full bg-surface-container-low border-0 border-b-2 border-outline-variant focus:border-primary focus:ring-0 transition-colors p-3 font-body-md" placeholder="Nama jalan, nomor rumah, RT/RW, Kecamatan" rows="3"></textarea>
</div>
<div>
<label class="block font-label-md text-label-md mb-2 text-on-surface-variant">Provinsi</label>
<select class="w-full bg-surface-container-low border-0 border-b-2 border-outline-variant focus:border-primary focus:ring-0 transition-colors p-3 font-body-md">
<option>Jawa Barat</option>
<option>DKI Jakarta</option>
<option>Jawa Tengah</option>
<option>Jawa Timur</option>
</select>
</div>
<div>
<label class="block font-label-md text-label-md mb-2 text-on-surface-variant">Kota/Kabupaten</label>
<select class="w-full bg-surface-container-low border-0 border-b-2 border-outline-variant focus:border-primary focus:ring-0 transition-colors p-3 font-body-md">
<option>Kota Tasikmalaya</option>
<option>Kabupaten Tasikmalaya</option>
<option>Kota Bandung</option>
<option>Kabupaten Ciamis</option>
</select>
</div>
<div>
<label class="block font-label-md text-label-md mb-2 text-on-surface-variant">Kode Pos</label>
<input class="w-full bg-surface-container-low border-0 border-b-2 border-outline-variant focus:border-primary focus:ring-0 transition-colors p-3 font-body-md" placeholder="46xxx" type="text">
</div>
<div>
<label class="block font-label-md text-label-md mb-2 text-on-surface-variant">Nomor WhatsApp</label>
<input class="w-full bg-surface-container-low border-0 border-b-2 border-outline-variant focus:border-primary focus:ring-0 transition-colors p-3 font-body-md" placeholder="0812xxxx" type="tel">
</div>
</form>
</section>
<!-- Expedition Section -->
<section class="bg-surface-container-lowest p-8 rounded-xl border border-outline-variant/30">
<div class="flex items-center gap-3 mb-8">
<span class="material-symbols-outlined text-secondary" style="font-variation-settings: 'FILL' 1;">package_2</span>
<h2 class="font-headline-md text-headline-md">Pilihan Ekspeditur</h2>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
<!-- JNE Option -->
<label class="relative flex flex-col p-4 border-2 border-outline-variant/50 rounded-xl cursor-pointer hover:border-primary transition-all group">
<input checked="" class="absolute top-4 right-4 text-primary focus:ring-primary" name="expedition" type="radio">
<span class="font-label-md text-label-md text-on-surface mb-1">JNE Reguler</span>
<span class="font-body-md text-on-surface-variant">2-3 Hari</span>
<span class="mt-4 font-bold text-primary">Rp 12.000</span>
</label>
<!-- J&T Option -->
<label class="relative flex flex-col p-4 border-2 border-outline-variant/50 rounded-xl cursor-pointer hover:border-primary transition-all group">
<input class="absolute top-4 right-4 text-primary focus:ring-primary" name="expedition" type="radio">
<span class="font-label-md text-label-md text-on-surface mb-1">J&amp;T Express</span>
<span class="font-body-md text-on-surface-variant">1-2 Hari</span>
<span class="mt-4 font-bold text-primary">Rp 15.000</span>
</label>
<!-- SiCepat Option -->
<label class="relative flex flex-col p-4 border-2 border-outline-variant/50 rounded-xl cursor-pointer hover:border-primary transition-all group">
<input class="absolute top-4 right-4 text-primary focus:ring-primary" name="expedition" type="radio">
<span class="font-label-md text-label-md text-on-surface mb-1">SiCepat Halu</span>
<span class="font-body-md text-on-surface-variant">3-5 Hari</span>
<span class="mt-4 font-bold text-primary">Rp 9.000</span>
</label>
</div>
</section>
<!-- Payment Method Section -->
<section class="bg-surface-container-lowest p-8 rounded-xl border border-outline-variant/30">
<div class="flex items-center gap-3 mb-8">
<span class="material-symbols-outlined text-secondary" style="font-variation-settings: 'FILL' 1;">payments</span>
<h2 class="font-headline-md text-headline-md">Metode Pembayaran</h2>
</div>
<div class="space-y-4">
<!-- Bank Transfer -->
<div class="border border-outline-variant/30 rounded-xl overflow-hidden">
<div class="bg-surface-container-low p-4 flex items-center justify-between">
<span class="font-label-md text-label-md">Bank Transfer (Manual Verification)</span>
<span class="material-symbols-outlined text-on-surface-variant">account_balance</span>
</div>
<div class="p-6 grid grid-cols-2 md:grid-cols-4 gap-4">
<button class="flex flex-col items-center gap-2 p-4 border border-outline-variant/30 rounded-lg hover:bg-primary/5 hover:border-primary transition-all">
<div class="w-12 h-8 bg-outline-variant/20 rounded flex items-center justify-center font-bold text-[10px]">BCA</div>
<span class="text-[10px] font-label-sm">BCA Transfer</span>
</button>
<button class="flex flex-col items-center gap-2 p-4 border border-outline-variant/30 rounded-lg hover:bg-primary/5 hover:border-primary transition-all">
<div class="w-12 h-8 bg-outline-variant/20 rounded flex items-center justify-center font-bold text-[10px]">MANDIRI</div>
<span class="text-[10px] font-label-sm">Mandiri Transfer</span>
</button>
<button class="flex flex-col items-center gap-2 p-4 border border-outline-variant/30 rounded-lg hover:bg-primary/5 hover:border-primary transition-all">
<div class="w-12 h-8 bg-outline-variant/20 rounded flex items-center justify-center font-bold text-[10px]">BNI</div>
<span class="text-[10px] font-label-sm">BNI Transfer</span>
</button>
<button class="flex flex-col items-center gap-2 p-4 border border-outline-variant/30 rounded-lg hover:bg-primary/5 hover:border-primary transition-all">
<div class="w-12 h-8 bg-outline-variant/20 rounded flex items-center justify-center font-bold text-[10px]">BRI</div>
<span class="text-[10px] font-label-sm">BRI Transfer</span>
</button>
</div>
</div>
<!-- E-wallet -->
<div class="border border-outline-variant/30 rounded-xl overflow-hidden">
<div class="bg-surface-container-low p-4 flex items-center justify-between">
<span class="font-label-md text-label-md">E-wallet &amp; QRIS</span>
<span class="material-symbols-outlined text-on-surface-variant">qr_code_2</span>
</div>
<div class="p-6 grid grid-cols-2 md:grid-cols-4 gap-4">
<button class="flex flex-col items-center gap-2 p-4 border border-outline-variant/30 rounded-lg hover:bg-primary/5 hover:border-primary transition-all">
<div class="w-12 h-8 bg-outline-variant/20 rounded flex items-center justify-center font-bold text-[10px]">GOPAY</div>
<span class="text-[10px] font-label-sm">GoPay</span>
</button>
<button class="flex flex-col items-center gap-2 p-4 border border-outline-variant/30 rounded-lg hover:bg-primary/5 hover:border-primary transition-all">
<div class="w-12 h-8 bg-outline-variant/20 rounded flex items-center justify-center font-bold text-[10px]">OVO</div>
<span class="text-[10px] font-label-sm">OVO</span>
</button>
<button class="flex flex-col items-center gap-2 p-4 border border-outline-variant/30 rounded-lg hover:bg-primary/5 hover:border-primary transition-all">
<div class="w-12 h-8 bg-outline-variant/20 rounded flex items-center justify-center font-bold text-[10px]">DANA</div>
<span class="text-[10px] font-label-sm">DANA</span>
</button>
<button class="flex flex-col items-center gap-2 p-4 border border-outline-variant/30 rounded-lg hover:bg-primary/5 hover:border-primary transition-all">
<div class="w-12 h-8 bg-outline-variant/20 rounded flex items-center justify-center font-bold text-[10px]">QRIS</div>
<span class="text-[10px] font-label-sm">QRIS All Payment</span>
</button>
</div>
</div>
</div>
</section>
</div>
<aside class="lg:col-span-4">
    <div class="sticky top-32 flex flex-col gap-6">
        <div class="bg-primary-container text-on-primary rounded-xl p-8 shadow-xl relative overflow-hidden">
            <div class="absolute -bottom-10 -right-10 opacity-10 scale-150 rotate-12 pointer-events-none">
                <span class="material-symbols-outlined text-[200px]">grid_view</span>
            </div>
            <h2 class="font-headline-md text-headline-md mb-6 relative z-10">Ringkasan Total</h2>
            
            <div class="space-y-4 relative z-10">
                <?php 
                $subtotal = 0;
                // Pastikan $_SESSION['cart'] tidak kosong dan berupa array
                if (!empty($_SESSION['cart']) && is_array($_SESSION['cart'])):
                    // Gunakan array_unique untuk menghindari duplikasi id
                    $cart_ids = implode(',', array_map('intval', array_unique($_SESSION['cart'])));
                    $result = $db->query("SELECT name, price, image_url FROM products WHERE id IN ($cart_ids)");
                    
                    if ($result):
                        while ($item = $result->fetch_assoc()):
                            $subtotal += $item['price'];
                ?>
                <div class="flex items-start gap-4 pb-4 border-b border-on-primary-container/30">
                    <div class="w-16 h-16 bg-white rounded-lg overflow-hidden flex-shrink-0">
                        <img class="w-full h-full object-cover" src="<?php echo htmlspecialchars($item['image_url']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>">
                    </div>
                    <div class="flex-grow min-w-0">
                        <p class="font-label-md text-label-md text-white truncate"><?php echo htmlspecialchars($item['name']); ?></p>
                        <p class="text-sm text-on-primary-container">Qty: 1</p>
                        <p class="font-bold text-white mt-1">Rp <?php echo number_format($item['price'], 0, ',', '.'); ?></p>
                    </div>
                </div>
                <?php 
                        endwhile; 
                    endif;
                endif; 
                
                $ongkir = 12000;
                $asuransi = 2000;
                $total_bayar = $subtotal + $ongkir + $asuransi;
                ?>

                <div class="pt-2 space-y-2">
                    <div class="flex justify-between font-body-md text-on-primary-container">
                        <span>Subtotal</span>
                        <span>Rp <?php echo number_format($subtotal, 0, ',', '.'); ?></span>
                    </div>
                    <div class="flex justify-between font-body-md text-on-primary-container">
                        <span>Ongkos Kirim</span>
                        <span>Rp <?php echo number_format($ongkir, 0, ',', '.'); ?></span>
                    </div>
                    <div class="flex justify-between font-body-md text-on-primary-container">
                        <span>Asuransi (Opsional)</span>
                        <span>Rp <?php echo number_format($asuransi, 0, ',', '.'); ?></span>
                    </div>
                    <div class="flex justify-between font-headline-md text-headline-md text-white pt-4 border-t border-on-primary-container/50">
                        <span>Total Bayar</span>
                        <span>Rp <?php echo number_format($total_bayar, 0, ',', '.'); ?></span>
                    </div>
                </div>
            </div>
            
            <form action="kirim_wa.php" method="POST">
         <!-- Tambahkan input tersembunyi agar data total terkirim ke server -->
            <input type="hidden" name="total_bayar" value="<?php echo $total_bayar; ?>">
    
            <button type="submit" class="w-full mt-8 bg-secondary-container text-on-secondary-container hover:bg-secondary-container/90 active:scale-95 transition-all py-4 rounded-full font-headline-md text-headline-md shadow-lg flex items-center justify-center gap-2 group">
             Bayar Sekarang
            <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
            </button>
            </form>
            <div class="mt-6 flex items-center justify-center gap-2 text-xs text-on-primary-container/70">
                <span class="material-symbols-outlined text-sm">lock</span>
                Pembayaran Aman & Terenkripsi
            </div>
        </div>
    </div>
</aside>
<!-- Success Message (Hidden by default) -->
<div class="fixed inset-0 z-[100] flex items-center justify-center bg-on-surface/40 backdrop-blur-sm hidden" id="success-overlay">
<div class="bg-surface-container-lowest p-10 rounded-2xl max-w-sm w-full text-center shadow-2xl scale-90 opacity-0 transition-all duration-300" id="success-modal">
<div class="w-20 h-20 bg-primary-container text-white rounded-full flex items-center justify-center mx-auto mb-6">
<span class="material-symbols-outlined text-[40px]">check_circle</span>
</div>
<h3 class="font-headline-lg text-headline-lg text-primary mb-2">Terima Kasih!</h3>
<p class="text-on-surface-variant mb-8">Pesanan Anda telah kami terima. Silakan selesaikan pembayaran sesuai petunjuk yang dikirimkan ke WhatsApp Anda.</p>
<button class="w-full bg-primary text-white py-3 rounded-xl font-label-md text-label-md" onclick="closeSuccess()">Kembali Ke Beranda</button>
</div>
</div>
<!-- BottomNavBar (Mobile Only) -->
<nav class="fixed bottom-0 left-0 w-full z-50 flex justify-around items-center px-4 py-3 md:hidden bg-surface/90 dark:bg-inverse-surface/90 backdrop-blur-md border-t border-outline-variant/20 shadow-lg rounded-t-xl">
<a class="flex flex-col items-center justify-center text-on-surface-variant dark:text-on-surface-variant/70 active:scale-90 transition-all" href="#">
<span class="material-symbols-outlined">home</span>
<span class="font-label-sm text-label-sm mt-1">Home</span>
</a>
<a class="flex flex-col items-center justify-center text-on-surface-variant dark:text-on-surface-variant/70 active:scale-90 transition-all" href="#">
<span class="material-symbols-outlined">search</span>
<span class="font-label-sm text-label-sm mt-1">Search</span>
</a>
<div class="flex flex-col items-center justify-center bg-secondary-container dark:bg-secondary text-on-secondary-container dark:text-on-secondary rounded-full px-4 py-1 active:scale-90 transition-all">
<span class="material-symbols-outlined">shopping_basket</span>
<span class="font-label-sm text-label-sm">Cart</span>
</div>
<a class="flex flex-col items-center justify-center text-on-surface-variant dark:text-on-surface-variant/70 active:scale-90 transition-all" href="#">
<span class="material-symbols-outlined">person</span>
<span class="font-label-sm text-label-sm mt-1">Profile</span>
</a>
</nav>
<script>
        // Micro-interactions for buttons
        document.querySelector('button.group').addEventListener('click', function() {
            const overlay = document.getElementById('success-overlay');
            const modal = document.getElementById('success-modal');
            
            overlay.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('scale-90', 'opacity-0');
                modal.classList.add('scale-100', 'opacity-100');
            }, 10);
        });

        function closeSuccess() {
            const overlay = document.getElementById('success-overlay');
            const modal = document.getElementById('success-modal');
            
            modal.classList.add('scale-90', 'opacity-0');
            modal.classList.remove('scale-100', 'opacity-100');
            setTimeout(() => {
                overlay.classList.add('hidden');
            }, 300);
        }

        // Ripple/Selection effect for payment methods
        const payBtns = document.querySelectorAll('.grid-cols-4 button');
        payBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                payBtns.forEach(b => b.classList.remove('bg-primary/10', 'border-primary', 'ring-1', 'ring-primary'));
                btn.classList.add('bg-primary/10', 'border-primary', 'ring-1', 'ring-primary');
            });
        });
    </script>
</body></html>