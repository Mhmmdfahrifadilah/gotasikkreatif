<!DOCTYPE html><?php require_once __DIR__ . "/db.php"; ?><html class="light" lang="id"><head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>Mitra Tasik - Dashboard UMKM</title>
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
        body {
            background-color: #f3faff;
            background-image: radial-gradient(circle at 2px 2px, rgba(0, 6, 102, 0.03) 1px, transparent 0);
            background-size: 40px 40px;
        }
        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #c6c5d4;
            border-radius: 10px;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(236, 239, 241, 1);
        }
        .batik-overlay {
            mask-image: radial-gradient(circle, black 50%, transparent 100%);
            opacity: 0.05;
        }
    </style>
</head>
<body class="font-body-md text-on-background selection:bg-secondary-container selection:text-on-secondary-container overflow-hidden">
<div class="flex h-screen overflow-hidden">
<!-- SideNavBar -->
<aside class="hidden lg:flex flex-col py-8 gap-4 bg-surface-container-low dark:bg-inverse-surface border-r border-outline-variant/30 h-screen w-64 shrink-0">
<div class="px-6 mb-8">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-full overflow-hidden bg-primary-container">
<img class="w-full h-full object-cover" data-alt="A professional portrait of a West Javanese artisan, elderly with a kind smile, wearing traditional batik clothing, in a high-quality studio setting with soft warm lighting. The style is modern corporate photography, emphasizing trust and heritage craftsmanship." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCTNJlXHe2UhHrzGzNsi6X0wgULbw1Y2UdZ43-YEZWMS2P6tbBDzqoftM11FV1t76xdIVS4dxKAE21IQbccUWWGkxf2xi5PM353ZRWThtOpNQzN3YeWTCbJ0Lu_b9sBfvwOTAj0l_TVGu14EZXGwxNxcARBrElFDyv2AGrCqMa17EAAxXzPs5PQsHx3jO0IhwjHXMPYj_2TX3i0BOyxPQoF6LRsnD5GioltTP-KUjL1Ac45cay6RErN4QbetF7tIRu9PJDI8AfmFBCA">
</div>
<div>
<h2 class="font-headline-md text-primary dark:text-inverse-primary text-[18px]">Mitra Tasik</h2>
<p class="font-label-sm text-on-surface-variant flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]" style="font-variation-settings: 'FILL' 1;">verified</span> Verified Artisan
                        </p>
</div>
</div>
</div>
<nav class="flex-1 space-y-2">
<!-- Navigation Tabs based on JSON -->
<a class="flex items-center gap-3 py-3 px-4 bg-primary text-on-primary rounded-xl mx-2 font-label-md transition-all" href="#">
<span class="material-symbols-outlined">grid_view</span>
<span>Overview</span>
</a>
<a class="flex items-center gap-3 py-3 px-4 text-on-surface-variant hover:bg-surface-variant/50 rounded-xl mx-2 font-label-md transition-all hover:translate-x-1 duration-200" href="#">
<span class="material-symbols-outlined">inventory_2</span>
<span>Inventory</span>
</a>
<a class="flex items-center gap-3 py-3 px-4 text-on-surface-variant hover:bg-surface-variant/50 rounded-xl mx-2 font-label-md transition-all hover:translate-x-1 duration-200" href="#">
<span class="material-symbols-outlined">receipt_long</span>
<span>Sales</span>
</a>
<a class="flex items-center gap-3 py-3 px-4 text-on-surface-variant hover:bg-surface-variant/50 rounded-xl mx-2 font-label-md transition-all hover:translate-x-1 duration-200" href="#">
<span class="material-symbols-outlined">analytics</span>
<span>Insights</span>
</a>
<a class="flex items-center gap-3 py-3 px-4 text-on-surface-variant hover:bg-surface-variant/50 rounded-xl mx-2 font-label-md transition-all hover:translate-x-1 duration-200" href="#">
<span class="material-symbols-outlined">settings</span>
<span>Settings</span>
</a>
</nav>
<div class="px-4 mt-auto">
<button class="w-full py-3 bg-secondary text-on-secondary rounded-full font-label-md flex items-center justify-center gap-2 hover:bg-secondary/90 transition-all active:scale-95 shadow-sm">
<span class="material-symbols-outlined">add</span>
                    Add Product
                </button>
