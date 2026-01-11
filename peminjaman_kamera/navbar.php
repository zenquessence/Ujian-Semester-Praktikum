<?php
// Navbar menggunakan $base_url yang sudah didefinisikan di header.php
// Jika navbar.php di-include tanpa header.php (jarang terjadi), beri default
if (!isset($base_url)) {
    $base_url = "../";
}
?>
<nav>
    <a href="<?php echo $base_url; ?>index.php">Dashboard</a>
    <a href="<?php echo $base_url; ?>kamera/kamera.php">Data Kamera</a>
    <a href="<?php echo $base_url; ?>peminjam/peminjam.php">Data Peminjam</a>
    <a href="<?php echo $base_url; ?>peminjaman/peminjaman.php">Data Peminjaman</a>
    <a href="<?php echo $base_url; ?>laporan/laporan_peminjaman.php">Laporan</a>
    <a href="<?php echo $base_url; ?>auth/logout.php">Logout</a>
</nav>