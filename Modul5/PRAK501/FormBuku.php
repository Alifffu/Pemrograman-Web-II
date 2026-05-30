<?php
require_once 'Model.php';

$id_buku = '';
$judul_buku = '';
$penulis = '';
$penerbit = '';
$tahun_terbit = '';

if (isset($_GET['id_buku'])) {
    $id_buku = $_GET['id_buku'];
    $buku = getBukuById($id_buku);
    if ($buku) {
        $judul_buku = $buku['judul_buku'];
        $penulis = $buku['penulis'];
        $penerbit = $buku['penerbit'];
        $tahun_terbit = $buku['tahun_terbit'];
    }
}

if (isset($_POST['submit'])) {
    $judul_buku = $_POST['judul_buku'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];

    if (!empty($_POST['id_buku'])) {
        updateBuku($_POST['id_buku'], $judul_buku, $penulis, $penerbit, $tahun_terbit);
    } else {
        insertBuku($judul_buku, $penulis, $penerbit, $tahun_terbit);
    }
    header('Location: Buku.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Buku</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f6f9; color: #333; padding: 20px; }
        .form-container { width: 400px; margin: 50px auto; padding: 30px; background: white; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border-top: 5px solid #AAC4F5; }
        h3 { color: #7da3e3; text-align: center; margin-top: 0; }
        label { font-weight: bold; display: block; margin-bottom: 5px; color: #555; }
        input { display: block; width: 100%; margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box; font-family: inherit; }
        input:focus { border-color: #AAC4F5; outline: none; }
        button { width: 100%; padding: 12px; background: #AAC4F5; color: #333; border: none; border-radius: 6px; font-weight: bold; cursor: pointer; font-family: inherit; transition: background 0.2s; }
        button:hover { background: #9cb8ed; }
        .back-link { display: block; text-align: center; margin-top: 15px; color: #555; text-decoration: none; font-weight: bold; }
        .back-link:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="form-container">
        <h3><?= !empty($id_buku) ? 'Form Ubah Buku' : 'Form Penambahan Buku'; ?></h3>
        <form action="" method="post">
            <input type="hidden" name="id_buku" value="<?= $id_buku; ?>">
            
            <label>Judul Buku:</label>
            <input type="text" name="judul_buku" value="<?= $judul_buku; ?>" required>
            
            <label>Penulis:</label>
            <input type="text" name="penulis" value="<?= $penulis; ?>" required>
            
            <label>Penerbit:</label>
            <input type="text" name="penerbit" value="<?= $penerbit; ?>" required>
            
            <label>Tahun Terbit:</label>
            <input type="number" name="tahun_terbit" value="<?= $tahun_terbit; ?>" required>
            
            <button type="submit" name="submit"><?= !empty($id_buku) ? 'Ubah Data' : 'Daftar'; ?></button>
            <a href="Buku.php" class="back-link">Kembali</a>
        </form>
    </div>
</body>
</html>