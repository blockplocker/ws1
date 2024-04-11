<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    
    $tal = 2;
    $limit = 11;

    // $taltxt = ($tal == 1) ? "Ettans": ($tal == 2) ? "tvåans": ($tal == 3) ? "Treans":($tal == 4) ? "Fyrans":($tal == 5) ? "Femmans":($tal == 6) ? "Sexans":($tal == 7) ? "Sjuans":($tal == 8) ? "Åttans":($tal == 9) ? "Nians":(($tal == 10) ? "Tians": "123");
    $talnamn = [
        1 => "Ettans",
        2 => "Tvåans",
        3 => "Treans",
        4 => "Fyrans",
        5 => "Femmans",
        6 => "Sexans",
        7 => "Sjuans",
        8 => "Åttans",
        9 => "Nians",
        10 => "Tians",
        ];
    
    if ($tal <= 0 or $tal > 100) {
        echo "<h1>Felaktigt värde </h1>";
        echo "<p>Du har valt ett felaktigt värde för vilken gångertabell du vill visa. Enbart tabeller mellan 1-100 är tillåtna </p>";

    } else {
        
        $taltxt = $talnamn[$tal] ?? 1;
        
        echo ($taltxt != 1)? "<h1> $taltxt tabell </h1>" :"<h1> Grundtabell $tal </h1>";
        
        for ($i = 1; $i < $limit; $i++) {
            $x = $i * $tal;
            echo "<p>$i * $tal = $x</p>";
        }
    }
    
    
    
    ?>
</body>
</html>