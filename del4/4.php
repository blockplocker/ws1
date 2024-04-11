<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // Utgå från följande kod och koda det som saknas för att få till sökt resultat.
    
    // $residentCities = [
    // 'Södermanlands län' => 'Nyköping',
    // 'Dalarnas län' => 'Falun',
    // 'Blekinge län' => 'Karlskrona'
    // ];
    // // Koda resten
    
    // I Södermanlands län är det Nyköping som är residensstad.
    // I Dalarnas län är det Falun som är residensstad.
    // I Blekinge län är det Karlskrona som är residensstad.
    

    $residentCities = [
        'Södermanlands län' => 'Nyköping',
        'Dalarnas län' => 'Falun',
        'Blekinge län' => 'Karlskrona'
    ];
    foreach ($residentCities as $county => $city) {
        echo "<p>I $county län är det $city som är residensstad.<p>";
    }

    ?>
</body>

</html>