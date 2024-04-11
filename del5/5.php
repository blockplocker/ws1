<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 

    echo "<h1>Matris tio gångerstabeller</h1>";

    echo "<table>";
    for ($i = 0; $i < 11; $i++) {
        echo ($i == 0)? "<tr> <td></td>": "<tr> <th>$i</th>";
        for ($x = 1; $x < 11; $x++) {
            $tal = $i * $x; 
            echo (($i == 0)?"<th>$x</th>":"<td>$tal</td>");
        }
    }
    echo "</table>";
    
    ?>
    <style>
            td,
            th,
            table{
            border: 1px solid #000;
            border-collapse: collapse;
            padding: 10px;
        }
        th{
            background-color: #2c3e50;
            color: #fff;
        }
        table tr td:nth-child(1){
            border: 1px solid #FFF;
            color: #fff;
            background-color: #fff;
        }
    </style>
</body>
</html>