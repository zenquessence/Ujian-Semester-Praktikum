<?php
include "../config/koneksi.php";
include "../header.php"; // Fix Style
?>
    <?php include "../navbar.php"; ?>

    <div class="container">
        <h2>Laporan Data Kamera</h2>
        <!-- Tombol Cetak (Opsional, jika diinginkan nanti) -->
        <button onclick="window.print()">Cetak Laporan</button>
        <br><br>

        <table border="1" cellpadding="10" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Kamera</th>
                    <th>Nama Kamera</th>
                    <th>Merk</th>
                    <th>Tipe</th>
                    <th>Kondisi</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM kamera");
                while ($data = mysqli_fetch_assoc($query)) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['kode_kamera']; ?></td>
                        <td><?php echo $data['nama_kamera']; ?></td>
                        <td><?php echo $data['merk']; ?></td>
                        <td><?php echo $data['tipe']; ?></td>
                        <td><?php echo $data['kondisi']; ?></td>
                        <td><?php echo $data['status']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <?php include "../footer.php"; ?>
</body>
</html>