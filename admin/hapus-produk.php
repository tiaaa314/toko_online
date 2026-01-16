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

include 'koneksi.php';

if (!isset($_GET['id'])) {
    header("Location: kelola-produk.php");
    exit;
}

$id = $_GET['id'];

$query  = "DELETE FROM produk WHERE id = $id";
$result = mysqli_query($conn, $query);

if ($result) {
    header("Location: kelola-produk.php");
    exit;
} else {
    echo "Gagal menghapus produk: " . mysqli_error($conn);
}
?>
