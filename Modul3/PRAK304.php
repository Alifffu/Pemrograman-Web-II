<html>
<body>
    <?php
    $jumlah = isset($_POST['jumlah']) ? (int)$_POST['jumlah'] : 0;

    if (isset($_POST['tambah'])) { 
        $jumlah++;
    }
    
    if (isset($_POST['kurang'])) { 
        if ($jumlah > 0) { 
            $jumlah--;
        } 
    }

    if ($jumlah == 0) { ?>
        <form method="POST">
            Jumlah bintang <input type="number" name="jumlah"> 
            <br>
            <button type="submit">Submit</button>
        </form>
    <?php } else { ?>
        <p>Jumlah bintang <?= $jumlah ?></p>
        
        <?php
        $i = 0;
        while ($i < $jumlah) {
            echo "<img src='bintang.png' width='50px'> ";
            $i++;
        }
        ?>
        
        <form method="POST">
            <input type="hidden" name="jumlah" value="<?= $jumlah ?>">
            <button type="submit" name="tambah">Tambah</button>
            <button type="submit" name="kurang">Kurang</button>
        </form>
    <?php } ?>
</body>
</html>