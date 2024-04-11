<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $tal = 22.5;
    $heltal = (int)$tal;
    $decimal = $tal - $heltal;
    if ($decimal >= 0.5) {
        $avrundat_tal = ++$heltal; } 
    else{
        $avrundat_tal = $heltal;
    }
    echo "<p>$avrundat_tal<p>";

    
    $tal2 = 22.4;
    $tal2 += 0.5;
    $tal2 = (int)$tal2;
    echo "<p>$tal2<p>"
    
    ?>
</body>
</html>

