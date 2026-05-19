<?php
$panjang = "";
$lebar = "";
$nilai = "";

if (isset($_POST["cetak"])) {
    $panjang = $_POST["panjang"];
    $lebar = $_POST["lebar"];
    $nilai = $_POST["nilai"];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PRAK401</title>
    <style>
        table { border-collapse: collapse; }
        td { padding: 5px; border: 1px solid black; text-align: center; }
    </style>
</head>
<body>
    <form method="POST">
        Panjang: <input type="text" name="panjang" value="<?= $panjang ?>"><br>
        Lebar: <input type="text" name="lebar" value="<?= $lebar ?>"><br>
        Nilai: <input type="text" name="nilai" value="<?= $nilai ?>"><br>
        <button type="submit" name="cetak">Cetak</button>
    </form>
    <br>

    <?php
    if (isset($_POST["cetak"])) {
        $isi_nilai = explode(" ", $nilai);
        $total_elemen = $panjang * $lebar;

        if (count($isi_nilai) == $total_elemen) {
            $index = 0;
            echo "<table>";
            for ($i = 0; $i < $panjang; $i++) {
                echo "<tr>";
                for ($j = 0; $j < $lebar; $j++) {
                    echo "<td>" . $isi_nilai[$index] . "</td>";
                    $index++;
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Panjang nilai tidak sesuai dengan ukuran matriks";
        }
    }
    ?>
</body>
</html>