<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // Skapa en loop som räknar upp från 10 till 20. Gör en lösning för for-loop, while-loop och
// do...while-loop. 
    

    $limit = 20;

    for ($var = 10; $var <= $limit; $var++) {
        echo "<p>$var<p>";
    }


    $var = 10;
    while ($var <= $limit) {
        echo "<p>$var<p>";
        $var++;
    }

    $var = 10;
    do {
        echo "<p>$var<p>";
        $var++;
    } while ($var <= $limit);

    ?>
</body>

</html>