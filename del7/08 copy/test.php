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

    $numbers = [1, 2, 4, 9, 5];
    $resultat = summaavtal($numbers);
    echo "<p> den minsta av talen är: $resultat </p>";

    ?>


</body>

</html>