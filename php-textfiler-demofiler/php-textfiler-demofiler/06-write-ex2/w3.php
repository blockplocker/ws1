<?php
$file = "write.txt";

$txt = "Örjan Ålhammare";
// $txt = "<h1>Hahaha</h1>";

if (file_exists($file)) {
  $myFile = fopen($file, "a") or die("Kan inte öppna filen!");

  $txt = strip_tags($txt);

  if (filesize($file) === 0) {
    fwrite($myFile, $txt);
  } else {
    fwrite($myFile, PHP_EOL . $txt);
  }
  fclose($myFile);

  echo "Skrivet till filen: " . $txt;
} else {
  echo "Filen finns inte";
}
