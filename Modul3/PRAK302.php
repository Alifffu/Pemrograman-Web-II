<html>
<body>
    <form method="POST">
        Tinggi : <input type="number" name="tinggi" value="<?= isset($_POST['tinggi']) ? $_POST['tinggi'] : '' ?>" required> <br>
        Alamat Gambar : <input type="text" name="url" style="width: 175px;" required> <br>
        <button type="submit" name="cetak">Cetak</button>
    </form>

    <br>

    <?php
    if (isset($_POST['cetak'])) {
        $tinggi = $_POST['tinggi'];
        $url = $_POST['url'];
        
        $i = 0;
        while ($i < $tinggi) {
            
            $j = 0;
            while ($j < $i) {
                echo "<img src='$url' style='width:30px; opacity:0;'>"; 
                $j++;
            }
            
            $k = 0;
            while ($k < ($tinggi - $i)) {
                echo "<img src='$url' width='30px' height='30px'>";
                $k++;
            }
            
            echo "<br>";
            $i++;
        }
    }
    ?>
</body>
</html>