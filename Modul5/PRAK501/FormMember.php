<?php
require_once 'Model.php';

$id_member = '';
$nomor_member = '';
$nama_member = '';
$alamat = '';
$tgl_mendaftar = '';
$tgl_terakhir_bayar = '';

if (isset($_GET['id_member'])) {
    $id_member = $_GET['id_member'];
    $member = getMemberById($id_member);
    if ($member) {
        $nomor_member = $member['nomor_member'];
        $nama_member = $member['nama_member'];
        $alamat = $member['alamat'];
        $tgl_mendaftar = date('Y-m-d\TH:i', strtotime($member['tgl_mendaftar']));
        $tgl_terakhir_bayar = $member['tgl_terakhir_bayar'];
    }
}

if (isset($_POST['submit'])) {
    $nomor_member = $_POST['nomor_member'];
    $nama_member = $_POST['nama_member'];
    $alamat = $_POST['alamat'];
    $tgl_mendaftar = $_POST['tgl_mendaftar'];
    $tgl_terakhir_bayar = $_POST['tgl_terakhir_bayar'];

    if (!empty($_POST['id_member'])) {
        updateMember($_POST['id_member'], $nomor_member, $nama_member, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar);
    } else {
        insertMember($nomor_member, $nama_member, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar);
    }
    header('Location: Member.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Member</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f6f9; color: #333; padding: 20px; }
        .form-container { width: 400px; margin: 50px auto; padding: 30px; background: white; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border-top: 5px solid #AAC4F5; }
        h3 { color: #7da3e3; text-align: center; margin-top: 0; }
        label { font-weight: bold; display: block; margin-bottom: 5px; color: #555; }
        input, textarea { display: block; width: 100%; margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box; font-family: inherit; }
        input:focus, textarea:focus { border-color: #AAC4F5; outline: none; }
        button { width: 100%; padding: 12px; background: #AAC4F5; color: #333; border: none; border-radius: 6px; font-weight: bold; cursor: pointer; font-family: inherit; transition: background 0.2s; }
        button:hover { background: #9cb8ed; }
        .back-link { display: block; text-align: center; margin-top: 15px; color: #555; text-decoration: none; font-weight: bold; }
        .back-link:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="form-container">
        <h3><?= !empty($id_member) ? 'Form Ubah Member' : 'Form Penambahan Member'; ?></h3>
        <form action="" method="post">
            <input type="hidden" name="id_member" value="<?= $id_member; ?>">
            
            <label>Nomor Member:</label>
            <input type="text" name="nomor_member" value="<?= $nomor_member; ?>" required>
            
            <label>Nama Member:</label>
            <input type="text" name="nama_member" value="<?= $nama_member; ?>" required>
            
            <label>Alamat:</label>
            <textarea name="alamat" rows="3" required><?= $alamat; ?></textarea>
            
            <label>Tanggal Mendaftar:</label>
            <input type="datetime-local" name="tgl_mendaftar" value="<?= $tgl_mendaftar; ?>" required>
            
            <label>Tanggal Terakhir Bayar:</label>
            <input type="date" name="tgl_terakhir_bayar" value="<?= $tgl_terakhir_bayar; ?>" required>
            
            <button type="submit" name="submit"><?= !empty($id_member) ? 'Ubah Data' : 'Daftar'; ?></button>
            <a href="Member.php" class="back-link">Kembali</a>
        </form>
    </div>
</body>
</html>