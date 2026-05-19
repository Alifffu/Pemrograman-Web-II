<?php
$mahasiswa = [
    ["nama" => "Andi", "nim" => "2101001", "uts" => 87, "uas" => 65],
    ["nama" => "Budi", "nim" => "2101002", "uts" => 76, "uas" => 79],
    ["nama" => "Tono", "nim" => "2101003", "uts" => 50, "uas" => 41],
    ["nama" => "Jessica", "nim" => "2101004", "uts" => 60, "uas" => 75]
];

for ($i = 0; $i < count($mahasiswa); $i++) {
    $nilai_akhir = ($mahasiswa[$i]["uts"] * 0.4) + ($mahasiswa[$i]["uas"] * 0.6);
    $mahasiswa[$i]["akhir"] = $nilai_akhir;

    if ($nilai_akhir >= 80) {
        $huruf = "A";
    } elseif ($nilai_akhir >= 70) {
        $huruf = "B";
    } elseif ($nilai_akhir >= 60) {
        $huruf = "C";
    } elseif ($nilai_akhir >= 50) {
        $huruf = "D";
    } else {
        $huruf = "E";
    }
    $mahasiswa[$i]["huruf"] = $huruf;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PRAK402</title>
    <style>
        table { border-collapse: collapse; width: 50%; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #e0e0e0; }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Nama</th>
            <th>NIM</th>
            <th>Nilai UTS</th>
            <th>Nilai UAS</th>
            <th>Nilai Akhir</th>
            <th>Huruf</th>
        </tr>
        <?php
        for ($i = 0; $i < count($mahasiswa); $i++) {
            echo "<tr>";
            echo "<td>" . $mahasiswa[$i]["nama"] . "</td>";
            echo "<td>" . $mahasiswa[$i]["nim"] . "</td>";
            echo "<td>" . $mahasiswa[$i]["uts"] . "</td>";
            echo "<td>" . $mahasiswa[$i]["uas"] . "</td>";
            echo "<td>" . $mahasiswa[$i]["akhir"] . "</td>";
            echo "<td>" . $mahasiswa[$i]["huruf"] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>