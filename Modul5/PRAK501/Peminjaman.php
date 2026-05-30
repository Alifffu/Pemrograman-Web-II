<?php
require_once 'Model.php';

if (isset($_GET['id_peminjaman'])) {
    deletePeminjaman($_GET['id_peminjaman']);
    header('Location: Peminjaman.php');
    exit;
}

$peminjaman_list = getAllPeminjaman();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Peminjaman</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f6f9; color: #333; padding: 30px; }
        .container { width: 90%; margin: auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); }
        h2 { color: #7da3e3; text-align: center; margin-bottom: 30px; }
        .action-bar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
        .btn { padding: 10px 16px; text-decoration: none; border-radius: 6px; font-weight: 600; font-size: 14px; transition: all 0.2s; }
        .btn-add { background-color: #AAC4F5; color: #333; }
        .btn-add:hover { background-color: #9cb8ed; }
        .btn-back { background-color: #AAC4F5; color: #333; }
        .btn-back:hover { background-color: #9cb8ed; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #eee; }
        th { background-color: #AAC4F5; color: #333; font-weight: 600; }
        tr:hover { background-color: #f9fbfd; }
        .action-links a { text-decoration: none; font-weight: 600; font-size: 13px; padding: 8px 0; border-radius: 6px; display: inline-block; width: 75px; text-align: center; box-sizing: border-box; }
        .edit-btn { background-color: #dff6dd; color: #107c41; margin-right: 5px; }
        .edit-btn:hover { background-color: #cdeec8; }
        .delete-btn { background-color: #fde7e9; color: #a80000; }
        .delete-btn:hover { background-color: #fbc7ca; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Daftar Peminjaman Perpustakaan Azure</h2>
        
        <div class="action-bar">
            <a href="Index.php" class="btn btn-back">← Kembali ke Menu</a>
            <a href="FormPeminjaman.php" class="btn btn-add">+ Tambah Data Peminjaman</a>
        </div>

        <table>
            <tr>
                <th>ID Peminjaman</th>
                <th>Nama Member</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Opsi</th>
            </tr>
            <?php foreach ($peminjaman_list as $p): ?>
            <tr>
                <td><?= $p['id_peminjaman']; ?></td>
                <td><?= $p['nama_member']; ?></td>
                <td><?= $p['judul_buku']; ?></td>
                <td><?= $p['tgl_pinjam']; ?></td>
                <td><?= $p['tgl_kembali']; ?></td>
                <td class="action-links">
                    <a href="FormPeminjaman.php?id_peminjaman=<?= $p['id_peminjaman']; ?>" class="edit-btn">Edit</a>
                    <a href="Peminjaman.php?id_peminjaman=<?= $p['id_peminjaman']; ?>" class="delete-btn" onclick="return confirm('Hapus transaksi ini?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>