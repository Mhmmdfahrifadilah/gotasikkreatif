<?php 
require_once __DIR__ . "/db.php"; 
session_start();
// Pastikan sidebar.php sudah ada, jika belum, buat file sidebar.php terpisah
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overview | Mitra Tasik</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>
<body class="bg-slate-50 min-h-screen flex">

    <?php include 'sidebar.php'; ?>

    <main class="flex-1 p-8">
        <h1 class="text-2xl font-bold text-slate-800 mb-8">Overview</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
                <p class="text-sm text-slate-500 font-medium">Total Produk</p>
                <p class="text-3xl font-bold text-slate-900 mt-2">128</p>
            </div>
            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
                <p class="text-sm text-slate-500 font-medium">Stok Menipis</p>
                <p class="text-3xl font-bold text-red-600 mt-2">12</p>
            </div>
            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
                <p class="text-sm text-slate-500 font-medium">Produk Aktif</p>
                <p class="text-3xl font-bold text-green-600 mt-2">115</p>
            </div>
            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
                <p class="text-sm text-slate-500 font-medium">Draf</p>
                <p class="text-3xl font-bold text-slate-400 mt-2">13</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
                <h2 class="text-lg font-bold text-slate-800 mb-4">Tren Penjualan</h2>
                <div class="h-64 flex items-center justify-center bg-slate-50 rounded-xl border border-dashed border-slate-300">
                    <p class="text-slate-400">Integrasikan Chart.js di sini</p>
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
                <h2 class="text-lg font-bold text-slate-800 mb-4">Aktivitas Terkini</h2>
                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <span class="material-symbols-outlined text-blue-500">shopping_bag</span>
                        <div>
                            <p class="text-sm font-medium">Pesanan #1001 masuk</p>
                            <p class="text-xs text-slate-400">Baru saja</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="material-symbols-outlined text-green-500">check_circle</span>
                        <div>
                            <p class="text-sm font-medium">Produk "Topi Mendong" terjual</p>
                            <p class="text-xs text-slate-400">2 jam lalu</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>