<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // Generera följande tabell genom att använda formeln F = (C · 9/5) +32 .
    // Observera 1! Raderna med 0 och 100 C ska vara kursiva.
    // Observera 2! Temperaturen ökar med 10 grader C mellan varje rad.
    // Observera 2! Du får inte skapa tabellen manuellt, dvs hårdkoda den. Tabellen ska skapas
    // automatiskt, dvs ändrar vi start och stopp för C så ska tabellen ändras!
    $limit = 110;
    echo "<table>";
    echo "<tr>";
    echo "<th>Celcius</th>";
    echo "<th>Fahrenheit</th>";

    for ($i = -50; $i < $limit; $i += 10) {
        $f = ($i * 9 / 5) + 32;
        echo "<tr>";
        echo "<td>$i</td>";
        echo "<td>$f</td>";
        echo "</tr>";
    }
    echo "</table>";

    ?>
    <style>
        td,
        th,
        table {
            border: 1px solid #000;
            border-collapse: collapse;
        }
    </style>
</body>

</html>