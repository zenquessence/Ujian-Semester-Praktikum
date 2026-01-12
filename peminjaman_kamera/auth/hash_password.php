<?php
// Ganti 'admin123' dengan password yang ingin kamu simpan
$password = 'admin123';

// Menghasilkan hash password menggunakan password_hash()
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Tampilkan hash password yang sudah di-hash
echo $hashed_password;
?>