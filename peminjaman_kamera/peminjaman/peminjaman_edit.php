<?php
include "../config/koneksi.php";
include "../header.php";

$id = $_GET['id'];
$id_kamera = $_GET['id_kamera'];
$tgl_kembali = date('Y-m-d');

// Ambil data tgl_pinjam untuk hitung durasi
$query = mysqli_query($koneksi, "SELECT tgl_pinjam FROM peminjaman WHERE id_pinjam='$id'");
$data = mysqli_fetch_array($query);
$tgl_pinjam = $data['tgl_pinjam'];

// Hitung durasi
$start_date = new DateTime($tgl_pinjam);
$end_date = new DateTime($tgl_kembali);
$diff = $start_date->diff($end_date);
$durasi = $diff->days;
// Tambah 1 hari jika dikembalikan di hari yang sama (opsional, tergantung kebijakan)
if ($durasi == 0)
    $durasi = 1;

// Update tabel peminjaman
mysqli_query($koneksi, "UPDATE peminjaman SET status_pinjam='Kembali', tgl_kembali='$tgl_kembali' WHERE id_pinjam='$id'");

// Update table kamera: Set Tersedia
mysqli_query($koneksi, "UPDATE kamera SET status='Tersedia' WHERE id_kamera='$id_kamera'");

echo "<script>alert('Kamera berhasil dikembalikan! Durasi: $durasi Hari'); window.location='peminjaman.php';</script>";
?>