<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // Lägg till (via kod) att Kalmar är residensstad i Kalmar län.

    // $residentCities = [
    // 'Södermanlands län' => 'Nyköping',
    // 'Dalarnas län' => 'Falun',
    // 'Blekinge län' => 'Karlskrona',
    // ];
    
    // // Koda resten
    // echo '<p>' . $residentCities['Kalmar län'] . ' finns nu i arrayen.
    // </p>';
    
    // Kalmar finns nu i arrayen.

    $residentCities = [
        'Södermanlands län' => 'Nyköping',
        'Dalarnas län' => 'Falun',
        'Blekinge län' => 'Karlskrona',
    ];

    $residentCities['Kalmar län'] = 'kalmar';

    echo '<p>' . $residentCities['Kalmar län'] . ' finns nu i arrayen.</p>';

    foreach ($residentCities as $county => $city) {
        echo "<p>I $county län är det $city som är residensstad.<p>";
    }

    ?>
</body>

</html>