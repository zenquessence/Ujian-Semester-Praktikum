<?php
include "../config/koneksi.php";
include "../config/cek_login.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Data Peminjam</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <?php include "../navbar.php"; ?>

    <div class="container">
        <h2>Data Peminjam</h2>
        <a href="peminjam_tambah.php" class="btn">Tambah Peminjam</a>
        <br><br>
        <table border="1" cellpadding="10" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Peminjam</th>
                    <th>No HP</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM peminjam ORDER BY id_peminjam DESC");
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
                            <?php echo $data['no_hp']; ?>
                        </td>
                        <td>
                            <?php echo $data['alamat']; ?>
                        </td>
                        <td>
                            <a href="peminjam_edit.php?id=<?php echo $data['id_peminjam']; ?>">Edit</a> |
                            <a href="peminjam_hapus.php?id=<?php echo $data['id_peminjam']; ?>"
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