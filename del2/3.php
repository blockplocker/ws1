<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // Lagra två tal i varsin variabel, jämför dem och skriv ut vilket som är störst eller om de är lika.
    $a = 10;
    $b = 10;
    echo $a > $b ? $a : ($a < $b ? $b : "lika");

    $g = "";
    $a > $b ? $g = $a : ($a < $b ? $g = $b : $g = "lika");

    echo $g;

    ?>
</body>

</html>