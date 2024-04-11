<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 

    $limit = 6;
    for ($i = 0; $i < $limit; $i++) {
        echo "<p>".(rand(1,6))."<p>";
    }
    ?>
</body>
</html>

