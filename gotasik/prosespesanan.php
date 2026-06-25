<?php
session_start();
require_once "db.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 1. Ambil data dari form
    $nama = $_POST['nama_penerima'];
    $alamat = $_POST['alamat_lengkap'];
    $wa = $_POST['nomor_wa'];
    $total = $_POST['total_bayar'];
    $order_id = 'ORD-' . time(); // ID unik

    // 2. Simpan ke database (pastikan nama kolom sesuai tabel Anda)
    $stmt = $db->prepare("INSERT INTO orders (order_id, user_id, shipping_address, total_amount, status) VALUES (?, ?, ?, ?, 'pending')");
    $user_id = $_SESSION['user_id'] ?? 0; // Pastikan user sudah login
    $stmt->bind_param("sisi", $order_id, $user_id, $alamat, $total);
    
    if ($stmt->execute()) {
        // 3. Kosongkan cart
        unset($_SESSION['cart']);
        
        // 4. Redirect ke halaman sukses
        header("Location: sukses.php?order_id=" . $order_id);
    }
}
?>