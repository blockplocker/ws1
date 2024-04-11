<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // Uppgiften går ut på att slumpa fram ett tal mellan 1-10 och om det blir en femma så slutar
    // programmet att slumpa fram nya tal.
    // Varje tal som slumpas fram ska skrivas ut.
    // När en femma slumpas fram så ska det skrivas ut antal försök det tog att slumpa
    // fram en femma.
    // Det ska inte vara något kommatecken efter den funna femman.
    // Använd funktionen mt_rand(1, 10) för att slumpa fram tal.

    $x = 0;
    $stopnummer = 5;
    $antalnummer = 10;
    echo "<h1>Slumpa fram $stopnummer</h1>";
    echo "<p>";
    do {
        $x++;
        $i = rand(1, $antalnummer);
        echo ($i == $stopnummer) ? "<span>$i</span>" : "$i ";
    } while ($i != $stopnummer);
    echo "</p>";

    $probability = round(1 - pow((1 - (1/$antalnummer)), $x), 2);

    echo "<p>Det tog $x försök att slumpa fram en femma</p>";
    echo "<p>Det finns en ungefärlig sannolikhet på $probability att få en femma på ett försök.</p>";
    
    ?>
    <style>
        span{
            background-color: yellow;
        }
    </style>
</body>
</html>