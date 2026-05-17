<!DOCTYPE html>
<html>
<head>

</head>
<body>
    <form method="POST">
        Nilai: <input type="number" name="nilai"><br>
        Dari:<br>
        <input type="radio" name="dari" value="C"> Celcius<br>
        <input type="radio" name="dari" value="F"> Fahrenheit<br>
        <input type="radio" name="dari" value="R"> Rheamur<br>
        <input type="radio" name="dari" value="K"> Kelvin<br>
        Ke:<br>
        <input type="radio" name="ke" value="C"> Celcius<br>
        <input type="radio" name="ke" value="F"> Fahrenheit<br>
        <input type="radio" name="ke" value="R"> Rheamur<br>
        <input type="radio" name="ke" value="K"> Kelvin<br>
        <input type="submit" name="konversi" value="Konversi">
    </form>

    <?php
    if (isset($_POST['konversi'])) {
        $nilai = $_POST['nilai'];
        $dari = $_POST['dari'];
        $ke = $_POST['ke'];
        $hasil = 0;
        $unit = "";

        if ($dari == "C") { $temp = $nilai; }
        elseif ($dari == "F") { $temp = ($nilai - 32) * 5/9; }
        elseif ($dari == "R") { $temp = $nilai * 5/4; }
        elseif ($dari == "K") { $temp = $nilai - 273.15; }

        if ($ke == "C") { $hasil = $temp; $unit = "°C"; }
        elseif ($ke == "F") { $hasil = ($temp * 9/5) + 32; $unit = "°F"; }
        elseif ($ke == "R") { $hasil = $temp * 4/5; $unit = "°R"; }
        elseif ($ke == "K") { $hasil = $temp + 273.15; $unit = "K"; }

        echo "<h3>Hasil Konversi: " . $hasil . " " . $unit . "</h3>";
    }
    ?>
</body>
</html>