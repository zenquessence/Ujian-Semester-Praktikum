<?php
session_start();
include "../config/koneksi.php"; // memaastikan koneksi ke database sudah benar

$username = $_POST['username'];
$password = $_POST['password'];

// Gunakan prepared statement untuk query
$query = $koneksi->prepare("SELECT * FROM user WHERE username = ?");
$query->bind_param("s", $username);  // "s" berarti string
$query->execute();
$result = $query->get_result();

// Cek jika user ditemukan
$data = $result->fetch_assoc();

// Verifikasi password
if ($data && password_verify($password, $data['password'])) {
    $_SESSION['login'] = true;
    $_SESSION['username'] = $data['username'];
    header("Location: ../index.php"); // Redirect ke halaman utama
} else {
    echo "Login gagal! Username atau password salah.";
}
?>