<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    $aronwin = 0;
    $noawin = 0;
    $lika = 0;

    $limit = 5;
    while ($limit > 0) {
        $limit--;


        $aron = rand(1, 3);
        $noa = rand(1, 3);


        $a = match ($aron) {
            1 => "sten",
            2 => "sax",
            3 => "påse",
        };
        echo "<p>aron = $a<p>";

        $a = match ($noa) {
            1 => "sten",
            2 => "sax",
            3 => "påse",
        };
        echo "<p>noa = $a<p>";



        echo ($aron == $noa) ? "lika" :
            (($aron == 1 and $noa == 2 or $aron == 2 and $noa == 3 or $aron == 3 and $noa == 1) ? "aron win" :
                "noa win");


        ($aron == $noa) ? $lika++ :
            (($aron == 1 and $noa == 2 or $aron == 2 and $noa == 3 or $aron == 3 and $noa == 1) ? $aronwin++ :
                $noawin++);



        // if ($aron == 1 and $noa == 2 or $aron == 2 and $noa == 3 or $aron == 3 and $noa == 1) {
        //     echo "<p>aron win <p>";
        //     $aronwin++;
        // } elseif ($aron == $noa) {
        //     echo "<p>lika<p>";
        //     $lika++;
        // } else {
        //     echo "<p>noa win <p>";
        //     $noawin++;
        // }
    }
    echo "<h1>noa wins $noawin<h1>";
    echo "<h1>aron wins $aronwin<h1>";
    echo "<h1>lika $lika<h1>";

    ?>
</body>

</html>