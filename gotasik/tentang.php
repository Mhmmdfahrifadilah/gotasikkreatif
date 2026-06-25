<!DOCTYPE html><?php require_once __DIR__ . "/db.php"; ?><html class="scroll-smooth" lang="en"><head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>Heritage of Tasikmalaya | TasikKreatifGo</title>
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
        .bento-pattern {
            background-image: radial-gradient(rgba(0, 6, 102, 0.05) 1px, transparent 1px);
            background-size: 20px 20px;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
    </style>
</head>
<body class="bg-surface text-on-surface font-body-md overflow-x-hidden">
<!-- TopNavBar Shell -->
<nav class="bg-surface border-b border-outline-variant sticky top-0 z-[100] h-20">
<div class="flex justify-between items-center w-full px-margin-desktop max-w-container-max mx-auto h-full">
<div class="text-headline-md font-headline-md font-extrabold text-primary">TasikKreatifGo</div>
<div class="hidden md:flex items-center gap-8">
<a class="text-on-surface-variant font-medium hover:text-secondary transition-colors duration-200 text-label-md font-label-md" href="index.php">Home</a>
<a class="text-on-surface-variant font-medium hover:text-secondary transition-colors duration-200 text-label-md font-label-md" href="katalog.php">Catalog</a>
<a class="text-primary font-bold border-b-2 border-primary pb-1 text-label-md font-label-md" href="tentang.php">About</a>
<div class="relative ml-4">
<input class="bg-surface-container-low border border-outline-variant rounded-full px-4 py-1.5 text-sm focus:ring-2 focus:ring-primary outline-none w-48 transition-all focus:w-64" placeholder="Search crafts..." type="text">
</div>
</div>
<button class="bg-primary text-on-primary px-6 py-2.5 rounded-full font-label-md text-label-md hover:bg-primary-container transition-all active:scale-95">UMKM Login</button>
</div>
</nav>
<main class="relative">
<!-- Hero Section: Animated Background & Story Intro -->
<section class="relative h-[921px] flex items-center justify-center overflow-hidden px-margin-mobile md:px-0">

<div class="relative z-10 text-center max-w-4xl mx-auto space-y-6">
<span class="bg-secondary-fixed text-on-secondary-fixed px-4 py-1 rounded-full text-label-sm font-label-sm uppercase tracking-widest">Est. Generations Ago</span>
<h1 class="text-headline-xl font-headline-xl text-primary leading-tight">Menciptakan Jiwa <br><span class="text-secondary">Tasikmalaya</span></h1>
<p class="text-body-lg font-body-lg text-on-surface-variant max-w-2xl mx-auto">Dari bunyi gemerincing alat tenun yang berirama hingga aliran tinta canting yang halus, temukan warisan hidup ibu kota kreatif Jawa Barat.</p>
<div class="pt-8">
<a class="inline-flex items-center gap-2 bg-primary text-on-primary px-8 py-4 rounded-full font-label-md transition-all hover:shadow-lg hover:-translate-y-1" href="#heritage-start">
                        Memulai perjalanan
                        <span class="material-symbols-outlined">arrow_downward</span>
</a>
</div>
</div>
<!-- Subtle Batik Watermark -->
<div class="absolute -bottom-24 -left-24 w-96 h-96 opacity-5 pointer-events-none rotate-12">
<img class="w-full h-full object-contain" data-alt="A subtle, traditional Indonesian batik pattern watermark featuring geometric floral motifs and organic lines in a monochromatic navy blue, rendered with high transparency to serve as a background decorative element." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAbtimD5UQyrudPzgacuq5w6pqtxPGsD4_UELy4S_KM7VMOcmstPtQV8nMkHFsFG-dIaZu_xQeRUsBHDxjFckzM53tm5FaVZn4XObccUUmThU6MX3JTrrACFyXHFcgcyVeVAFJWE0gqzHqICT33whty1UsKHNgthZTTjnZRCGzMineu1gajO7fvOfbF1LyfuHyw1FCSqrPPIGjn3hBlD-qeVVV54eF2p8zcHInfwjGEB9DbzcrjryD8JOdV5VtmPicCW-M799Bzgf5A">
</div>
</section>
<!-- Section 1: Batik Tasik (Asymmetric Storytelling) -->
<section class="py-24 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto overflow-hidden" id="heritage-start">
<div class="grid grid-cols-1 md:grid-cols-12 gap-12 items-center">
<div class="md:col-span-7 relative group">
<div class="aspect-square bg-surface-container rounded-xl overflow-hidden shadow-lg transform transition-transform group-hover:scale-[1.02] duration-500">
<img class="w-full h-full object-cover" data-alt="Close-up of a skilled artisan applying hot wax using a traditional copper canting tool onto a white fabric. The design shows a vibrant Batik Tasik pattern with signature bright colors like red and yellow, featuring the 'Merak Ngibing' (dancing peacock) motif in a sun-drenched studio setting." src="https://lh3.googleusercontent.com/aida-public/AB6AXuA89X3zgKvruLwDV1VF2_AF-unnj7ELZvNVxfiHBIuJgN857m4wpBzCm_jMtFIUcibc_kK_c1Oc4G2yFL1Og0DclmnB-Zyc02Jf-_eU8Q_Km3pNcPT2xTFXbtGTmpkFdXyWXwjQpXC5fQouUWtNz_LW7HMIvyS9gof3eeui8f767xsowakNlIoDftd7f8LrhqJwiAQ2Ub78Npk3SnTo8GPUipgbsCx0avmnkBiJaYLCab_Ta3wV0cypaDp8jW89rXRGZtoUqX1cE1wo">
</div>
<div class="absolute -bottom-8 -right-8 glass-card p-6 rounded-xl border border-outline-variant max-w-xs shadow-xl hidden md:block">
<p class="text-label-sm text-secondary font-bold uppercase mb-2">Tahukah kamu?</p>
<p class="text-body-md text-on-surface-variant italic">"Batik Tasik dikenal dengan warna 'Kelir'-nya—warna-warna cerah yang mencerminkan semangat riang dataran tinggi Priangan."</p>
</div>
</div>
<div class="md:col-span-5 space-y-6">
<h2 class="text-headline-lg font-headline-lg text-primary">Batik Tasik: <br>Palet Priangan</h2>
<p class="text-body-md text-on-surface-variant leading-relaxed">Berbeda dengan warna-warna yang dalam dan suram dari batik Jawa Tengah, Batik Tasikmalaya meledak dengan warna-warna cerah. Batik ini membawa jiwa masyarakat Sundanese—bersemangat, hangat, dan sangat terhubung dengan alam.</p>
<div class="space-y-4">
<div class="flex items-start gap-4">
<span class="material-symbols-outlined text-secondary bg-secondary-fixed p-2 rounded-lg">palette</span>
<div>
<h4 class="font-bold text-primary">Warna Khas</h4>
<p class="text-sm text-on-surface-variant">Warna-warna cerah seperti merah terang, kuning cerah, dan biru tajam mendefinisikan gaya 'Tasikan'.</p>
</div>
</div>
<div class="flex items-start gap-4">
<span class="material-symbols-outlined text-secondary bg-secondary-fixed p-2 rounded-lg">nature_people</span>
<div>
<h4 class="font-bold text-primary">Motif Alami</h4>
<p class="text-sm text-on-surface-variant">Motif-motif seperti 'Merak Ngibing' merepresentasikan keanggunan burung-burung lokal dalam tarian.</p>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- Section 2: Bordir Kawalu (The Bento Grid of Precision) -->
<section class="bg-surface-container py-24 px-margin-mobile md:px-margin-desktop">
<div class="max-w-container-max mx-auto">
<div class="text-center mb-16 max-w-2xl mx-auto">
<h2 class="text-headline-lg font-headline-lg text-primary mb-4">Bordir Kawalu: <br>Grid Presisi</h2>
<p class="text-body-md text-on-surface-variant">Bordir Kawalu dikenal di seluruh Asia Tenggara sebagai contoh sempurna dari kesabaran dan presisi mikroskopis.</p>
</div>
<div class="grid grid-cols-1 md:grid-cols-4 md:grid-rows-2 gap-6 h-auto md:h-[600px]">
<div class="md:col-span-2 md:row-span-2 relative overflow-hidden rounded-xl border border-outline-variant shadow-sm hover:shadow-xl transition-all group">
<img class="w-full h-full object-cover" data-alt="A wide-angle shot of a traditional embroidery workshop in Kawalu, Tasikmalaya. Rows of industrial-strength sewing machines are operated by skilled artisans working on intricate white kebaya fabrics. The atmosphere is professional yet traditional, with rolls of silk and colorful thread lining the walls under bright, natural daylight." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCoHBQGhLlhUhHlcN5KFXgHJ4o1UA9TYm-VBkf5oBKH7hFXQXqJ8P79eZj5N4hhNXgGreQgbhz_S7SqwdGEn149RiEsMa_SdirJ-wWjvlv6JmXw6tvBFCiK0NFqOFLfdf3lK-b9uew7YPmO_ieRYMi-s29XoiBA1v_LE4kKuGvOQUeKHnaFClWEByMKFpMa7H3f4aZl-2yJkZupI5uN-SCEfXsrLRAdkA7s8TQh2Q3yfMDTfAkWU9EE7Cle-6Xa_o50XBTLmkSwGssx">
<div class="absolute inset-0 bg-gradient-to-t from-primary/80 to-transparent flex flex-col justify-end p-8 text-white translate-y-4 group-hover:translate-y-0 transition-transform">
<h3 class="text-headline-md font-bold">Bordir Kawalu</h3>
<p class="text-sm opacity-90">Contoh sempurna dari kesabaran dan presisi mikroskopis.</p>
</div>
</div>
<div class="md:col-span-2 md:row-span-1 bg-white p-8 rounded-xl border border-outline-variant flex items-center gap-6 group hover:border-secondary transition-colors">
<div class="w-24 h-24 flex-shrink-0 bg-surface rounded-full flex items-center justify-center text-primary group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined text-4xl">precision_manufacturing</span>
</div>
<div>
<h3 class="text-xl font-bold text-primary mb-2">Detail Mikroskopis</h3>
<p class="text-sm text-on-surface-variant">Setiap jahitan ditempatkan dengan penuh pertimbangan, menciptakan tekstur yang terasa seperti lukisan sutra di atas kain.</p>
</div>
</div>
<div class="md:col-span-1 md:row-span-1 overflow-hidden rounded-xl">
<img class="w-full h-full object-cover" data-alt="Macro photography of exquisite embroidery on a traditional Sundanese wedding garment. The golden threads form intricate floral lace patterns that stand out against a rich cream silk background. The lighting is soft and luxurious, highlighting the metallic sheen of the embroidery." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAH9n1PSCSnt0U_z4c-h6KN4wVBtP1MtPH36B8JqFWQwKHjbzgkC_GRNNmvAf498hT_Vmg6t1tH5uE_lUb-J5_OhyOxNgctKDvJ1LLi4q-10OOwI0YZ6shlNo0T8KqxOAG_Erdk4RX_Z3F12JKKtaFjrjWwc1J012wY6M50ritBM12sH0s2DKGd5uB6YPXBLwZSOhIkpo8UK6bKo7Z8jqItjI4PZhcQ-sX4nRooAvly8TuSEeJzrV8rLybuPMy-01q0KlZCEk39uSxn">
</div>
<div class="md:col-span-1 md:row-span-1 bg-secondary text-on-secondary p-8 rounded-xl flex flex-col justify-center">
<span class="text-4xl font-bold mb-2">90%</span>
<p class="text-sm">Ekspor bordir premium Jawa Barat berasal dari bengkel-bengkel di Kawalu.</p>
</div>
</div>
</div>
</section>
<!-- Section 3: Mendong Weaving (Organic Tones) -->
<section class="py-24 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto bento-pattern">
<div class="flex flex-col md:flex-row items-center gap-16">
<div class="w-full md:w-1/2 space-y-8 order-2 md:order-1">
<div class="inline-flex items-center gap-2 text-secondary font-bold text-label-md">
<span class="w-8 h-px bg-secondary"></span>
                        Keberlanjutan yang Berakar pada Tradisi
                    </div>
<h2 class="text-headline-lg font-headline-lg text-primary">Mendong: <br>Kesabaran Sang Penenun</h2>
<p class="text-body-lg text-on-surface-variant">Mendong adalah rumput tangguh yang tumbuh di lahan basah Tasikmalaya. Melalui proses pengeringan, pewarnaan, dan penenunan tangan yang membutuhkan banyak tenaga, tanaman sederhana ini diubah menjadi tas, tikar, dan dekorasi rumah kelas dunia.</p>
<div class="grid grid-cols-2 gap-4">
<div class="bg-white p-4 rounded-lg shadow-sm border border-outline-variant">
<h4 class="font-bold text-primary">Ramah Lingkungan</h4>
<p class="text-xs text-on-surface-variant mt-1">Serat alami 100% dengan produksi tanpa limbah.</p>
</div>
<div class="bg-white p-4 rounded-lg shadow-sm border border-outline-variant">
<h4 class="font-bold text-primary">Tenun Tangan</h4>
<p class="text-xs text-on-surface-variant mt-1">Setiap bagian membutuhkan waktu berhari-hari pengerjaan manual yang teliti.</p>
</div>
</div>
<button class="border-2 border-secondary text-secondary px-8 py-3 rounded-full font-label-md hover:bg-secondary hover:text-on-secondary transition-all">Jelajahi Koleksi Mendong</button>
</div>
<div class="w-full md:w-1/2 relative order-1 md:order-2">
<div class="relative z-10 rounded-2xl overflow-hidden shadow-2xl rotate-3 hover:rotate-0 transition-transform duration-500">
<img class="w-full h-64 md:h-[500px] object-cover" data-alt="A portrait of an elderly Tasikmalaya craftsman weaving Mendong grass on a rustic wooden floor. The morning sun casts long shadows, highlighting the golden texture of the dried grass and the weathered, experienced hands of the artisan. The background is a traditional wooden house filled with finished woven baskets and mats." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAPdY3Wz2p-OWTbNq3eSZSyqk1cEsQLOH8PAZLs3ew7xiGnT5OHuUPQ3PRNz6K7jUe8Oz2Sej0SAccWSlXp6yuAhi2JWIygn2rBxsdPnnjD-5JkZUxjuRcgRV92uvb6TbBBcR7oI5ubOccsyTVxK3UgxbxqnKiNcTMkC8CuqGg02YOaa9xkiude0ebPTI9XDc2-4FGKyGIA8KFr58Lvu46waWBDU7sKpgHVbSvjYZqKu98wV_YPU-AXsZiOcH_rWj5I2MKUjurn1LvT">
</div>
<div class="absolute inset-0 bg-tertiary-container/10 -rotate-3 rounded-2xl -z-10 translate-x-4 translate-y-4"></div>
</div>
</div>
</section>
<!-- CTA Section: Support Local MSMEs -->
<section class="py-24 px-margin-mobile md:px-margin-desktop text-center">
<div class="max-w-3xl mx-auto bg-primary-container p-12 md:p-20 rounded-[40px] text-on-primary-container relative overflow-hidden">

<div class="relative z-10">
<h2 class="text-headline-lg font-headline-lg text-white mb-6">Memberdayakan Para Perajin Kita</h2>
<p class="text-body-lg text-primary-fixed mb-10">Setiap pembelian yang Anda lakukan secara langsung mendukung sebuah keluarga di Tasikmalaya, menjaga tradisi berusia berabad-abad tetap hidup di era digital.</p>
<div class="flex flex-col md:flex-row gap-4 justify-center">
<a class="bg-secondary-container text-on-secondary-container px-10 py-4 rounded-full font-headline-md text-headline-md shadow-lg hover:scale-105 transition-transform" href="katalog.php">jelajahi toko</a>
<a class="bg-transparent border-2 border-primary-fixed text-primary-fixed px-10 py-4 rounded-full font-headline-md text-headline-md hover:bg-primary-fixed hover:text-primary transition-colors" href="login.php">Jadilah Mitra</a>
</div>
</div>
</div>
</section>
</main>
<!-- Footer Shell -->
<footer class="bg-tertiary-container text-on-tertiary-container py-12 px-margin-desktop">
<div class="max-w-container-max mx-auto grid grid-cols-1 md:grid-cols-4 gap-gutter">
<div class="space-y-4">
<div class="text-headline-sm font-headline-sm font-bold text-on-tertiary">TasikKreatifGo</div>
<p class="text-label-sm opacity-80 leading-relaxed">Merayakan Keunggulan UMKM Tasikmalaya melalui pemberdayaan digital dan pelestarian warisan budaya.</p>
</div>
<div>
<h4 class="text-on-tertiary font-bold mb-4">Crafts</h4>
<ul class="space-y-2 text-label-sm">
<li><a class="opacity-80 hover:opacity-100 hover:text-secondary-fixed transition-opacity" href="#">Batik</a></li>
<li><a class="opacity-80 hover:opacity-100 hover:text-secondary-fixed transition-opacity" href="#">Bordir</a></li>
<li><a class="opacity-80 hover:opacity-100 hover:text-secondary-fixed transition-opacity" href="#">Anyaman</a></li>
<li><a class="opacity-80 hover:opacity-100 hover:text-secondary-fixed transition-opacity" href="#">Kelom Geulis</a></li>
</ul>
</div>
<div>
<h4 class="text-on-tertiary font-bold mb-4">Company</h4>
<ul class="space-y-2 text-label-sm">
<li><a class="opacity-80 hover:opacity-100 hover:text-secondary-fixed transition-opacity" href="#">About Us</a></li>
<li><a class="opacity-80 hover:opacity-100 hover:text-secondary-fixed transition-opacity" href="#">Contact Us</a></li>
<li><a class="opacity-80 hover:opacity-100 hover:text-secondary-fixed transition-opacity" href="#">Privacy Policy</a></li>
</ul>
</div>
<div class="space-y-4">
<h4 class="text-on-tertiary font-bold">Newsletter</h4>
<div class="flex">
<input class="bg-tertiary border-none rounded-l-lg text-sm w-full focus:ring-0" placeholder="Your email" type="email">
<button class="bg-secondary-container text-on-secondary-container px-4 rounded-r-lg">
<span class="material-symbols-outlined">send</span>
</button>
</div>
</div>
</div>
<div class="max-w-container-max mx-auto mt-12 pt-8 border-t border-on-tertiary-container/20 text-center text-label-sm opacity-60">
            © 2024 TasikKreatifGo. Celebrating Tasikmalaya's MSME Excellence.
        </div>
</footer>
<!-- BottomNavBar Shell (Mobile Only) -->
<nav class="fixed bottom-0 left-0 w-full z-50 flex justify-around items-center px-4 py-3 md:hidden bg-surface shadow-[0_-4px_12px_rgba(0,0,0,0.05)] rounded-t-full">
<a class="flex flex-col items-center justify-center text-on-surface-variant" href="#">
<span class="material-symbols-outlined">home</span>
<span class="text-label-sm font-label-sm-mobile">Home</span>
</a>
<a class="flex flex-col items-center justify-center text-on-surface-variant" href="#">
<span class="material-symbols-outlined">grid_view</span>
<span class="text-label-sm font-label-sm-mobile">Catalog</span>
</a>
<a class="flex flex-col items-center justify-center bg-secondary-container text-on-secondary-container rounded-full px-4 py-1 scale-90 transition-transform duration-150" href="#">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">storefront</span>
<span class="text-label-sm font-label-sm-mobile">Portal</span>
</a>
<a class="flex flex-col items-center justify-center text-on-surface-variant" href="#">
<span class="material-symbols-outlined">person</span>
<span class="text-label-sm font-label-sm-mobile">Profile</span>
</a>
</nav>
<script>
        // Micro-interactions and scroll effects
        document.addEventListener('DOMContentLoaded', () => {
            const observerOptions = {
                threshold: 0.1
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('opacity-100', 'translate-y-0');
                        entry.target.classList.remove('opacity-0', 'translate-y-10');
                    }
                });
            }, observerOptions);

            // Adding animation classes to sections
            document.querySelectorAll('section').forEach(section => {
                section.classList.add('transition-all', 'duration-1000', 'ease-out', 'opacity-0', 'translate-y-10');
                observer.observe(section);
            });
        });
    </script>
</body></html>