<?php
// 1. Simpan data ke database terlebih dahulu
// ... (logika INSERT ke database)

// 2. Kirim pesan via API WhatsApp Gateway (contoh)
$target = $_POST['nomor_wa'];
$message = "Halo! Pesanan Anda sudah kami terima. Total: Rp 101.000. Mohon transfer ke...";

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.fonnte.com/send', // Contoh menggunakan Fonnte
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_POSTFIELDS => array(
    'target' => $target,
    'message' => $message,
  ),
  CURLOPT_HTTPHEADER => array("Authorization: TOKEN_ANDA"),
));
$response = curl_exec($curl);
curl_close($curl);

// 3. Baru arahkan ke halaman sukses
header("Location: sukses.php");
?>