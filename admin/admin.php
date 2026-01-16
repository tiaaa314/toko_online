<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <style>
        body { font-family: Arial, sans-serif; background:#f4f4f4; }
        .container { width: 80%; margin: 40px auto; background:#fff; padding:20px; border-radius:8px; }
        a.btn { display:inline-block; padding:10px 15px; margin:5px; text-decoration:none; background:green; color:#fff; border-radius:4px; }
        h1 { margin-top:0; }
    </style>
</head>
<body>
<div class="container">
    <h1>Dashboard Admin Toko Bajoe</h1>
    <p>Selamat datang di halaman admin tanpa login 😄</p>

    <h3>Menu:</h3>
    <a class="btn" href="kelola-produk.php">Kelola Produk</a>
    <a class="btn" href="../baju.html">Lihat Halaman Katalog</a>
</div>
</body>
</html>
