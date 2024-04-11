<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // Skapa en loop som räknar upp mellan 0 och 100 i steg om 10. Gör en lösning för for-loop,
    // while-loop och do...while-loop.
    
    $limit = 100;

    for ($var = 0; $var <= $limit; $var += 10) {
        echo "<p>$var<p>";
    }


    $var = 0;
    while ($var <= $limit) {
        echo "<p>$var<p>";
        $var += 10;
    }

    $var = 0;
    do {
        echo "<p>$var<p>";
        $var += 10;
    } while ($var <= $limit);


    ?>
</body>

</html>