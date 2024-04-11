<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // Skapa ett skript med en array enligt metoden $v = [... med fyra nycklar som innehåller
    // en varsin bilmodell. Skriv därefter ut de fyra nycklarnas värde på en varsin rad. 
    

    $v = [1, 2, 3, 4,];
    foreach ($v as $item) {
        echo "<p>$item<p>";
    }

    ?>
</body>

</html>