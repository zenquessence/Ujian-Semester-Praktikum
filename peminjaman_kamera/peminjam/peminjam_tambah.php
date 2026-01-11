<?php
include "../config/koneksi.php";
include "../header.php";

if (isset($_POST['simpan'])) {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama_peminjam']);
    $hp = mysqli_real_escape_string($koneksi, $_POST['no_hp']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);

    mysqli_query($koneksi, "INSERT INTO peminjam (nama_peminjam, no_hp, alamat) VALUES ('$nama', '$hp', '$alamat')");

    echo "<script>alert('Data berhasil disimpan'); window.location='peminjam.php';</script>";
}
?>
<?php include "../navbar.php"; ?>

<div class="container">
    <h2>Tambah Data Peminjam</h2>

    <div class="form-container">
        <form method="post">
            <div class="form-group">
                <label>Nama Peminjam</label>
                <input type="text" name="nama_peminjam" required placeholder="Masukkan nama lengkap">
            </div>

            <div class="form-group">
                <label>No. HP</label>
                <input type="text" name="no_hp" required placeholder="08xxx">
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" required rows="3" placeholder="Alamat lengkap"></textarea>
            </div>

            <div class="form-group">
                <button type="submit" name="simpan" class="btn" style="width:100%">Simpan Data</button>
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