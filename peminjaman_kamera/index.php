<?php
/*
 * Project: Sistem Peminjaman Kamera
 * Developed by: Zain Adnan Hanif
 * NIM: A12.2024.07263
 */
include "config/koneksi.php";
include "config/cek_login.php";
include "header.php"; // Include Header (Include CSS logic)

// Hitung total kamera
$q1 = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM kamera");
$total_kamera = mysqli_fetch_assoc($q1)['total'];

// Hitung kamera tersedia
$q2 = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM kamera WHERE status='Tersedia'");
$tersedia = mysqli_fetch_assoc($q2)['total'];

// Hitung kamera dipinjam
$q3 = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM kamera WHERE status='Dipinjam'");
$dipinjam = mysqli_fetch_assoc($q3)['total'];

// Hitung total peminjaman
$q4 = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM peminjaman");
$total_peminjaman = mysqli_fetch_assoc($q4)['total'];
?>
<?php include "navbar.php"; ?>

<div class="container">
    <h2>Dashboard</h2>
    <p>Selamat datang di Sistem Informasi Peminjaman Kamera.</p>
    <br>
    <div class="dashboard-cards">
        <div class="card bg-blue">
            <h3><?php echo $total_kamera; ?></h3>
            <p>Total Kamera</p>
        </div>

        <div class="card bg-green">
            <h3><?php echo $tersedia; ?></h3>
            <p>Kamera Tersedia</p>
        </div>

        <div class="card bg-red">
            <h3><?php echo $dipinjam; ?></h3>
            <p>Kamera Dipinjam</p>
        </div>

        <div class="card bg-yellow">
            <h3><?php echo $total_peminjaman; ?></h3>
            <p>Total Transaksi</p>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>
</body>

</html>