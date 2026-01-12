<?php
include "../config/koneksi.php";
include "../header.php"; // Fix Style

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM peminjam WHERE id_peminjam='$id'");
$data = mysqli_fetch_array($query);

if (isset($_POST['update'])) {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama_peminjam']);
    $hp = mysqli_real_escape_string($koneksi, $_POST['no_hp']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);

    // Validasi Nama (Huruf dan Spasi saja)
    if (!preg_match("/^[a-zA-Z\s]+$/", $nama)) {
        echo "<script>alert('Nama hanya boleh huruf!'); window.history.back();</script>";
        return false;
    }

    // Validasi No HP (Angka saja)
    if (!is_numeric($hp)) {
        echo "<script>alert('No. HP harus angka!'); window.history.back();</script>";
        return false;
    }

    mysqli_query($koneksi, "UPDATE peminjam SET nama_peminjam='$nama', no_hp='$hp', alamat='$alamat' WHERE id_peminjam='$id'");

    echo "<script>alert('Data berhasil diupdate'); window.location='peminjam.php';</script>";
}
?>
<?php include "../navbar.php"; ?>

<div class="container">
    <h2>Edit Data Peminjam</h2>

    <div class="form-container">
        <form method="post">
            <div class="form-group">
                <label>Nama Peminjam</label>
                <input type="text" name="nama_peminjam" value="<?php echo $data['nama_peminjam']; ?>" required>
            </div>

            <div class="form-group">
                <label>No. HP</label>
                <input type="text" name="no_hp" value="<?php echo $data['no_hp']; ?>" required>
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" required rows="3"><?php echo $data['alamat']; ?></textarea>
            </div>

            <div class="form-group">
                <button type="submit" name="update" class="btn" style="width:100%">Update Data</button>
                <br><br>
                <a href="peminjam.php" class="btn btn-secondary"
                    style="width:100%; display:block; box-sizing:border-box;">Batal</a>
            </div>
        </form>
    </div>
</div>

<?php include "../footer.php"; ?>
</body>

</html>