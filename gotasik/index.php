
<!DOCTYPE html><?php require_once __DIR__ . "/db.php"; ?><html class="light" lang="id"><head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>TasikKreatifGo - Keajaiban Kreativitas Tasikmalaya</title>
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
        .batik-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M30 0l15 30-15 30L15 30z' fill='%234c56af' fill-opacity='0.03'/%3E%3C/svg%3E");
        }
        .glass-nav {
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .product-card:hover .ambient-shadow {
            box-shadow: 0px 8px 24px rgba(26, 35, 126, 0.08);
        }
    </style>
</head>
<body class="bg-surface text-on-surface batik-pattern font-body-md overflow-x-hidden">
<!-- TopNavBar -->
<header class="fixed top-0 left-0 w-full z-50 bg-surface/90 dark:bg-inverse-surface/90 glass-nav border-b border-outline-variant dark:border-outline">
<div class="flex justify-between items-center w-full px-margin-desktop max-w-container-max mx-auto h-20">
<a class="text-headline-md font-headline-md font-extrabold text-primary dark:text-primary-fixed-dim" href="index.php">
                TasikKreatifGo
            </a>
<nav class="hidden md:flex items-center gap-8">
<a class="text-primary dark:text-primary-fixed-dim font-bold border-b-2 border-primary dark:border-primary-fixed-dim pb-1 transition-all" href="index.php">Home</a>
<a class="text-on-surface-variant dark:text-surface-variant font-medium hover:text-secondary dark:hover:text-secondary-fixed-dim transition-colors duration-200" href="katalog.php">Catalog</a>
<a class="text-on-surface-variant dark:text-surface-variant font-medium hover:text-secondary dark:hover:text-secondary-fixed-dim transition-colors duration-200" href="tentang.php">About</a>
</nav>
<div class="flex items-center gap-4">
<button class="material-symbols-outlined text-on-surface-variant p-2">search</button>
<a class="bg-primary text-on-primary px-6 py-2.5 rounded-lg text-label-md hover:opacity-80 active:scale-95 transition-all" href="login.php">
                    UMKM Login
                </a>
</div>
</div>
</header>
<main class="pt-20">
<!-- Hero Section -->
<section class="relative h-[870px] flex items-center overflow-hidden">
<div class="absolute inset-0 z-0">
<div class="grid grid-cols-2 md:grid-cols-4 h-full w-full opacity-60">
<div class="bg-cover bg-center h-full" data-alt="Close-up macro shot of intricate Tasikmalaya Batik patterns with deep indigo and terracotta threads. The lighting is soft and natural, emphasizing the texture of the hand-woven fabric. Corporate professional aesthetic with rich cultural depth." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuC84Oj6pZ7pbBldJFJkivkvdGpVl7CRPZdpGypZkEGNeXJYxUKYk1wLGWNTqyYEwt-VTGsZM8OqF0flqgc3A9W9GwjF1AjA1MAWaAadETmhmtgWQFFuY3kZK1pJB7ueljNfdrlplPZuNmVhoaGESA-rTovgFzyXiTlDM1V7jMM8GYiBm8tm5Jy28uDQrphzXTINVpeTEv3tLEZzNXp0t73BrrmCoqJIaScjqf4uMpqu5DAgSGjF2USmk1WMNopcnF8KDduXUpGTfWqw')"></div>
<div class="bg-cover bg-center h-full hidden md:block" data-alt="A master artisan working on detailed Bordir embroidery in a bright, modern studio in Tasikmalaya. The focus is on the precision of the needlework against a clean white cloth background. High-key lighting, professional photography style." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBe41X69ayFHBn5NrxDmYoEsLcTOCJ0n1bgN-PTXCFpVTkhogLim9Q7ptIqtweH_HPjWImkuDvsrA-GgBmVSqCeYprJr2pfN_ej1KQcVG-z4UtUrNhREkthb39rmtOOrPJua1ce1CdTSORJI32PahsJ6Czq8Qux5YX8CvlHvEj_MuFIHTtAoLfRosduxPMwO1785pb0v7Y9--uJLBcelwY-xoFpWiYj_QKVRyVLKN58y4OtnZ9-Fsjy8JRs1J4ejZhrb2MoWaV5Weyz')"></div>
<div class="bg-cover bg-center h-full hidden md:block" data-alt="Traditional Kelom Geulis wooden sandals beautifully displayed on a minimalist wooden pedestal. The polished wood finish and hand-painted floral motifs are highlighted by warm ambient lighting. Elegant, boutique-style product photography." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCjBT4KQZ92bqOnRWSuVvQKDgg_Gq7sfZ4JRRZu01TE56Bf-iaHSW0m_72DQTTGDEaz4e6suWxMTziHuFHdS6xSGMNNIfAocMRdycd3Xh_oFq6xGNR-IjziDOMpEWhx3O3Hdx7nhlspY_YfZeHkYdnvuAJhjluhVIW4xEWHZquOLJewfQFCwQmu2I5-W6rSifR2wKA-zWGg3K-2iFusMSQGJhuty-4EbiPtm_HAjk9bEMcmVDqjG2qog9GItCqPHEvYj_XMktNeTxSF')"></div>
<div class="bg-cover bg-center h-full" data-alt="Artisanal hand-woven bamboo baskets (Anyaman) arranged in a sophisticated geometric composition. Natural earth tones, soft shadows, and clean lines create a modern yet traditional atmosphere. High-end craft showcase." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAcs1eyTPnxr95rNYXXCmtdGkksJuUdK97rSNa5-0ZCX5zVdsJUl_-S_FTyrdX32tHqBIFq4Hf9q2g7OSegXFu6OSwC5aG3NkvzZb-HKEjbX_wdle13Z5gP1AhgiZy5qwkWrZT5JsTfRNEZzHwi8E_ew3rMu-x4M-NgHZwXucy436RGP6XNYFldbfeesAqVDF11D38C1ycNNfpSdrdJ2wJTaXvivX3Si5UHU69HXBpLgDoCDDBp6eX0un46fznn88a1J7oKCS6eZImF')"></div>
</div>
<div class="absolute inset-0 bg-gradient-to-r from-surface via-surface/60 to-transparent"></div>
</div>
<div class="relative z-10 px-margin-desktop max-w-container-max mx-auto w-full">
<div class="max-w-2xl">
<span class="inline-block bg-secondary-container text-on-secondary-container px-4 py-1 rounded-full text-label-md mb-6 animate-fade-in">
                        Warisan Budaya Tasikmalaya
                    </span>
<h1 class="font-headline-xl text-headline-xl text-primary leading-[1.1] mb-6">
                        Keajaiban Kreativitas Tasikmalaya dalam Satu Genggaman
                    </h1>
<p class="text-body-lg text-on-surface-variant mb-10 max-w-lg">
                        Jelajahi koleksi eksklusif produk UMKM terbaik Tasikmalaya. Dari Batik Priangan hingga kerajinan Anyaman, hadirkan kehangatan lokal ke hunian Anda.
                    </p>
<div class="flex flex-wrap gap-4">
<a href="katalog.php" class="bg-primary text-on-primary px-8 py-4 rounded-xl font-bold flex items-center gap-2 hover:bg-primary-container transition-colors">
                            Mulai Belanja
                            <span class="material-symbols-outlined">arrow_forward</span>
</a>
<a href="tentang.php" class="border-2 border-secondary text-secondary px-8 py-4 rounded-xl font-bold hover:bg-secondary/5 transition-colors">
                            Tentang Kami
                        </a>
</div>
</div>
</div>
</section>
<!-- Kategori Unggulan (Bento Grid) -->
<section class="py-24 px-margin-desktop max-w-container-max mx-auto">
<div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6">
<div>
<h2 class="font-headline-lg text-headline-lg text-primary mb-2">Kategori Unggulan</h2>
<p class="text-on-surface-variant max-w-md">Temukan keunikan setiap mahakarya dari berbagai penjuru Tasikmalaya.</p>
</div>
<a class="text-secondary font-bold flex items-center gap-1 hover:underline" href="katalog.php">
                    Lihat Semua Kategori <span class="material-symbols-outlined">chevron_right</span>
</a>
</div>
<div class="grid grid-cols-1 md:grid-cols-12 gap-gutter h-[800px] md:h-[600px]">
<a href="katalog.php" class="md:col-span-4 bg-white rounded-2xl overflow-hidden group relative border border-outline-variant shadow-sm hover:shadow-lg transition-all">
<div class="absolute inset-0 bg-gradient-to-t from-primary/80 to-transparent z-10"></div>
<div class="absolute inset-0 bg-cover bg-center group-hover:scale-105 transition-transform duration-500" data-alt="A collection of premium Batik Priangan fabrics with intricate floral and bird motifs in vibrant colors. Elegant display in a high-end boutique setting. Corporate modern aesthetic with cultural richness." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBepftHFXwDQAkNaBE1ImGSZLvKHLXhWbXXCzBCs8fzAJ7BAg8Uqo-opy8Zo4ieaMpP7sYyqKLWEl8NROYvI5eQOe3AatrHdTcO6vo5S3HN0p1QTITftCWswUhn85Oo6ytjwKuoOLVW5uEGjQFyZpeI3dq30sGEF1FfJXkj6-_0Dk0a0PU3T5HyqXBBP-RaFBP73OTawQtHKQ5HSBy_5kGMbU3Vwi1lDH8LmXpPK2USqP9gZ3aD5RwwoCDCcJj5TNLrGo3gwG-kh0bI')"></div>
<div class="absolute bottom-0 left-0 p-8 z-20">
<h3 class="text-white font-headline-md text-headline-md mb-2">Batik</h3>
<p class="text-white/80 text-label-md">Motif Priangan yang Filosofis</p>
</div>
</a>
<div class="md:col-span-4 grid grid-rows-2 gap-gutter">
<a href="katalog.php" class="bg-white rounded-2xl overflow-hidden group relative border border-outline-variant shadow-sm hover:shadow-lg transition-all">
<div class="absolute inset-0 bg-gradient-to-t from-secondary/80 to-transparent z-10"></div>
<div class="absolute inset-0 bg-cover bg-center group-hover:scale-105 transition-transform duration-500" data-alt="Hand-painted wooden sandals Kelom Geulis with colorful floral patterns. Studio lighting against a neutral background, highlighting the artisanal craftsmanship." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuA94MMDwqw-cNCawW-s5UDurZxbbKAcTkRanZdeUM-GpQDS_nRz7VSxonDtpqUJKli03v0LP15gMtDh-a09g0VI8LM3br6c_-WWAOBN72fbnEhXZexhnl7OcmqhuI-D6O-8O_neA62rxHRAwJOT3gTnrwmVwXzOJl1TNXACL3HNP6Gxt0NefTEN_kKVYHu7RNrdUv_GbRbgHQfYh5NUON8JEP3oZlMHLwSiXIjodeCoNTLYP9vNW8b8UERUmKl40NJMlxJD2lVcS9Lr')"></div>
<div class="absolute bottom-0 left-0 p-6 z-20">
<h3 class="text-white font-headline-md text-headline-md">Kelom Geulis</h3>
</div>
</a>
<a href="katalog.php" class="bg-white rounded-2xl overflow-hidden group relative border border-outline-variant shadow-sm hover:shadow-lg transition-all">
<div class="absolute inset-0 bg-gradient-to-t from-tertiary-container/80 to-transparent z-10"></div>
<div class="absolute inset-0 bg-cover bg-center group-hover:scale-105 transition-transform duration-500" data-alt="Detailed close-up of Tasikmalaya Bordir (embroidery) on a white silken fabric. Soft lighting showing the fine texture of the threads." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBxhyfKvlYScdkK38odfzg09X62fj3bjiQHD6-wDc8bYMfVZxp2VhpdUt4WnwqPhMaihbuBS5kS1r3tL_-_4oEi0ra3CwxEa2SNzR6J6WRjpkW3EvXDJcR5_MdRIuioi_rfRgGDEQi6X6bSBX_l_fGNQMFsj6bXpQqHkYMaSqFLeFx2OS1vgW0Agtx4UkigQaesTgwI2Gemf7vRUOu-EbuZHH2_HHrhXjuxXRaBqiuFK4QcS76TV27hUWohJI0qMeApD1c1mZhYxSpT')"></div>
<div class="absolute bottom-0 left-0 p-6 z-20">
<h3 class="text-white font-headline-md text-headline-md">Bordir</h3>
</div>
</a>
</div>
<a href="katalog.php" class="md:col-span-4 bg-white rounded-2xl overflow-hidden group relative border border-outline-variant shadow-sm hover:shadow-lg transition-all">
<div class="absolute inset-0 bg-gradient-to-t from-primary/80 to-transparent z-10"></div>
<div class="absolute inset-0 bg-cover bg-center group-hover:scale-105 transition-transform duration-500" data-alt="Traditional Tasikmalaya cuisine spread including Nasi Tutug Oncom and snacks. Warm, inviting lighting, rustic ceramic plates, wooden table setting." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDDf_2rAGTCDio2qK42EqC-jj-gwF_Pvf4mTFcXL7uRbevuXxbVz4fhXE3L6BO_uYVNb3OWD2KNVy10SWVOLKmKL1OqCY-2Yol1mqZIto6LeDWaFGUsb-Rqx5VYxIIH27LnQ0sLXvMi3f6PIfHyC0dLJoSFsaHS2Hd_QQ6le5G5fOX6vEy9syMrXjmQImMG0IgK_rQVDTLeyR3mU8uZURArJajetDL3VD02vDaP__zc92VdsyicMso1W1DWBZhLYdIxRK3EivM3_OHt')"></div>
<div class="absolute bottom-0 left-0 p-8 z-20">
<h3 class="text-white font-headline-md text-headline-md mb-2">Kuliner</h3>
<p class="text-white/80 text-label-md">Cita Rasa Khas Bumi Sukapura</p>
</div>
</a>
</div>
</section>
<!-- Produk Terbaru -->
<section class="py-24 bg-surface-container-low">
<div class="px-margin-desktop max-w-container-max mx-auto">
<div class="mb-12">
<h2 class="font-headline-lg text-headline-lg text-primary">Produk Terbaru</h2>
<p class="text-on-surface-variant">Kurasi produk terhangat langsung dari pengrajin.</p>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-gutter">
<!-- Product Card 1 -->

   <?php 
   
    // Mengambil kolom yang benar sesuai struktur database Anda
    $query = "SELECT p.id, p.name, p.price, p.image_url, a.shop_name 
              FROM products p 
              JOIN artisans a ON p.artisan_id = a.id 
              ORDER BY p.created_at DESC LIMIT 4";
    
    $result = $db->query($query);

    if ($result && $result->num_rows > 0):
        while ($row = $result->fetch_assoc()): ?>
        
        <div class="product-card group bg-white border border-outline-variant p-4 rounded-xl transition-all">
            <div class="relative aspect-square mb-4 overflow-hidden rounded-lg">
                <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                     src="<?php echo htmlspecialchars($row['image_url']); ?>" 
                     alt="<?php echo htmlspecialchars($row['name']); ?>">
            </div>
            
            <div class="flex justify-between items-start gap-2">
                <h4 class="font-headline-md text-body-md text-primary leading-tight">
                    <?php echo htmlspecialchars($row['name']); ?>
                </h4>
                <span class="font-bold text-secondary text-label-md whitespace-nowrap">
                    Rp <?php echo number_format($row['price'], 0, ',', '.'); ?>
                </span>
            </div>
            
            <p class="text-on-surface-variant text-label-sm mt-1">
                <?php echo htmlspecialchars($row['shop_name']); ?>
            </p>
            
            <a href="keranjang.php?add=<?php echo $row['id']; ?>" 
               class="w-full mt-4 py-2 border border-primary text-primary rounded-lg text-label-md hover:bg-primary hover:text-white transition-colors flex justify-center items-center gap-2 text-center">
                <span class="material-symbols-outlined text-sm">shopping_bag</span>
                Tambah ke Keranjang
            </a>
        </div>

    <?php 
        endwhile; 
    else:
        echo "<p class='col-span-4 text-center text-on-surface-variant'>Belum ada produk yang tersedia.</p>";
    endif; 
    ?>
</div>
</div>
</section>
<!-- CTA Section -->
<section class="py-24 px-margin-desktop max-w-container-max mx-auto">
<div class="relative bg-primary-container rounded-3xl overflow-hidden p-12 md:p-24 text-center md:text-left flex flex-col md:flex-row items-center gap-12">
<div class="absolute top-0 right-0 w-64 h-64 bg-secondary/20 rounded-full blur-3xl -mr-32 -mt-32"></div>
<div class="absolute bottom-0 left-0 w-64 h-64 bg-primary/20 rounded-full blur-3xl -ml-32 -mb-32"></div>
<div class="relative z-10 flex-1">
<h2 class="text-white font-headline-lg text-headline-lg mb-6">Punya Usaha Kreatif di Tasikmalaya?</h2>
<p class="text-on-primary-container text-body-lg mb-10 max-w-lg">
                        Bergabunglah dengan ribuan pelaku UMKM lainnya dan perluas jangkauan pasar Anda hingga ke mancanegara. Pendaftaran mudah dan gratis.
                    </p>
<a href="login.php" class="bg-secondary-container text-on-secondary-container px-10 py-4 rounded-xl font-bold text-headline-md inline-flex items-center gap-3 hover:scale-105 transition-transform active:scale-95">
                        Daftarkan Usaha Anda
                        <span class="material-symbols-outlined">rocket_launch</span>
</a>
</div>
<div class="relative z-10 flex-shrink-0 w-full md:w-1/3">
<div class="aspect-square bg-white/10 rounded-2xl flex items-center justify-center backdrop-blur-sm border border-white/20">
<span class="material-symbols-outlined text-[120px] text-white opacity-40">storefront</span>
</div>
</div>
</div>
</section>
</main>
<!-- Footer -->
<footer class="bg-tertiary-container dark:bg-tertiary text-on-tertiary-container dark:text-on-tertiary py-20">
<div class="w-full px-margin-desktop grid grid-cols-1 md:grid-cols-4 gap-gutter max-w-container-max mx-auto">
<div class="col-span-1 md:col-span-1">
<h3 class="text-headline-sm font-headline-sm font-bold text-on-tertiary-container dark:text-on-tertiary mb-6">TasikKreatifGo</h3>
<p class="text-body-md opacity-80 mb-6">Membawa mahakarya pengrajin Tasikmalaya ke hadapan dunia melalui inovasi teknologi digital.</p>
<div class="flex gap-4">
<a class="w-10 h-10 rounded-full border border-on-tertiary-container/30 flex items-center justify-center hover:bg-secondary-container transition-colors" href="https://tasikkreatifgo.example.com">
<span class="material-symbols-outlined">public</span>
</a>
<a class="w-10 h-10 rounded-full border border-on-tertiary-container/30 flex items-center justify-center hover:bg-secondary-container transition-colors" href="mailto:info@tasikkreatifgo.id">
<span class="material-symbols-outlined">mail</span>
</a>
</div>
</div>
<div>
<h4 class="font-bold mb-6">Produk Kami</h4>
<ul class="space-y-4">
<li><a class="opacity-80 hover:opacity-100 hover:text-secondary-fixed transition-opacity" href="katalog.php">Batik</a></li>
<li><a class="opacity-80 hover:opacity-100 hover:text-secondary-fixed transition-opacity" href="katalog.php">Bordir</a></li>
<li><a class="opacity-80 hover:opacity-100 hover:text-secondary-fixed transition-opacity" href="katalog.php">Anyaman</a></li>
<li><a class="opacity-80 hover:opacity-100 hover:text-secondary-fixed transition-opacity" href="katalog.php">Kelom Geulis</a></li>
</ul>
</div>
<div>
<h4 class="font-bold mb-6">Perusahaan</h4>
<ul class="space-y-4">
<li><a class="opacity-80 hover:opacity-100 hover:text-secondary-fixed transition-opacity" href="katalog.php">Culinary</a></li>
<li><a class="opacity-80 hover:opacity-100 hover:text-secondary-fixed transition-opacity" href="tentang.php">Contact Us</a></li>
<li><a class="opacity-80 hover:opacity-100 hover:text-secondary-fixed transition-opacity" href="tentang.php">Privacy Policy</a></li>
</ul>
</div>
<div>
<h4 class="font-bold mb-6">Newsletter</h4>
<p class="text-label-sm opacity-80 mb-4">Dapatkan info produk terbaru dan promo eksklusif.</p>
<div class="flex">
<input class="bg-white/5 border border-on-tertiary-container/30 rounded-l-lg px-4 py-2 w-full focus:outline-none focus:border-secondary-container" placeholder="Email Anda" type="email">
<button class="bg-secondary-container text-on-secondary-container px-4 py-2 rounded-r-lg font-bold">Kirim</button>
</div>
</div>
</div>
<div class="max-w-container-max mx-auto px-margin-desktop mt-16 pt-8 border-t border-on-tertiary-container/10">
<p class="text-label-sm opacity-60">© 2024 TasikKreatifGo. Celebrating Tasikmalaya's MSME Excellence.</p>
</div>
</footer>
<!-- BottomNavBar (Mobile Only) -->
<nav class="fixed bottom-0 left-0 w-full z-50 flex justify-around items-center px-4 py-3 md:hidden bg-surface dark:bg-inverse-surface shadow-[0_-4px_12px_rgba(0,0,0,0.05)] shadow-lg rounded-t-full">
<a class="flex flex-col items-center justify-center bg-secondary-container dark:bg-secondary text-on-secondary-container dark:text-on-secondary rounded-full px-4 py-1 scale-90 transition-transform duration-150" href="index.php">
<span class="material-symbols-outlined">home</span>
<span class="text-label-sm font-label-sm-mobile">Home</span>
</a>
<a class="flex flex-col items-center justify-center text-on-surface-variant dark:text-surface-variant hover:bg-surface-variant dark:hover:bg-surface-container-highest transition-colors" href="katalog.php">
<span class="material-symbols-outlined">grid_view</span>
<span class="text-label-sm font-label-sm-mobile">Catalog</span>
</a>
<a class="flex flex-col items-center justify-center text-on-surface-variant dark:text-surface-variant hover:bg-surface-variant dark:hover:bg-surface-container-highest transition-colors" href="login.php">
<span class="material-symbols-outlined">storefront</span>
<span class="text-label-sm font-label-sm-mobile">Portal</span>
</a>
<a class="flex flex-col items-center justify-center text-on-surface-variant dark:text-surface-variant hover:bg-surface-variant dark:hover:bg-surface-container-highest transition-colors" href="dashboard.php">
<span class="material-symbols-outlined">person</span>
<span class="text-label-sm font-label-sm-mobile">Profile</span>
</a>
</nav>
<script>
        // Micro-interactions and effects
        document.addEventListener('DOMContentLoaded', () => {
            const productCards = document.querySelectorAll('.product-card');
            productCards.forEach(card => {
                card.addEventListener('mouseenter', () => {
                    card.classList.add('ambient-shadow');
                });
                card.addEventListener('mouseleave', () => {
                    card.classList.remove('ambient-shadow');
                });
            });

            // Intersection Observer for scroll animations
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('opacity-100', 'translate-y-0');
                        entry.target.classList.remove('opacity-0', 'translate-y-10');
                    }
                });
            }, { threshold: 0.1 });

            document.querySelectorAll('section').forEach(section => {
                section.classList.add('transition-all', 'duration-700', 'opacity-0', 'translate-y-10');
                observer.observe(section);
            });
        });
    </script>
</body></html>