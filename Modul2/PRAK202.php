<!DOCTYPE html>
<html>
<head>
    <style>
        .error { color: red; }
    </style>
</head>
<body>
    <?php

    $namaErr = $nimErr = $genderErr = "";
    $nama = $nim = $gender = "";

    if (isset($_POST['submit'])) {
        if (empty($_POST["nama"])) {
            $namaErr = "nama tidak boleh kosong";
        } else {
            $nama = $_POST["nama"];
        }

        if (empty($_POST["nim"])) {
            $nimErr = "nim tidak boleh kosong";
        } else {
            $nim = $_POST["nim"];
        }

        if (empty($_POST["gender"])) {
            $genderErr = "jenis kelamin tidak boleh kosong";
        } else {
            $gender = $_POST["gender"];
        }
    }
    ?>

    <form method="POST">
        Nama: <input type="text" name="nama" value="<?php echo $nama; ?>">
        <span class="error">* <?php echo $namaErr; ?></span><br>
        
        Nim: <input type="text" name="nim" value="<?php echo $nim; ?>">
        <span class="error">* <?php echo $nimErr; ?></span><br>
        
        Jenis Kelamin: <span class="error">* <?php echo $genderErr; ?></span><br>
        <input type="radio" name="gender" value="Laki-Laki" <?php if($gender == "Laki-Laki") echo "checked"; ?>> Laki-Laki<br>
        <input type="radio" name="gender" value="Perempuan" <?php if($gender == "Perempuan") echo "checked"; ?>> Perempuan<br>
        
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php

    if (!empty($nama) && !empty($nim) && !empty($gender)) {
        echo "<h3>Output:</h3>";
        echo $nama . "<br>";
        echo $nim . "<br>";
        echo $gender;
    }
    ?>
</body>
</html>