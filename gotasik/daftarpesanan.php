<!DOCTYPE html><?php require_once __DIR__ . "/db.php"; ?><html class="light" lang="id"><head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>Riwayat Penjualan - Mitra Tasik</title>
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
        body { font-family: 'Work Sans', sans-serif; background-color: #f3faff; }
        .batik-pattern {
            background-image: radial-gradient(circle at 2px 2px, rgba(0, 6, 102, 0.05) 1px, transparent 0);
            background-size: 24px 24px;
        }
        .order-card-hover:hover {
            box-shadow: 0px 8px 24px rgba(26, 35, 126, 0.08);
            transform: translateY(-2px);
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>
<body class="bg-surface text-on-surface">
<div class="flex min-h-screen">
<!-- SideNavBar - Desktop -->
<aside class="hidden lg:flex flex-col py-8 gap-4 bg-surface-container-low border-r border-outline-variant/30 h-screen w-64 fixed left-0 top-0 z-40">
<div class="px-6 mb-6">
<div class="flex items-center gap-3 mb-8">
<div class="w-12 h-12 rounded-full overflow-hidden border-2 border-primary">
<img class="w-full h-full object-cover" data-alt="A professional headshot of a smiling Indonesian artisan in a clean, brightly lit studio. They are wearing a modern batik shirt with deep blue patterns. The background shows soft-focus shelves of handcrafted pottery and woven goods, reflecting a premium craft brand identity." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAilLoRPvD1AnsD95XnYEpVy8phfQ9FKdthp9eUt0JQjmFmmCTP7r_fv6WC8SvjkFjNSK7dgsPx5NXcBzjKhGL4B6zFq3ebe2K9_RMk7aGOGJ7bq0mvgdp5H5spBGEhyLMD5qjXstK4Gbv2NEfcYIjIN-yARrYB8nv8FQNLdW_lr5hn2FUVh54-qxxpXU9_kSfD3dmHTgK1oAdULNG7cFrcfiG3bWcPkMlNgN0ZJ8Gy1AL2EixHou1FPfGOjpj-MrJz_I7SdX0RXH_l">
</div>
<div>
<h2 class="font-headline-md text-primary text-base">Mitra Tasik</h2>
<p class="text-on-surface-variant text-[12px] font-medium">Verified Artisan</p>
</div>
</div>
<div class="flex flex-col gap-2">
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-surface-variant/50 rounded-xl mx-2 transition-transform duration-200 hover:translate-x-1" href="#">
<span class="material-symbols-outlined">grid_view</span>
<span class="font-label-md">Overview</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-surface-variant/50 rounded-xl mx-2 transition-transform duration-200 hover:translate-x-1" href="#">
<span class="material-symbols-outlined">inventory_2</span>
<span class="font-label-md">Inventory</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 bg-primary text-on-primary rounded-xl mx-2 shadow-md" href="#">
<span class="material-symbols-outlined">receipt_long</span>
<span class="font-label-md">Sales</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-surface-variant/50 rounded-xl mx-2 transition-transform duration-200 hover:translate-x-1" href="#">
<span class="material-symbols-outlined">analytics</span>
<span class="font-label-md">Insights</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-surface-variant/50 rounded-xl mx-2 transition-transform duration-200 hover:translate-x-1" href="#">
<span class="material-symbols-outlined">settings</span>
<span class="font-label-md">Settings</span>
</a>
</div>
</div>
<div class="mt-auto px-6">
<button class="w-full bg-secondary-container text-on-secondary-container font-label-md py-4 rounded-xl shadow-lg flex items-center justify-center gap-2 active:scale-95 transition-transform">
<span class="material-symbols-outlined">add</span>
                    Add Product
                </button>
</div>
</aside>
<!-- Main Content Area -->
<main class="flex-1 lg:ml-64 batik-pattern min-h-screen px-margin-mobile md:px-margin-desktop py-8 mb-20 md:mb-0">
<!-- Header Section -->
<header class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
<div>
<nav class="flex items-center gap-2 text-on-surface-variant text-sm mb-2">
<span>Dashboard</span>
<span class="material-symbols-outlined text-xs">chevron_right</span>
<span class="text-primary font-semibold">Riwayat Penjualan</span>
</nav>
<h1 class="font-headline-lg text-primary">Daftar Pesanan</h1>
<p class="text-on-surface-variant font-body-md mt-1">Kelola transaksi dan pantau pengiriman produk kerajinan Anda.</p>
</div>
<div class="flex gap-3">
<button class="flex items-center gap-2 px-5 py-2.5 border border-outline-variant rounded-xl bg-surface-container-lowest text-on-surface font-label-md hover:bg-surface-variant transition-colors">
<span class="material-symbols-outlined">download</span>
                        Ekspor Laporan
                    </button>
</div>
</header>
<!-- Filters & Stats Bento Grid -->
<section class="grid grid-cols-1 md:grid-cols-4 gap-gutter mb-12">
<!-- Filters -->
<div class="md:col-span-3 bg-surface-container-lowest border border-outline-variant/30 rounded-xl p-6 flex flex-wrap items-center gap-4">
<div class="flex-1 min-w-[200px]">
<label class="block text-label-sm text-on-surface-variant mb-2">Cari Pesanan</label>
<div class="relative">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">search</span>
<input class="w-full pl-10 pr-4 py-2.5 bg-surface-container-low border-none rounded-lg focus:ring-2 focus:ring-primary text-sm" placeholder="No. Pesanan atau Nama Pembeli..." type="text">
</div>
</div>
<div class="w-full md:w-auto">
<label class="block text-label-sm text-on-surface-variant mb-2">Status</label>
<select class="w-full md:w-48 py-2.5 bg-surface-container-low border-none rounded-lg focus:ring-2 focus:ring-primary text-sm">
<option>Semua Status</option>
<option>Belum Dibayar</option>
<option>Perlu Dikirim</option>
<option>Selesai</option>
</select>
</div>
<div class="w-full md:w-auto">
<label class="block text-label-sm text-on-surface-variant mb-2">Rentang Tanggal</label>
<div class="relative">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">calendar_today</span>
<input class="w-full md:w-64 pl-10 pr-4 py-2.5 bg-surface-container-low border-none rounded-lg focus:ring-2 focus:ring-primary text-sm" type="text" value="01 Jan 2024 - 31 Jan 2024">
</div>
</div>
</div>
<!-- Summary Stat Card -->
<div class="bg-primary text-on-primary rounded-xl p-6 flex flex-col justify-between shadow-lg">
<span class="text-label-sm opacity-80 uppercase tracking-widest">Total Penjualan</span>
<div>
<div class="text-3xl font-headline-lg">Rp 12.450k</div>
<div class="text-sm mt-1 text-on-primary-container">+12% dari bulan lalu</div>
</div>
</div>
</section>
<!-- Orders Table/List -->
<div class="bg-surface-container-lowest border border-outline-variant/20 rounded-xl overflow-hidden">
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-surface-container-high border-b border-outline-variant/30">
<th class="px-6 py-4 font-label-md text-on-surface-variant">No. Pesanan</th>
<th class="px-6 py-4 font-label-md text-on-surface-variant">Detail Produk</th>
<th class="px-6 py-4 font-label-md text-on-surface-variant">Pembeli</th>
<th class="px-6 py-4 font-label-md text-on-surface-variant">Total Transaksi</th>
<th class="px-6 py-4 font-label-md text-on-surface-variant">Status</th>
<th class="px-6 py-4 font-label-md text-on-surface-variant text-right">Aksi</th>
</tr>
</thead>
<tbody class="divide-y divide-outline-variant/10">
<!-- Order Item 1 -->
<tr class="order-card-hover transition-all duration-200">
<td class="px-6 py-6">
<span class="text-primary font-bold">#TK-99281</span>
<div class="text-label-sm text-outline mt-1">12 Jan 2024, 14:30</div>
</td>
<td class="px-6 py-6">
<div class="flex items-center gap-3">
<div class="w-12 h-12 rounded bg-surface-container overflow-hidden flex-shrink-0">
<img class="w-full h-full object-cover" data-alt="A close-up professional photograph of a Tasikmalaya hand-woven bamboo mat. The weaving is intricate and traditional, shown in high resolution with soft side lighting highlighting the natural texture and golden-brown tones of the bamboo." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDpVPiMhWrgsYYZtEjSqRXCb9oU3TBvHXFglNyrD67s4oSrm-GDeGUpZXCKVG2d5qODNrZO5_u3s2qw-iY6w943-Ll2aVE6zvRuWa07ER8UDKqp-Dj3XylBoSfXO86TdUIxlUfXB9nY7pk9OEdTRkF1SUe6x69l8cKWASal1J0kWDj1genoScjE2879LABoYtiyiwn2H2e_xa4bueVSam4Qoy1E9d8ef_NQFJ9mavC9VmI96kpBgXhA0MmObLU7Rst-CnVCpXXvcYq3">
</div>
<div>
<div class="font-label-md text-on-surface">Anyaman Tikar Bambu Eksklusif</div>
<div class="text-label-sm text-outline">Qty: 2</div>
</div>
</div>
</td>
<td class="px-6 py-6">
<div class="font-body-md text-on-surface">Aditya Pratama</div>
<div class="text-label-sm text-outline">Jakarta Selatan</div>
</td>
<td class="px-6 py-6">
<div class="font-bold text-on-surface">Rp 450.000</div>
<div class="text-label-sm text-secondary">Transfer Bank BCA</div>
</td>
<td class="px-6 py-6">
<span class="px-3 py-1 bg-secondary-fixed-dim/30 text-on-secondary-fixed-variant rounded-full text-[12px] font-bold">Perlu Dikirim</span>
</td>
<td class="px-6 py-6 text-right">
<button class="text-primary hover:bg-primary/10 p-2 rounded-full transition-colors">
<span class="material-symbols-outlined">visibility</span>
</button>
<button class="text-primary hover:bg-primary/10 p-2 rounded-full transition-colors ml-2">
<span class="material-symbols-outlined">local_shipping</span>
</button>
</td>
</tr>
<!-- Order Item 2 -->
<tr class="order-card-hover transition-all duration-200">
<td class="px-6 py-6">
<span class="text-primary font-bold">#TK-99275</span>
<div class="text-label-sm text-outline mt-1">11 Jan 2024, 09:15</div>
</td>
<td class="px-6 py-6">
<div class="flex items-center gap-3">
<div class="w-12 h-12 rounded bg-surface-container overflow-hidden flex-shrink-0">
<img class="w-full h-full object-cover" data-alt="A macro shot of vibrant embroidery on a traditional kebaya fabric. The needlework is incredibly detailed, featuring floral motifs in silk threads of royal blue, terracotta, and gold. The lighting is crisp and museum-quality, emphasizing the craftsmanship." src="https://lh3.googleusercontent.com/aida-public/AB6AXuA5kSRUXnxkxt7r5NdrrzaL6FwmrVqTypnW08ppQ88lkZNTlBjbv-mE7TuwSimi4shDMFwKr9UC0xM994A4k4BoPOlV4mnkA-7zTCpoxWMd9t4qFO8Oe_U4NrmoFYyckr0lYW7m3n_wXkP1NJn1TNdykvbAEPThdcw3JzW6pPvHMrUMyiyipTQl4rNxwlRVFBxiQBf_pznEA-2CEPTuZrw5tge17POY9PRJtPPmBwV2xS268WFFVXmnpqLsvyYThFFC8VydEFdK-0tp">
</div>
<div>
<div class="font-label-md text-on-surface">Kain Bordir Tasik Motif Floral</div>
<div class="text-label-sm text-outline">Qty: 1</div>
</div>
</div>
</td>
<td class="px-6 py-6">
<div class="font-body-md text-on-surface">Siti Rahmawati</div>
<div class="text-label-sm text-outline">Bandung</div>
</td>
<td class="px-6 py-6">
<div class="font-bold text-on-surface">Rp 825.000</div>
<div class="text-label-sm text-outline">Saldo Digital</div>
</td>
<td class="px-6 py-6">
<span class="px-3 py-1 bg-surface-container-high text-on-surface-variant rounded-full text-[12px] font-bold">Selesai</span>
</td>
<td class="px-6 py-6 text-right">
<button class="text-primary hover:bg-primary/10 p-2 rounded-full transition-colors">
<span class="material-symbols-outlined">visibility</span>
</button>
</td>
</tr>
<!-- Order Item 3 -->
<tr class="order-card-hover transition-all duration-200">
<td class="px-6 py-6">
<span class="text-primary font-bold">#TK-99260</span>
<div class="text-label-sm text-outline mt-1">10 Jan 2024, 18:45</div>
</td>
<td class="px-6 py-6">
<div class="flex items-center gap-3">
<div class="w-12 h-12 rounded bg-surface-container overflow-hidden flex-shrink-0">
<img class="w-full h-full object-cover" data-alt="Studio photograph of a handcrafted ceramic vase with a matte terracotta finish and subtle geometric etchings. The vase is placed on a minimalist pedestal against a clean, off-white background with soft, sophisticated shadows." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAZUOXwpjWNZ-p4BmWI1Py-Qdp-U5-VaKnqU54QI4PuMXxzuvPL1w7Wn_HtHNPXcRT52zxn7WUYLD6vsnMo_pTvPKM66nehcuvT08pclQaGth-W5hvCAr1zVoLlKPct8--qROH0WtKW654jRQ_HVdxN0iNpigEQ6uRul-FDF3Ha9ZkEuzrjz2s16hvsyOOE-MrS2iHRLhgtQHPtNac6tC1pXGWuckj5Uvz6cpAFCue3MROat8eqexapft4WU1_iS6y3mqLGXbS1HzoR">
</div>
<div>
<div class="font-label-md text-on-surface">Vas Keramik Etnik Minimalis</div>
<div class="text-label-sm text-outline">Qty: 3</div>
</div>
</div>
</td>
<td class="px-6 py-6">
<div class="font-body-md text-on-surface">Budi Santoso</div>
<div class="text-label-sm text-outline">Surabaya</div>
</td>
<td class="px-6 py-6">
<div class="font-bold text-on-surface">Rp 1.200.000</div>
<div class="text-label-sm text-outline">Pending Payment</div>
</td>
<td class="px-6 py-6">
<span class="px-3 py-1 bg-error-container text-on-error-container rounded-full text-[12px] font-bold">Belum Dibayar</span>
</td>
<td class="px-6 py-6 text-right">
<button class="text-primary hover:bg-primary/10 p-2 rounded-full transition-colors">
<span class="material-symbols-outlined">visibility</span>
</button>
<button class="text-error hover:bg-error/10 p-2 rounded-full transition-colors ml-2">
<span class="material-symbols-outlined">cancel</span>
</button>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Pagination -->
<div class="px-6 py-4 bg-surface-container-low flex items-center justify-between">
<span class="text-label-sm text-on-surface-variant">Menampilkan 1-10 dari 124 pesanan</span>
<div class="flex gap-2">
<button class="w-10 h-10 flex items-center justify-center rounded-lg border border-outline-variant hover:bg-surface-variant transition-colors disabled:opacity-30" disabled="">
<span class="material-symbols-outlined">chevron_left</span>
</button>
<button class="w-10 h-10 flex items-center justify-center rounded-lg bg-primary text-on-primary font-bold shadow-sm">1</button>
<button class="w-10 h-10 flex items-center justify-center rounded-lg border border-outline-variant hover:bg-surface-variant transition-colors">2</button>
<button class="w-10 h-10 flex items-center justify-center rounded-lg border border-outline-variant hover:bg-surface-variant transition-colors">3</button>
<button class="w-10 h-10 flex items-center justify-center rounded-lg border border-outline-variant hover:bg-surface-variant transition-colors">
<span class="material-symbols-outlined">chevron_right</span>
</button>
</div>
</div>
</div>
</main>
<!-- BottomNavBar - Mobile Only -->
<nav class="fixed bottom-0 left-0 w-full z-50 flex justify-around items-center px-4 py-3 md:hidden bg-surface/90 backdrop-blur-md border-t border-outline-variant/20 shadow-lg rounded-t-xl">
<a class="flex flex-col items-center justify-center text-on-surface-variant/70 active:scale-90 transition-all" href="#">
<span class="material-symbols-outlined">home</span>
<span class="text-label-sm">Home</span>
</a>
<a class="flex flex-col items-center justify-center text-on-surface-variant/70 active:scale-90 transition-all" href="#">
<span class="material-symbols-outlined">search</span>
<span class="text-label-sm">Search</span>
</a>
<a class="flex flex-col items-center justify-center bg-secondary-container text-on-secondary-container rounded-full px-4 py-1 active:scale-90 transition-all" href="#">
<span class="material-symbols-outlined">receipt_long</span>
<span class="text-label-sm">Sales</span>
</a>
<a class="flex flex-col items-center justify-center text-on-surface-variant/70 active:scale-90 transition-all" href="#">
<span class="material-symbols-outlined">person</span>
<span class="text-label-sm">Profile</span>
</a>
</nav>
</div>
<script>
        // Micro-interactions and subtle effects
        document.querySelectorAll('tr').forEach(row => {
            row.addEventListener('click', () => {
                // In a real app, this would navigate to detail page
                console.log('Order detail click');
            });
        });

        // Search highlight logic (placeholder)
        const searchInput = document.querySelector('input[type="text"]');
        searchInput.addEventListener('input', (e) => {
            // Logic for filtering table would go here
            console.log('Filtering for:', e.target.value);
        });
    </script>
</body></html>