<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    // Skapa en loop som räknar ner från 10 till 0. Gör en lösning för for-loop, while-loop och do...
    // while-loop.

    
$limit = 0;

for ($var = 10; $limit <= $var; $var--) {
    echo "<p>$var<p>";
}


$var = 10;
while ($limit <= $var) {
    echo "<p>$var<p>";
    $var--;
}

$var = 10;
do {
    echo "<p>$var<p>";
    $var--;
} while ($limit <= $var);
    
    ?>
</body>
</html>