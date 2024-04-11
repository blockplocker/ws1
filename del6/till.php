<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    
    if ($_POST) {
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
    }
    if ($_GET) {
        echo "<pre>";
        print_r($_GET);
        echo "</pre>";
    }
    ?>
</body>

</html>