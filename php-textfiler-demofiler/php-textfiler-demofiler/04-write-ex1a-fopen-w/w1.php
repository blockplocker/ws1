<?php

$myFile = fopen("write.txt", "w") or die("Kan inte öppna filen!");

$txt = "Örjan Ålhammare";

fwrite($myFile, $txt);

fclose($myFile);
