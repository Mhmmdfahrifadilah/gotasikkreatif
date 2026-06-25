<!-- sidebar.php -->
<nav class="space-y-2">
    <?php
    // Mendapatkan nama file saat ini, misalnya 'overview.php'
    $current_page = basename($_SERVER['PHP_SELF']);
    ?>

    <a href="overview.php" class="flex items-center gap-3 p-3 rounded-xl <?php echo $current_page == 'overview.php' ? 'bg-navy-blue text-white' : 'text-slate-600 hover:bg-slate-100'; ?>">
        <span class="material-symbols-outlined">grid_view</span>
        Overview
    </a>

    <a href="inventory.php" class="flex items-center gap-3 p-3 rounded-xl <?php echo $current_page == 'inventory.php' ? 'bg-navy-blue text-white' : 'text-slate-600 hover:bg-slate-100'; ?>">
        <span class="material-symbols-outlined">inventory_2</span>
        Inventory
    </a>

    <a href="sales.php" class="flex items-center gap-3 p-3 rounded-xl <?php echo $current_page == 'sales.php' ? 'bg-navy-blue text-white' : 'text-slate-600 hover:bg-slate-100'; ?>">
        <span class="material-symbols-outlined">receipt_long</span>
        Sales
    </a>
    
    <!-- Lanjutkan untuk Insights dan Settings dengan pola yang sama -->
</nav>