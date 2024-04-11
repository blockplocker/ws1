<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    // Skriv en switch som utifrån 1-7 (som lagras i en variabel) skriver ut veckodag. Om man
    // anger något annat i variabeln så ska ett felmeddelande skrivas ut.
    $dag = rand(1,8);

    switch ($dag) {
        case 1:
            echo "måndag";
            break;
        case 2:
            echo "tisdag";
            break;
        case 3:
            echo "onsdag";
            break;
        case 4:
            echo "torsdag";
            break;
        case 5:
            echo "fredag";
            break;
        case 6:
            echo "lördag";
            break;
        case 7:
            echo "söndag";
            break;
        default:
            echo "fel ingen dag";
            break;
    }
    
    
    ?>
</body>
</html>