<?php
require_once __DIR__ . '/db.php';
?>
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
