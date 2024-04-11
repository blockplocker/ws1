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

    $namn = "nOa aROn pEdeR";
    $namn = formatera_namn($namn);
    echo "<h1>$namn</h1>";

    ?>


</body>

</html>