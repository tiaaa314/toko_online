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

// ambil semua produk
$query = "SELECT * FROM produk ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Produk</title>
    <style>
        body { font-family: Arial, sans-serif; background:#f4f4f4; }
        .container { width: 90%; margin: 40px auto; background:#fff; padding:20px; border-radius:8px; }
        table { width:100%; border-collapse:collapse; margin-top:15px; }
        th, td { border:1px solid #ddd; padding:8px; text-align:left; }
        th { background:#eee; }
        a.btn { display:inline-block; padding:6px 10px; margin:2px; text-decoration:none; border-radius:4px; font-size:14px; }
        .btn-tambah { background:green; color:#fff; }
        .btn-edit { background:orange; color:#fff; }
        .btn-hapus { background:red; color:#fff; }
        .btn-back { background:#555; color:#fff; }
        img { max-width:80px; }
    </style>
</head>
<body>
<div class="container">
    <h1>Kelola Produk</h1>
    <a class="btn btn-back" href="admin.php">← Kembali ke Dashboard</a>
    <a class="btn btn-tambah" href="tambah-produk.php">+ Tambah Produk</a>

    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Kategori</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo htmlspecialchars($row['nama']); ?></td>
            <td>Rp <?php echo number_format($row['harga'],0,',','.'); ?></td>
            <td><?php echo htmlspecialchars($row['kategori']); ?></td>
            <td>
                <?php if (!empty($row['gambar'])): ?>
                    <img src="<?php echo htmlspecialchars($row['gambar']); ?>" alt="">
                <?php endif; ?>
            </td>
            <td>
                <a class="btn btn-edit" href="edit-produk.php?id=<?php echo $row['id']; ?>">Edit</a>
                <a class="btn btn-hapus" href="hapus-produk.php?id=<?php echo $row['id']; ?>"
                onclick="return confirm('Yakin ingin menghapus produk ini?');">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>
