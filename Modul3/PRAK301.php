<html>
<head>
    <style>
        .merah { 
            color: red; 
            font-weight: bold; 
        }
        .hijau { 
            color: green; 
            font-weight: bold; 
        }
    </style>
</head>
<body>
    <form method="POST">
        Jumlah Peserta : <input type="number" name="jumlah" value="<?= isset($_POST['jumlah']) ? $_POST['jumlah'] : '' ?>"> <br>
        <button type="submit" name="cetak">Cetak</button>
    </form>

    <?php
    if (isset($_POST['cetak'])) {
        $jumlah = $_POST['jumlah'];
        $i = 1;
        
        while ($i <= $jumlah) {
            if ($i % 2 != 0) {
                echo "<div class='merah'>Peserta ke-$i</div><br>";
            } else {
                echo "<div class='hijau'>Peserta ke-$i</div><br>";
            }
            $i++;
        }
    }
    ?>
</body>
</html>