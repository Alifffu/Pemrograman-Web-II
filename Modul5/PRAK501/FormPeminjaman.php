<?php
require_once 'Model.php';

$id_peminjaman = '';
$id_member = '';
$id_buku = '';
$tgl_pinjam = '';
$tgl_kembali = '';

$member_list = getAllMember();
$buku_list = getAllBuku();

if (isset($_GET['id_peminjaman'])) {
    $id_peminjaman = $_GET['id_peminjaman'];
    $p = getPeminjamanById($id_peminjaman);
    if ($p) {
        $id_member = $p['id_member'];
        $id_buku = $p['id_buku'];
        $tgl_pinjam = $p['tgl_pinjam'];
        $tgl_kembali = $p['tgl_kembali'];
    }
}

if (isset($_POST['submit'])) {
    $id_member = $_POST['id_member'];
    $id_buku = $_POST['id_buku'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $tgl_kembali = $_POST['tgl_kembali'];

    if (!empty($_POST['id_peminjaman'])) {
        updatePeminjaman($_POST['id_peminjaman'], $id_member, $id_buku, $tgl_pinjam, $tgl_kembali);
    } else {
        insertPeminjaman($id_member, $id_buku, $tgl_pinjam, $tgl_kembali);
    }
    header('Location: Peminjaman.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Peminjaman</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f6f9; color: #333; padding: 20px; }
        .form-container { width: 400px; margin: 50px auto; padding: 30px; background: white; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border-top: 5px solid #AAC4F5; }
        h3 { color: #7da3e3; text-align: center; margin-top: 0; }
        label { font-weight: bold; display: block; margin-bottom: 5px; color: #555; }
        select, input { display: block; width: 100%; margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box; font-family: inherit; }
        select:focus, input:focus { border-color: #AAC4F5; outline: none; }
        button { width: 100%; padding: 12px; background: #AAC4F5; color: #333; border: none; border-radius: 6px; font-weight: bold; cursor: pointer; font-family: inherit; transition: background 0.2s; }
        button:hover { background: #9cb8ed; }
        .back-link { display: block; text-align: center; margin-top: 15px; color: #555; text-decoration: none; font-weight: bold; }
        .back-link:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="form-container">
        <h3><?= !empty($id_peminjaman) ? 'Form Ubah Peminjaman' : 'Form Penambahan Peminjaman'; ?></h3>
        <form action="" method="post">
            <input type="hidden" name="id_peminjaman" value="<?= $id_peminjaman; ?>">
            
            <label>Nama Member:</label>
            <select name="id_member" required>
                <option value="">-- Pilih Member --</option>
                <?php foreach ($member_list as $m): ?>
                    <option value="<?= $m['id_member']; ?>" <?= $m['id_member'] == $id_member ? 'selected' : ''; ?>><?= $m['nama_member']; ?></option>
                <?php endforeach; ?>
            </select>
            
            <label>Judul Buku:</label>
            <select name="id_buku" required>
                <option value="">-- Pilih Buku --</option>
                <?php foreach ($buku_list as $b): ?>
                    <option value="<?= $b['id_buku']; ?>" <?= $b['id_buku'] == $id_buku ? 'selected' : ''; ?>><?= $b['judul_buku']; ?></option>
                <?php endforeach; ?>
            </select>
            
            <label>Tanggal Pinjam:</label>
            <input type="date" name="tgl_pinjam" value="<?= $tgl_pinjam; ?>" required>
            
            <label>Tanggal Kembali:</label>
            <input type="date" name="tgl_kembali" value="<?= $tgl_kembali; ?>" required>
            
            <button type="submit" name="submit"><?= !empty($id_peminjaman) ? 'Ubah Data' : 'Daftar'; ?></button>
            <a href="Peminjaman.php" class="back-link">Kembali</a>
        </form>
    </div>
</body>
</html>