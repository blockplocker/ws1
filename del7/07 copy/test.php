<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require "functions.php";

    $array = [1, 2, "3", 4, "text", 5];
    $resultat = summaavtal($array);
    echo "<p> Summan av talen är: $resultat </p>";

    ?>


</body>

</html>