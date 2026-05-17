<html>
<body>
    <form method="POST" action="">
        Nilai : <input type="number" name="nilai" value="<?php echo isset($_POST['nilai']) ? $_POST['nilai'] : ''; ?>"><br>
        <input type="submit" name="konversi" value="Konversi">
    </form>

    <?php
    if (isset($_POST['konversi'])) {
        $nilai = $_POST['nilai'];
        $hasilangka = "";

        if ($nilai == 0) {
            $hasilangka = "Nol";
        } elseif ($nilai >= 1 && $nilai <= 9) {
            $hasilangka = "Satuan";
        } elseif ($nilai >= 11 && $nilai <= 19) {
            $hasilangka = "Belasan";
        } elseif ($nilai == 10 || ($nilai >= 20 && $nilai <= 99)) {
            $hasilangka = "Puluhan";
        } elseif ($nilai >= 100 && $nilai <= 999) {
            $hasilangka = "Ratusan";
        } else {
            $hasilangka = "Anda Menginput Melebihi Limit Bilangan";
        }

        echo "<h2>Hasil: " . $hasilangka . "</h2>";
    }
    ?>
</body>
</html>