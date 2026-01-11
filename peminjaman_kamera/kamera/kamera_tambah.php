<?php
include "../config/koneksi.php";
include "../header.php";

if (isset($_POST['simpan'])) {
    $kode = mysqli_real_escape_string($koneksi, $_POST['kode_kamera']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama_kamera']);
    $merk = mysqli_real_escape_string($koneksi, $_POST['merk']);
    $tipe = mysqli_real_escape_string($koneksi, $_POST['tipe']);
    $kondisi = mysqli_real_escape_string($koneksi, $_POST['kondisi']);

    mysqli_query($koneksi, "
        INSERT INTO kamera 
        (kode_kamera, nama_kamera, merk, tipe, kondisi, status)
        VALUES 
        ('$kode','$nama','$merk','$tipe','$kondisi','Tersedia')
    ");

    header("Location: kamera.php");
}
?>
<?php include "../navbar.php"; ?>

<div class="container">
    <h2>Tambah Data Kamera</h2>

    <div class="form-container">
        <form method="post">
            <div class="form-group">
                <label>Kode Kamera</label>
                <input type="text" name="kode_kamera" required placeholder="Contoh: CAM001">
            </div>

            <div class="form-group">
                <label>Nama Kamera</label>
                <input type="text" name="nama_kamera" required placeholder="Contoh: Canon EOS 1500D">
            </div>

            <div class="form-group">
                <label>Merk</label>
                <input type="text" name="merk" required placeholder="Contoh: Canon">
            </div>

            <div class="form-group">
                <label>Tipe</label>
                <select name="tipe" required>
                    <option value="">-- Pilih --</option>
                    <option>DSLR</option>
                    <option>Mirrorless</option>
                    <option>Action Cam</option>
                    <option>DigiCam</option>
                </select>
            </div>

            <div class="form-group">
                <label>Kondisi</label>
                <select name="kondisi" required>
                    <option>Baik</option>
                    <option>Rusak</option>
                    <option>Perawatan</option>
                </select>
            </div>

            <div class="form-group">
                <button type="submit" name="simpan" class="btn" style="width:100%">Simpan Data</button>
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