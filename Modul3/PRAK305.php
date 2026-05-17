<html>
<body>
    <form method="POST">
        <input type="text" name="teks">
        <button type="submit" name="submit">submit</button>
    </form>

    <?php
    if (isset($_POST['submit']) && !empty($_POST['teks'])) {
        $teks = $_POST['teks'];
        $panjang = strlen($teks);
        $i = 0;

        echo "<h3>Input:</h3>";
        echo "$teks";
        
        echo "<h3>Output:</h3>";
        
        while ($i < $panjang) {
            $char = $teks[$i];
            
            $j = 1;
            while ($j <= $panjang) {
                
                if ($j == 1) {
                    echo strtoupper($char);
                } else {
                    echo strtolower($char);
                }
                
                $j++;
            }
            $i++;
        }
    }
    ?>
</body>
</html>