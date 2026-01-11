<?php
include "../config/koneksi.php";
include "../config/cek_login.php";

$id = $_GET['id'];

// Opsional: Cek status sebelum hapus, atau hapus saja
$cek = mysqli_query($koneksi, "SELECT status_pinjam FROM peminjaman WHERE id_pinjam='$id'");
$data = mysqli_fetch_assoc($cek);

if ($data['status_pinjam'] == 'Dipinjam') {
    echo "<script>alert('Aksi Ditolak! Transaksi ini masih berstatus DIPINJAM. Silakan lakukan pengembalian kamera terlebih dahulu.'); window.location='peminjaman.php';</script>";
} else {
    mysqli_query($koneksi, "DELETE FROM peminjaman WHERE id_pinjam='$id'");
    header("Location: peminjaman.php");
}

?>