</div>
</aside>
<!-- Main Content Area -->
<main class="flex-1 overflow-y-auto custom-scrollbar relative">
<!-- Top Bar (Contextual) -->
<header class="sticky top-0 z-30 bg-surface/80 backdrop-blur-xl border-b border-outline-variant/30 px-margin-mobile md:px-margin-desktop h-20 flex justify-between items-center">
<div class="lg:hidden flex items-center gap-3">
<span class="material-symbols-outlined text-primary">menu</span>
<h1 class="font-headline-md text-primary tracking-tight">TasikKreatifGo</h1>
</div>
<div class="hidden lg:block">
<h1 class="font-headline-md text-on-surface">Dashboard Overview</h1>
</div>
<div class="flex items-center gap-4">
<div class="relative hidden sm:block">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">search</span>
<input class="pl-10 pr-4 py-2 bg-surface-container-low border-none rounded-full text-sm focus:ring-2 focus:ring-primary w-64 transition-all" placeholder="Search insights..." type="text">
</div>
<button class="p-2 text-on-surface-variant hover:bg-surface-variant/50 rounded-full transition-all">
<span class="material-symbols-outlined">notifications</span>
</button>
<button class="p-2 text-on-surface-variant hover:bg-surface-variant/50 rounded-full transition-all">
<span class="material-symbols-outlined">account_circle</span>
</button>
</div>
</header>
<div class="p-margin-mobile md:p-margin-desktop max-w-container-max mx-auto space-y-gutter">
<!-- Quick Stats Bento Grid -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-gutter">
<!-- Sales Stat Card -->
<div class="glass-card p-6 rounded-xl space-y-4 hover:shadow-[0px_8px_24px_rgba(26,35,126,0.08)] transition-all duration-300">
<div class="flex justify-between items-start">
<div class="p-2 bg-primary-container/10 rounded-lg text-primary">
<span class="material-symbols-outlined">payments</span>
</div>
<span class="text-xs font-bold text-green-600 bg-green-50 px-2 py-1 rounded-full">+12.5%</span>
</div>
<div>
<p class="font-label-sm text-outline uppercase tracking-wider">Total Penjualan</p>
<h3 class="font-headline-lg text-on-surface">Rp 12.4M</h3>
</div>
</div>
<!-- Products Stat Card -->
<div class="glass-card p-6 rounded-xl space-y-4 hover:shadow-[0px_8px_24px_rgba(26,35,126,0.08)] transition-all duration-300">
<div class="flex justify-between items-start">
<div class="p-2 bg-secondary-container/10 rounded-lg text-secondary">
<span class="material-symbols-outlined">inventory</span>
</div>
<span class="text-xs font-bold text-on-surface-variant bg-surface-variant px-2 py-1 rounded-full">Aktif</span>
</div>
<div>
<p class="font-label-sm text-outline uppercase tracking-wider">Produk Aktif</p>
<h3 class="font-headline-lg text-on-surface">42 Item</h3>
</div>
</div>
<!-- New Orders Stat Card -->
<div class="glass-card p-6 rounded-xl space-y-4 hover:shadow-[0px_8px_24px_rgba(26,35,126,0.08)] transition-all duration-300 border-2 border-primary/10">
<div class="flex justify-between items-start">
<div class="p-2 bg-primary text-on-primary rounded-lg">
<span class="material-symbols-outlined">shopping_cart_checkout</span>
</div>
<span class="animate-pulse text-xs font-bold text-primary bg-primary-fixed px-2 py-1 rounded-full">Urgent</span>
</div>
<div>
<p class="font-label-sm text-outline uppercase tracking-wider">Pesanan Baru</p>
<h3 class="font-headline-lg text-primary">08</h3>
</div>
</div>
<!-- Messages Stat Card -->
<div class="glass-card p-6 rounded-xl space-y-4 hover:shadow-[0px_8px_24px_rgba(26,35,126,0.08)] transition-all duration-300">
<div class="flex justify-between items-start">
<div class="p-2 bg-tertiary-container/10 rounded-lg text-tertiary">
<span class="material-symbols-outlined">forum</span>
</div>
<div class="w-2 h-2 bg-secondary rounded-full"></div>
</div>
<div>
<p class="font-label-sm text-outline uppercase tracking-wider">Pesan Pembeli</p>
<h3 class="font-headline-lg text-on-surface">15 Baru</h3>
</div>
</div>
</div>
<!-- Main Analytics Section -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-gutter">
<!-- Sales Chart Area -->
<div class="lg:col-span-2 glass-card p-8 rounded-xl space-y-6">
<div class="flex justify-between items-center">
<div>
<h3 class="font-headline-md text-on-surface">Statistik Penjualan</h3>
<p class="text-sm text-on-surface-variant">Data harian 7 hari terakhir</p>
</div>
<select class="bg-surface-container border-none text-xs rounded-full px-4 py-2 focus:ring-primary">
<option>Minggu Ini</option>
<option>Bulan Ini</option>
</select>
</div>
<!-- Visual Graph Placeholder with SVG -->
<div class="w-full h-64 relative mt-4 flex items-end justify-between gap-4 px-2 overflow-hidden">
<div class="absolute inset-0 bg-gradient-to-t from-primary/5 to-transparent rounded-lg"></div>
<div class="w-full h-full absolute flex items-center justify-center">
<svg class="w-full h-40 overflow-visible" viewBox="0 0 400 100">
<path class="text-primary" d="M0,80 Q50,70 100,40 T200,50 T300,10 T400,30" fill="none" stroke="currentColor" stroke-width="3"></path>
<path class="opacity-10" d="M0,80 Q50,70 100,40 T200,50 T300,10 T400,30 V100 H0 Z" fill="url(#grad)"></path>
<defs>
<linearGradient id="grad" x1="0%" x2="0%" y1="0%" y2="100%">
<stop offset="0%" style="stop-color:rgb(0,6,102);stop-opacity:1"></stop>
<stop offset="100%" style="stop-color:rgb(0,6,102);stop-opacity:0"></stop>
</linearGradient>
</defs>
</svg>
</div>
<!-- Bars for visualization -->
<div class="w-full flex items-end justify-between h-48 z-10">
<div class="w-8 bg-primary/20 rounded-t-sm h-[40%] transition-all hover:bg-primary/40"></div>
<div class="w-8 bg-primary/20 rounded-t-sm h-[65%] transition-all hover:bg-primary/40"></div>
<div class="w-8 bg-primary/20 rounded-t-sm h-[45%] transition-all hover:bg-primary/40"></div>
<div class="w-8 bg-primary rounded-t-sm h-[85%] transition-all hover:bg-primary shadow-lg"></div>
<div class="w-8 bg-primary/20 rounded-t-sm h-[30%] transition-all hover:bg-primary/40"></div>
<div class="w-8 bg-primary/20 rounded-t-sm h-[55%] transition-all hover:bg-primary/40"></div>
<div class="w-8 bg-primary/20 rounded-t-sm h-[70%] transition-all hover:bg-primary/40"></div>
</div>
</div>
<div class="flex justify-between text-[10px] text-outline font-bold uppercase tracking-widest px-2">
<span>Sen</span><span>Sel</span><span>Rab</span><span>Kam</span><span>Jum</span><span>Sab</span><span>Min</span>
</div>
</div>
<!-- Recent Messages Sidebar -->
<div class="glass-card p-6 rounded-xl flex flex-col h-full">
<div class="flex justify-between items-center mb-6">
<h3 class="font-headline-md text-[20px] text-on-surface">Pesan Terbaru</h3>
<button class="text-primary text-xs font-bold hover:underline">Lihat Semua</button>
</div>
<div class="space-y-4 overflow-y-auto max-h-[350px] custom-scrollbar pr-2">
<!-- Message Item -->
<div class="flex gap-3 p-3 rounded-lg hover:bg-surface-container-low transition-colors cursor-pointer group">
<div class="w-10 h-10 rounded-full bg-surface-dim overflow-hidden flex-shrink-0">
<img class="w-full h-full object-cover" data-alt="Portrait of a young Indonesian female customer, trendy clothing, bright natural lighting, professional photography style." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBjc9bR7hc_twm29_V4291aBZLPNR_56qFrDCU4X4kGwmnxFByvuSgUDu-GvYwoUABjUXTIlt-Jj0uFKgJeSV4_NtzIwSFwE44S8vUB_AN2S4Ilqi1v_FJp5ZLwsc7iP0bLO2xw7h_P3xwfoJ2IbkVxlsK1mqNl4ZAiFCFjI27fZHff3x4faGX6n4592bSkwVHMNtsRcS2iuLjAzqG6BPhIQgAMCppZ6wmGESHG2xw9AnMZBhoXKupylTWVrQiATaj11fVUO0Z6vZF8">
</div>
<div class="flex-1 min-w-0">
<div class="flex justify-between items-center">
<p class="text-sm font-bold text-on-surface truncate">Siti Aminah</p>
<span class="text-[10px] text-outline">10m</span>
</div>
<p class="text-xs text-on-surface-variant truncate">"Apakah stok Kerajinan Anyaman tersedia?"</p>
</div>
<div class="w-2 h-2 bg-secondary rounded-full self-center"></div>
</div>
<!-- Message Item -->
<div class="flex gap-3 p-3 rounded-lg hover:bg-surface-container-low transition-colors cursor-pointer group">
<div class="w-10 h-10 rounded-full bg-surface-dim overflow-hidden flex-shrink-0">
<img class="w-full h-full object-cover" data-alt="Close up portrait of a customer, minimalist background, friendly expression, high-end photography for an e-commerce profile." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAazt_9uWfbQbzlUH-aV8Y_IDJozP8clQLLjcgJLCEJ8sUWYi-JuRActYYW92By6spKbf0w4QkUxp8I4r0nH5vOc5vn6g99h16yAirc-A9qZj7769jf9xbFS2MY2FKPbqhBOTG_3o-cLE8uAxXBo3n6SJqnAFvz4gb-P2vsBoDTysKk1ccqptOZlTnbyn2lBK-cdMzZIrfKQlmzGiXTEjMu9aw5yNGfopNh0t-AHeDRoFHWRLRLL5n3pKau-Z6L6jVQJ5DQUaSKef7B">
</div>
<div class="flex-1 min-w-0">
<div class="flex justify-between items-center">
<p class="text-sm font-bold text-on-surface truncate">Budi Hartono</p>
<span class="text-[10px] text-outline">2h</span>
</div>
<p class="text-xs text-on-surface-variant truncate">"Kapan pesanan saya dikirim, Pak?"</p>
</div>
</div>
<!-- Message Item -->
<div class="flex gap-3 p-3 rounded-lg hover:bg-surface-container-low transition-colors cursor-pointer group">
<div class="w-10 h-10 rounded-full bg-surface-dim overflow-hidden flex-shrink-0">
<img class="w-full h-full object-cover" data-alt="A smiling Indonesian professional male portrait, neat hair, light blue background, modern digital avatar style." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCp5fv-9podGPvnpSa1yfJaJft_4uFi9uQwZKGIvgAcpeX_1qFEjbapwD1ua0tkpPJ4h2Tcm480R3E_N4aqHMP0lAmIGz-XOEf-MV1Ll-c0xZKlXNZBbZDgFwE60tMnLRVO-evD3_CpHlXVSn-6GiuUQh1I_oONllQ9UoXeHpQXiLmlhsKGWgdFwsqEyP9wmqgpYdcNWxBrsJ4FuAUXVsj1HUXOB-XHJcuF2XMkrK12khh2SPSzw79sXALk6rdsWRgW8bKoRx6mxFqo">
</div>
<div class="flex-1 min-w-0">
<div class="flex justify-between items-center">
<p class="text-sm font-bold text-on-surface truncate">Andi Wijaya</p>
<span class="text-[10px] text-outline">5h</span>
</div>
<p class="text-xs text-on-surface-variant truncate">"Terima kasih barang sudah sampai bagus!"</p>
</div>
</div>
</div>
</div>
</div>
<!-- Orders to Process Table -->
<div class="glass-card rounded-xl overflow-hidden border-none shadow-sm">
<div class="p-6 flex justify-between items-center border-b border-outline-variant/20">
<h3 class="font-headline-md text-[22px] text-on-surface">Pesanan Perlu Diproses</h3>
<button class="bg-surface-container-highest text-on-surface-variant px-4 py-2 rounded-full text-xs font-bold hover:bg-primary hover:text-white transition-all">Export Report</button>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left">
<thead class="bg-surface-container-low text-outline text-[11px] uppercase tracking-widest">
<tr>
<th class="px-6 py-4">Produk</th>
<th class="px-6 py-4">Pembeli</th>
<th class="px-6 py-4">Waktu</th>
<th class="px-6 py-4">Status</th>
<th class="px-6 py-4 text-right">Aksi</th>
</tr>
</thead>
<tbody class="divide-y divide-outline-variant/10">
<tr class="hover:bg-surface-container-lowest transition-colors">
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<div class="w-12 h-12 rounded bg-surface-variant overflow-hidden">
<img class="w-full h-full object-cover" data-alt="A beautifully crafted Tasikmalaya woven pandan mat, intricate geometric patterns, organic earthy colors, high-end artisanal product photography." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBnV_U3yr9CFFO1VeaDD8LG94BpaaWI085VS4xa9qNAtUJkNH_n7qDcgYRylSqfmASWg_Snd8fVSYyqWLO3SmJLsvbOP9ECK2XjU3YqfUnRMfWKcdqzKaZ9eR7-hFPArvSkWu5oBZC59I9Yd0FK26BUcyKrluQFpX8OCKT3bmz2g-Ga4IX3fKDNhwXlrsBOzNg71gTVMaxIvYDPAM4Yvv4MQT1K8MIEQh5w9HIeFlZjb9S71ECTAtR-1_Cm1k9q-oXlDD5LGtXXFwtD">
</div>
<span class="font-bold text-sm">Tikar Pandan Premium</span>
</div>
</td>
<td class="px-6 py-4 text-sm">Rina Saraswati</td>
<td class="px-6 py-4 text-sm text-outline">Hari ini, 14:20</td>
<td class="px-6 py-4">
<span class="px-3 py-1 bg-secondary-container/20 text-secondary text-[10px] font-bold rounded-full border border-secondary/20">MENUNGGU</span>
</td>
<td class="px-6 py-4 text-right">
<button class="text-primary font-bold text-sm hover:underline">Proses</button>
</td>
</tr>
<tr class="hover:bg-surface-container-lowest transition-colors">
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<div class="w-12 h-12 rounded bg-surface-variant overflow-hidden">
<img class="w-full h-full object-cover" data-alt="Detailed close up of Tasikmalaya traditional hand embroidery on fine silk fabric, vibrant flower motifs, exquisite craftsmanship." src="https://lh3.googleusercontent.com/aida-public/AB6AXuARFFn4jufSGQARCefEoTlKpF4tIdDtgx5LbsJb_qI6ehu32EJEn1ZPnDwZ873ZfYDbPDA5_zJ2W5j3OYiMqxs4wlS501FVx1bEwd06Xqmme8CcXYo9zFYzPN5o5ZVaJItHTaKY2IBLgmtBmkfneKzjzdi9YMMfaIPCVFWKfyqr5tEsAjY8dRmbu_cg4f1pZuDSo7nvjamKnOL7zM1i1OREzczlS8X2mpLCsIFg5aVcRmRI-_hn-HG93GeYWOcBNFEUMZyzHDCCsVpo">
</div>
<span class="font-bold text-sm">Syal Bordir Tasik</span>
</div>
</td>
<td class="px-6 py-4 text-sm">Denny Kusuma</td>
<td class="px-6 py-4 text-sm text-outline">Kemarin, 11:45</td>
<td class="px-6 py-4">
<span class="px-3 py-1 bg-surface-variant text-on-surface-variant text-[10px] font-bold rounded-full">DIKEMAS</span>
</td>
<td class="px-6 py-4 text-right">
<button class="text-primary font-bold text-sm hover:underline">Detail</button>
</td>
</tr>
<tr class="hover:bg-surface-container-lowest transition-colors">
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<div class="w-12 h-12 rounded bg-surface-variant overflow-hidden">
<img class="w-full h-full object-cover" data-alt="Artisanal pottery from Tasikmalaya, organic clay texture, minimalist elegant shape, warm natural lighting on a clean white surface." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDrtmTPTQBHkZG8maBkH-36QCWFMsTCNABu_1QSIlpz6eLiRQDOdfB145COW9deMUtee3jZLgc87rMFyctsHNVsVm0WWFMsYLWzH9h4Od1fCX3jCaOqr9sBYq30pQto7YDba6m9D_46b6Oq_rDn6BePXLUSlgMVAG2dMuO3GB1MmbjMF5yx6ih23tB6V_QiYYT4OAuiKrCCiaMdYjGesx2ZXuNKuW2-SB_fJSFL0Vm2QoeZDIhBfKfBmTuSbgrSYMPjArL4788_JavP">
</div>
<span class="font-bold text-sm">Pot Keramik Tanah</span>
</div>
</td>
<td class="px-6 py-4 text-sm">Mega Utami</td>
<td class="px-6 py-4 text-sm text-outline">12 Des 2023</td>
<td class="px-6 py-4">
<span class="px-3 py-1 bg-green-100 text-green-700 text-[10px] font-bold rounded-full">SELESAI</span>
</td>
<td class="px-6 py-4 text-right">
<button class="text-primary font-bold text-sm hover:underline">Ulasan</button>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
<!-- Footer-ish area -->
<footer class="mt-20 py-10 px-margin-desktop border-t border-outline-variant/20 bg-surface-container-low/50">
<div class="flex flex-col md:flex-row justify-between items-center gap-4 opacity-60">
<p class="text-xs font-label-sm">© 2024 TasikKreatifGo Ecosystem. Mitra UMKM Dashboard v2.4</p>
<div class="flex gap-6">
<a class="text-xs font-label-sm hover:text-primary" href="#">Panduan Mitra</a>
<a class="text-xs font-label-sm hover:text-primary" href="#">Bantuan</a>
<a class="text-xs font-label-sm hover:text-primary" href="#">Kebijakan Privasi</a>
</div>
</div>
</footer>
</main>
</div>
<!-- Mobile Bottom NavBar (from JSON) -->
<nav class="fixed bottom-0 left-0 w-full z-50 flex justify-around items-center px-4 py-3 md:hidden bg-surface/90 backdrop-blur-md border-t border-outline-variant/20 shadow-lg rounded-t-xl">
<a class="flex flex-col items-center justify-center bg-secondary-container text-on-secondary-container rounded-full px-4 py-1 active:scale-90 transition-all duration-150" href="#">
<span class="material-symbols-outlined">home</span>
<span class="font-label-sm text-[10px]">Home</span>
</a>
<a class="flex flex-col items-center justify-center text-on-surface-variant active:scale-90 transition-all duration-150" href="#">
<span class="material-symbols-outlined">search</span>
<span class="font-label-sm text-[10px]">Search</span>
</a>
<a class="flex flex-col items-center justify-center text-on-surface-variant active:scale-90 transition-all duration-150" href="#">
<span class="material-symbols-outlined">shopping_basket</span>
<span class="font-label-sm text-[10px]">Cart</span>
</a>
<a class="flex flex-col items-center justify-center text-on-surface-variant active:scale-90 transition-all duration-150" href="#">
<span class="material-symbols-outlined">person</span>
<span class="font-label-sm text-[10px]">Profile</span>
</a>
</nav>
<script>
        // Simple Micro-interaction for hover states
        document.querySelectorAll('.glass-card').forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-4px)';
            });
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0)';
            });
        });
    </script>
</body></html>