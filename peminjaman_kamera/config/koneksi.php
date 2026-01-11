<?php
/*
 * Project: Sistem Peminjaman Kamera
 * Developed by: Zain Adnan Hanif
 * NIM: A12.2024.07263
 */
$host = "127.0.0.1";
$user = "root";
$pass = "";
$db = "db_peminjaman_kamera";
$koneksi = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>