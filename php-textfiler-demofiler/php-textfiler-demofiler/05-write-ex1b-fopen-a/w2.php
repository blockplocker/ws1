<?php

$myFile = fopen("write.txt", "a") or die("Kan inte öppna filen!");

$txt = "Örjan Ålhammare";

fwrite($myFile, $txt);

fclose($myFile);
