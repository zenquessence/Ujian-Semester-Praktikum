<?php
/*
 * Project: Sistem Peminjaman Kamera
 * Developed by: Zain Adnan Hanif
 * NIM: A12.2024.07263
 */
include "../config/koneksi.php";
include "../config/cek_login.php";
include "../header.php";
?>
<?php include "../navbar.php"; ?>

<div class="container">
    <h2>Data Kamera</h2>
    <a href="kamera_tambah.php" class="btn">Tambah Kamera</a>
    <br><br>
    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Kamera</th>
                <th>Kondisi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $query = mysqli_query($koneksi, "SELECT * FROM kamera ORDER BY nama_kamera ASC");
            while ($data = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['kode_kamera']; ?></td>
                    <td>
                        <b><?php echo $data['nama_kamera']; ?></b><br>
                        <small><?php echo $data['merk']; ?> - <?php echo $data['tipe']; ?></small>
                    </td>
                    <td><?php echo $data['kondisi']; ?></td>
                    <td>
                        <?php
                        if ($data['status'] == 'Tersedia') {
                            echo "<span style='color:green; font-weight:bold;'>Tersedia</span>";
                        } else {
                            echo "<span style='color:red; font-weight:bold;'>Dipinjam</span>";
                        }
                        ?>
                    </td>
                    <td>
                        <a href="kamera_edit.php?id=<?php echo $data['id_kamera']; ?>">Edit</a> |
                        <a href="kamera_hapus.php?id=<?php echo $data['id_kamera']; ?>"
                            onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include "../footer.php"; ?>
</body>

</html>