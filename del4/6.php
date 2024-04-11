<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // Radera rätt nyckel (via kod) ur $x = ['A', 'B', 'C', 'D']; och loopa sedan ut nyckel och värde enligt nedan.
    
    // Nyckel = 0 Värde = A
    // Nyckel = 1 Värde = C
    // Nyckel = 2 Värde = D
    

    $x = ['A', 'B', 'C', 'D'];

    unset($x[1]);
    $x = array_values($x);

    foreach ($x as $nyckel => $värde) {
        echo "<p>Nyckel = $nyckel Värde = $värde<p>";
    }


    ?>
</body>

</html>