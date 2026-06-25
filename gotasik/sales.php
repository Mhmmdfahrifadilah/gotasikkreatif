<?php 
require_once __DIR__ . "/db.php"; 
session_start();
// Pastikan user sudah login
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales | Mitra Tasik</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>
<body class="bg-slate-50 min-h-screen flex">

    <?php include 'sidebar.php'; ?>

    <main class="flex-1 p-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-bold text-slate-800">Manajemen Penjualan</h1>
            <button class="bg-primary text-white px-4 py-2 rounded-xl flex items-center gap-2 text-sm font-medium">
                <span class="material-symbols-outlined">download</span> Ekspor Laporan
            </button>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-4 text-sm font-semibold text-slate-600">ID Pesanan</th>
                        <th class="px-6 py-4 text-sm font-semibold text-slate-600">Pelanggan</th>
                        <th class="px-6 py-4 text-sm font-semibold text-slate-600">Tanggal</th>
                        <th class="px-6 py-4 text-sm font-semibold text-slate-600">Total</th>
                        <th class="px-6 py-4 text-sm font-semibold text-slate-600">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <tr class="hover:bg-slate-50">
                        <td class="px-6 py-4 text-sm text-slate-800 font-medium">#INV-2026-001</td>
                        <td class="px-6 py-4 text-sm text-slate-600">Budi Santoso</td>
                        <td class="px-6 py-4 text-sm text-slate-600">22 Jun 2026</td>
                        <td class="px-6 py-4 text-sm font-bold text-slate-800">Rp 350.000</td>
                        <td class="px-6 py-4 text-sm">
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-medium">Selesai</span>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50">
                        <td class="px-6 py-4 text-sm text-slate-800 font-medium">#INV-2026-002</td>
                        <td class="px-6 py-4 text-sm text-slate-600">Siti Aminah</td>
                        <td class="px-6 py-4 text-sm text-slate-600">21 Jun 2026</td>
                        <td class="px-6 py-4 text-sm font-bold text-slate-800">Rp 120.000</td>
                        <td class="px-6 py-4 text-sm">
                            <span class="bg-amber-100 text-amber-700 px-3 py-1 rounded-full text-xs font-medium">Diproses</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>