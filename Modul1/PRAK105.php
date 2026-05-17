<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Smartphone Samsung</title>
    <style>
        table {
            border: 1px solid black;
            border-spacing: 2px;
        }
 
        th, td {
            border: 1px solid black;
            padding: 1px 1px;
        }
 
        th {
            background-color: #ee1919;
            font-size: 20px;
            padding: 18px 1px;
        }
    </style>
</head>
<body>
 
<?php
$smartphones = [
    "hp1" => "Samsung Galaxy S22",
    "hp2" => "Samsung Galaxy S22+",
    "hp3" => "Samsung Galaxy A03",
    "hp4" => "Samsung Galaxy Xcover 5"
];
?>
 
<table>
    <tr>
        <th>Daftar Smartphone Samsung</th>
    </tr>
 
    <?php
    foreach ($smartphones as $hp) {
        echo "<tr>";
        echo "<td>" . $hp . "</td>";
        echo "</tr>";
    }
    ?>
</table>
 
</body>
</html>