<?php
$data = [
    [
        "no" => 1, 
        "nama" => "Ridho",
        "matkul" => [
            ["nama_mk" => "Pemrograman I", "sks" => 2],
            ["nama_mk" => "Praktikum Pemrograman I", "sks" => 1],
            ["nama_mk" => "Pengantar Lingkungan Lahan Basah", "sks" => 2],
            ["nama_mk" => "Arsitektur Komputer", "sks" => 3]
        ]
    ],
    [
        "no" => 2, 
        "nama" => "Ratna",
        "matkul" => [
            ["nama_mk" => "Basis Data I", "sks" => 2],
            ["nama_mk" => "Praktikum Basis Data I", "sks" => 1],
            ["nama_mk" => "Kalkulus", "sks" => 3]
        ]
    ],
    [
        "no" => 3, 
        "nama" => "Tono",
        "matkul" => [
            ["nama_mk" => "Rekayasa Perangkat Lunak", "sks" => 3],
            ["nama_mk" => "Analisis dan Perancangan Sistem", "sks" => 3],
            ["nama_mk" => "Komputasi Awan", "sks" => 3],
            ["nama_mk" => "Kecerdasan Bisnis", "sks" => 3]
        ]
    ]
];

for ($i = 0; $i < count($data); $i++) {
    $total_sks = 0;
    
    for ($j = 0; $j < count($data[$i]["matkul"]); $j++) {
        $total_sks += $data[$i]["matkul"][$j]["sks"];
    }
    
    $data[$i]["total_sks"] = $total_sks;
    
    if ($total_sks < 7) {
        $data[$i]["keterangan"] = "Revisi KRS";
    } else {
        $data[$i]["keterangan"] = "Tidak Revisi";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PRAK403</title>
    <style>
        table { border-collapse: collapse; width: 70%; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #e0e0e0; }
        .revisi { background-color: red; } 
        .aman { background-color: #00cc00; } 
    </style>
</head>
<body>
    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Mata Kuliah diambil</th>
            <th>SKS</th>
            <th>Total SKS</th>
            <th>Keterangan</th>
        </tr>
        <?php
        for ($i = 0; $i < count($data); $i++) {
            $mhs = $data[$i];
            
            for ($j = 0; $j < count($mhs["matkul"]); $j++) {
                $mk = $mhs["matkul"][$j];
                echo "<tr>";
                
                if ($j == 0) {
                    echo "<td>" . $mhs["no"] . "</td>";
                    echo "<td>" . $mhs["nama"] . "</td>";
                    echo "<td>" . $mk["nama_mk"] . "</td>";
                    echo "<td>" . $mk["sks"] . "</td>";
                    echo "<td>" . $mhs["total_sks"] . "</td>";
                    
                    if ($mhs["keterangan"] == "Revisi KRS") {
                        echo "<td class='revisi'>" . $mhs["keterangan"] . "</td>";
                    } else {
                        echo "<td class='aman'>" . $mhs["keterangan"] . "</td>";
                    }
                } else {
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td>" . $mk["nama_mk"] . "</td>";
                    echo "<td>" . $mk["sks"] . "</td>";
                    echo "<td></td>";
                    echo "<td></td>";
                }
                
                echo "</tr>";
            }
        }
        ?>
    </table>
</body>
</html>