<html>
<body>
    <form method="POST">
        Batas Bawah : <input type="number" name="bawah"> <br>
        Batas Atas : <input type="number" name="atas"> <br>
        <button type="submit" name="cetak">Cetak</button>
    </form>

    <?php
    if (isset($_POST['cetak'])) {
        $bawah = $_POST['bawah'];
        $atas = $_POST['atas'];

        if ($bawah <= $atas) {
            do {
                if (($bawah + 7) % 5 == 0) {
                    echo "<img src='bintang.png' width='20px'> ";
                } else {
                    echo "$bawah ";
                }
                $bawah++;
            } while ($bawah <= $atas);
        }
    }
    ?>
</body>
</html>