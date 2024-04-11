<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // Sortera följande array i fallande ordning.
    // $members = ['Kalle', 'Lotten', 'Marie', 'Bengt'];`
    // Du får givetvis inte sortera den manuellt! Skriv sedan ut alla medlemmar i en sorterad lista.
    

    $members = ['Kalle', 'Lotten', 'Marie', 'Bengt'];
    sort($members);
    foreach ($members as $item) {
        echo "<p>$item<p>";
    }

    ?>
</body>

</html>