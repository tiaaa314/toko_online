<?php
session_start();
require_once "koneksi.php";

/* ===== VALIDASI ADMIN ===== */
if (
    !isset($_GET['admin']) ||
    $_GET['admin'] !== '1' ||
    !isset($_GET['key']) ||
    $_GET['key'] !== 'ADMIN123'
) {
    echo "AKSES DITOLAK";
    exit;
}

$_SESSION['admin'] = true;

/* ===== JIKA FORM DIKIRIM ===== */
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $id     = intval($_POST['id_produk']);
    $nama   = $_POST['nama_produk'];
    $desk   = $_POST['deskripsi'];
    $harga  = intval($_POST['harga']);
    $stok   = intval($_POST['stok']);
    $gambar = $_POST['gambar'];

    $stmt = $conn->prepare(
    "UPDATE produk
        SET nama_produk=?, deskripsi=?, harga=?, stok=?, gambar=?
        WHERE id_produk=?"
    );

    $stmt->bind_param(
    "ssissi",
    $nama,
    $desk,
    $harga,
    $stok,
    $gambar,
    $id
);

$stmt->execute();

header("Location: ../baju.html?admin=1&key=ADMIN123");
exit;
}
?>

<!-- ===== FORM EDIT PRODUK ===== -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>
</head>
<body>

<h2>Edit Produk</h2>

<form method="POST">
    <input type="hidden" name="id_produk" value="1">

    <label>Nama Produk</label><br>
    <input type="text" name="nama_produk" required><br><br>

    <label>Deskripsi</label><br>
    <textarea name="deskripsi" required></textarea><br><br>

    <label>Harga</label><br>
    <input type="number" name="harga" required><br><br>

    <label>Stok</label><br>
    <input type="number" name="stok" required><br><br>

    <label>Gambar (URL)</label><br>
    <input type="text" name="gambar"><br><br>

    <button type="submit">💾 Simpan</button>
</form>

</body>
</html>
