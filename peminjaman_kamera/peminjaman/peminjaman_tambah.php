<?php
include "../config/koneksi.php";
include "../header.php";

if (isset($_POST['simpan'])) {
    $id_kamera = $_POST['id_kamera'];
    $id_peminjam = $_POST['id_peminjam'];
    $tgl_pinjam = $_POST['tgl_pinjam'];

    // 1. Insert Peminjaman
    mysqli_query($koneksi, "INSERT INTO peminjaman (id_kamera, id_peminjam, tgl_pinjam, status_pinjam) VALUES ('$id_kamera', '$id_peminjam', '$tgl_pinjam', 'Dipinjam')");

    // 2. Update status kamera (tanpa stok)
    mysqli_query($koneksi, "UPDATE kamera SET status = 'Dipinjam' WHERE id_kamera='$id_kamera'");

    echo "<script>alert('Peminjaman berhasil ditambahkan'); window.location='peminjaman.php';</script>";
}
?>
<?php include "../navbar.php"; ?>

<div class="container">
    <h2>Tambah Peminjaman</h2>

    <div class="form-container">
        <form method="post">
            <div class="form-group">
                <label>Pilih Peminjam</label>
                <select name="id_peminjam" required>
                    <option value="">-- Pilih Peminjam --</option>
                    <?php
                    $q_peminjam = mysqli_query($koneksi, "SELECT * FROM peminjam ORDER BY nama_peminjam ASC");
                    while ($p = mysqli_fetch_array($q_peminjam)) {
                        echo "<option value='" . $p['id_peminjam'] . "'>" . $p['nama_peminjam'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label>Pilih Kamera (Tersedia)</label>
                <select name="id_kamera" required>
                    <option value="">-- Pilih Kamera --</option>
                    <?php
                    // Modification: SELECT * FROM kamera WHERE status = 'Tersedia'
                    $q_kamera = mysqli_query($koneksi, "SELECT * FROM kamera WHERE status = 'Tersedia' ORDER BY nama_kamera ASC");
                    while ($k = mysqli_fetch_array($q_kamera)) {
                        echo "<option value='" . $k['id_kamera'] . "'>" . $k['nama_kamera'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label>Tanggal Pinjam</label>
                <input type="date" name="tgl_pinjam" value="<?php echo date('Y-m-d'); ?>" required>
            </div>

            <div class="form-group">
                <button type="submit" name="simpan" class="btn" style="width:100%">Proses Peminjaman</button>
                <br><br>
                <a href="peminjaman.php" class="btn btn-secondary"
                    style="width:100%; display:block; box-sizing:border-box;">Batal</a>
            </div>
        </form>
    </div>
</div>

<?php include "../footer.php"; ?>
</body>

</html>