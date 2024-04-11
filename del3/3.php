<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    // Ändra i uppgiften ovan så att det istället för siffran 0 ska texten Bang!!! skrivas ut. Gör en
    // lösning för for-loop, while-loop och do...while-loop.

    
$limit = 0;

for ($var = 10; $limit <= $var; $var--) {
    echo "<p>Bang!!!<p>";
}


$var = 10;
while ($limit <= $var) {
    echo "<p>Bang!!!<p>";
    $var--;
}

$var = 10;
do {
    echo "<p>Bang!!!<p>";
    $var--;
} while ($limit <= $var);
    
    ?>
</body>
</html>