<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <button type="submit" name="logga">logga datum</button>
        <button type="submit" name="visa">visa loggade datum</button>
    </form>

    <?php
    require "functions.php";


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["logga"])) {
            writeDateToLog();
        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["visa"])) {
            echo readLog();
        }
    }





    ?>

</body>

</html>