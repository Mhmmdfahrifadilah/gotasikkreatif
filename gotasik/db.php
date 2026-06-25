<?php
// Koneksi database lokal untuk projek TasikKreatifGo
// Ganti nama host, user, password, dan database sesuai konfigurasi lokal Anda.
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'tasikkreatifgo';

$db = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

if ($db->connect_error) {
    die('Database connection failed: ' . $db->connect_error);
}

// Set karakter UTF-8 untuk koneksi
$db->set_charset('utf8mb4');
