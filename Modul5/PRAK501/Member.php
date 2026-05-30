<?php
require_once 'Model.php';

if (isset($_GET['id_member'])) {
    deleteMember($_GET['id_member']);
    header('Location: Member.php');
    exit;
}

$member_list = getAllMember();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Member</title>
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
        <h2>Daftar Member Perpustakaan Azure</h2>
        
        <div class="action-bar">
            <a href="Index.php" class="btn btn-back">← Kembali ke Menu</a>
            <a href="FormMember.php" class="btn btn-add">+ Tambah Data Member</a>
        </div>

        <table>
            <tr>
                <th>ID Member</th>
                <th>Nomor Member</th>
                <th>Nama Member</th>
                <th>Alamat</th>
                <th>Tanggal Mendaftar</th>
                <th>Tanggal Terakhir Bayar</th>
                <th>Opsi</th>
            </tr>
            <?php foreach ($member_list as $member): ?>
            <tr>
                <td><?= $member['id_member']; ?></td>
                <td><?= $member['nomor_member']; ?></td>
                <td><?= $member['nama_member']; ?></td>
                <td><?= $member['alamat']; ?></td>
                <td><?= $member['tgl_mendaftar']; ?></td>
                <td><?= $member['tgl_terakhir_bayar']; ?></td>
                <td class="action-links">
                    <a href="FormMember.php?id_member=<?= $member['id_member']; ?>" class="edit-btn">Edit</a>
                    <a href="Member.php?id_member=<?= $member['id_member']; ?>" class="delete-btn" onclick="return confirm('Hapus data member ini?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>