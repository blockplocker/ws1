<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $städer = [
        "Södermanland" => [
            "Nyköping, 29891",
            "Trosa, 5027",
        ],
        "Östergötland" => [
            "Linköping 104232",
            "Norrköping 87247",
            "Motala 29823",
        ]
    ];

    echo "<h1>Svenskastäder</h1>";
    foreach ($städer as $typ => $svenskastäder) {
        echo "<h2>$typ</h2>";
        echo "<ul>";
        foreach ($svenskastäder as $nyckel => $typ) {
            echo "<li>$typ</li>";
        }
        echo "</ul>";
    }


    ?>
</body>

</html>