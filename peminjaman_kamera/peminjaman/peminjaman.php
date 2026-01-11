<?php
include "../config/koneksi.php";
include "../config/cek_login.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Data Peminjaman</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <?php include "../navbar.php"; ?>

    <div class="container">
        <h2>Data Peminjaman</h2>
        <a href="peminjaman_tambah.php" class="btn">Tambah Peminjaman</a>
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
                    <th>Aksi</th>
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
                        <td>
                            <?php echo $no++; ?>
                        </td>
                        <td>
                            <?php echo $data['nama_peminjam']; ?>
                        </td>
                        <td>
                            <?php echo $data['nama_kamera']; ?>
                        </td>
                        <td>
                            <?php echo $data['tgl_pinjam']; ?>
                        </td>
                        <td>
                            <?php echo $data['tgl_kembali']; ?>
                        </td>
                        <td>
                            <?php
                            if ($data['status_pinjam'] == 'Dipinjam') {
                                echo "<span style='color:red; font-weight:bold;'>Dipinjam</span>";
                            } else {
                                echo "<span style='color:green; font-weight:bold;'>Kembali</span>";
                            }
                            ?>
                        </td>
                        <td>
                            <?php if ($data['status_pinjam'] == 'Dipinjam') { ?>
                                <a href="peminjaman_edit.php?id=<?php echo $data['id_pinjam']; ?>&id_kamera=<?php echo $data['id_kamera']; ?>"
                                    onclick="return confirm('Proses pengembalian kamera?')">Kembalikan</a>
                            <?php } else { ?>
                                -
                            <?php } ?>

                            <?php if (false) { // Optional delete logic placeholder ?>
                                | <a href="peminjaman_hapus.php?id=<?php echo $data['id_pinjam']; ?>"
                                    onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <?php include "../footer.php"; ?>
</body>

</html>