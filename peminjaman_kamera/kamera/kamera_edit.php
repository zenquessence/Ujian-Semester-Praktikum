<?php
include "../config/koneksi.php";
include "../header.php";

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM kamera WHERE id_kamera='$id'");
$data = mysqli_fetch_array($query);

if (isset($_POST['update'])) {
    $kode = mysqli_real_escape_string($koneksi, $_POST['kode_kamera']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama_kamera']);
    $merk = mysqli_real_escape_string($koneksi, $_POST['merk']);
    $tipe = mysqli_real_escape_string($koneksi, $_POST['tipe']);
    $kondisi = mysqli_real_escape_string($koneksi, $_POST['kondisi']);

    mysqli_query($koneksi, "UPDATE kamera SET kode_kamera='$kode', nama_kamera='$nama', merk='$merk', tipe='$tipe', kondisi='$kondisi' WHERE id_kamera='$id'");

    header("Location: kamera.php");
}
?>
<?php include "../navbar.php"; ?>

<div class="container">
    <h2>Edit Data Kamera</h2>

    <div class="form-container">
        <form method="post">
            <div class="form-group">
                <label>Kode Kamera</label>
                <input type="text" name="kode_kamera" value="<?php echo $data['kode_kamera']; ?>" required>
            </div>

            <div class="form-group">
                <label>Nama Kamera</label>
                <input type="text" name="nama_kamera" value="<?php echo $data['nama_kamera']; ?>" required>
            </div>

            <div class="form-group">
                <label>Merk</label>
                <input type="text" name="merk" value="<?php echo $data['merk']; ?>" required>
            </div>

            <div class="form-group">
                <label>Tipe</label>
                <select name="tipe" required>
                    <option value="<?php echo $data['tipe']; ?>"><?php echo $data['tipe']; ?></option>
                    <option>DSLR</option>
                    <option>Mirrorless</option>
                    <option>Action Cam</option>
                    <option>DigiCam</option>
                </select>
            </div>

            <div class="form-group">
                <label>Kondisi</label>
                <select name="kondisi" required>
                    <option value="<?php echo $data['kondisi']; ?>"><?php echo $data['kondisi']; ?></option>
                    <option>Baik</option>
                    <option>Rusak</option>
                    <option>Perawatan</option>
                </select>
            </div>

            <div class="form-group">
                <button type="submit" name="update" class="btn" style="width:100%">Update Data</button>
                <br><br>
                <a href="kamera.php" class="btn btn-secondary"
                    style="width:100%; display:block; box-sizing:border-box;">Batal</a>
            </div>
        </form>
    </div>
</div>

<?php include "../footer.php"; ?>
</body>

</html>