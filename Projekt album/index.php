<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php require 'navbar.php'; ?>

    <h1>Välkommen till vår skivaffär!</h1>
    <p>Här kan du hitta information om de senaste albumen och artisterna.</p>

    <?php require "functions/latestRecords.php"; ?>
    <?php require "footer.php"; ?>

</body>

</html>