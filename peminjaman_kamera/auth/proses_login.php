<?php
session_start();
include "../config/koneksi.php"; // Sesuaikan dengan file koneksi database kamu

// Ambil data dari form
$username = $_POST['username'];
$password = $_POST['password'];

// Query untuk mengambil data user berdasarkan username
$query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
$data = mysqli_fetch_assoc($query); // Mengambil data user berdasarkan username

// Mengecek apakah password yang dimasukkan cocok dengan hash password di database
if ($data && password_verify($password, $data['password'])) {
    // Jika password cocok
    $_SESSION['login'] = true;
    $_SESSION['username'] = $data['username'];
    header("Location: ../index.php"); // Setelah login sukses, arahkan ke halaman utama
} else {
    // Jika login gagal
    echo "<script>alert('Login gagal! Username atau password salah.'); window.location='login.php';</script>";
}
?>