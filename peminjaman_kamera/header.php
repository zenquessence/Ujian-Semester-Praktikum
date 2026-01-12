<?php
// Deteksi root folder untuk assets
if (file_exists("style.css")) {
    $base_url = "";
} elseif (file_exists("../style.css")) {
    $base_url = "../";
} elseif (file_exists("../../style.css")) {
    $base_url = "../../";
} else {
    $base_url = "";
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Sistem Peminjaman Kamera</title>
    <link rel="stylesheet" href="<?php echo $base_url; ?>style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>