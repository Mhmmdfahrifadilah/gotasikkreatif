<?php
// Mengambil order_id dengan aman menggunakan ternary operator
$order_id = isset($_GET['order_id']) ? htmlspecialchars($_GET['order_id']) : 'Tidak ditemukan';
?>

<h1>Pesanan Berhasil!</h1>
<p>Order ID: <?php echo $order_id; ?></p>
<p>Silakan transfer ke rekening [Nama Bank] 123456789</p>

<!-- Perbaikan sintaks: tag <a> harus ditutup dengan benar -->
<a href="https://wa.me/62812xxxxxxx?text=Halo admin, saya ingin konfirmasi pembayaran untuk pesanan <?php echo $order_id; ?>" 
   class="bg-green-500 text-white p-4 rounded-lg">
   Konfirmasi via WhatsApp
</a>