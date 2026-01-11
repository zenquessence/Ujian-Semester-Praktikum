<?php
include "../config/koneksi.php";
include "../header.php"; // Fix Style
?>
<?php include "../navbar.php"; ?>

<div class="container">
    <h2>Laporan Peminjaman</h2>
    <a href="cetak_peminjaman.php" target="_blank" class="btn">Cetak PDF</a>
    <br><br>

    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Peminjam</th>
                <th>Kamera</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $query = mysqli_query($koneksi, "
                    SELECT * FROM peminjaman 
                    JOIN kamera ON peminjaman.id_kamera = kamera.id_kamera
                    JOIN peminjam ON peminjaman.id_peminjam = peminjam.id_peminjam
                    ORDER BY peminjaman.id_pinjam DESC
                ");
            while ($data = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['nama_peminjam']; ?></td>
                    <td><?php echo $data['nama_kamera']; ?></td>
                    <td><?php echo $data['tgl_pinjam']; ?></td>
                    <td><?php echo $data['tgl_kembali']; ?></td>
                    <td><?php echo $data['status_pinjam']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include "../footer.php"; ?>
</body>

</html>