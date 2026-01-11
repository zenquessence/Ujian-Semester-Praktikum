<?php
include "../config/koneksi.php";
include "../config/cek_login.php";

$id = $_GET['id'];
$cek = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE id_peminjam='$id'");
if (mysqli_num_rows($cek) > 0) {
    echo "<script>alert('Gagal menghapus! Member ini memiliki riwayat peminjaman. Data tidak bisa dihapus demi menjaga keutuhan laporan transaksi.'); window.location='peminjam.php';</script>";
} else {
    mysqli_query($koneksi, "DELETE FROM peminjam WHERE id_peminjam='$id'");
    header("Location: peminjam.php");
}

?>