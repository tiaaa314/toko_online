<?php
session_start();

// VALIDASI VIA URL (SESUAI JS)
if (
  !isset($_GET['admin']) ||
  $_GET['admin'] !== '1' ||
  !isset($_GET['key']) ||
  $_GET['key'] !== 'ADMIN123'
) {
  echo "AKSES DITOLAK";
  exit;
}

// SET SESSION BIAR KONSISTEN
$_SESSION['admin'] = true;

require 'koneksi.php';
define('SECRET_KEY','ADMIN123');

if (($_POST['key'] ?? '') !== SECRET_KEY) {
    die('AKSES DITOLAK');
}

$nama = $_POST['nama_produk'] ?? '';
$desk = $_POST['deskripsi'] ?? '';
$harga = intval($_POST['harga'] ?? 0);
$stok = intval($_POST['stok'] ?? 0);
$gambar = $_POST['gambar'] ?? '';

$stmt = $conn->prepare(
    "INSERT INTO produk (nama_produk, deskripsi, harga, stok, gambar)
    VALUES (?, ?, ?, ?, ?)"
);
$stmt->bind_param("ssdds", $nama, $desk, $harga, $stok, $gambar);
$stmt->execute();

header("Location: ../baju.html?admin=1&key=ADMIN123");
exit;
