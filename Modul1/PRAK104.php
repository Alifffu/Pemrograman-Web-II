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
    </style>
</head>
<body>
 
<?php
$smartphones = [
    "Samsung Galaxy S22",
    "Samsung Galaxy S22+",
    "Samsung Galaxy A03",
    "Samsung Galaxy Xcover 5"
];
?>
 
<table>
    <tr>
        <th>Daftar Smartphone Samsung</th>
    </tr>
    <?php foreach ($smartphones as $hp) : ?>
    <tr>
        <td><?= $hp ?></td>
    </tr>
    <?php endforeach; ?>
</table>
 
</body>
</html>
