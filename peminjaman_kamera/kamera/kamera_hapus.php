<?php
include "../config/koneksi.php";

$id = $_GET['id'];

$cek = mysqli_query($koneksi, "SELECT status FROM kamera WHERE id_kamera='$id'");
$data = mysqli_fetch_array($cek);

if ($data['status'] == 'Dipinjam') {
    echo "<script>alert('Gagal! Kamera ini sedang dipinjam oleh. Harap proses pengembalian terlebih dahulu sebelum menghapus data kamera.'); window.location='kamera.php';</script>";
} else {
    mysqli_query($koneksi, "DELETE FROM kamera WHERE id_kamera='$id'");
    header("Location: kamera.php");
}

?>