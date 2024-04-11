<?php
$file = "write.txt";

$txt = "Örjan Ålhammare";
// $txt = "<h1>Hahaha</h1>";

if (!file_exists($file)) {
  die("Filen <mark>$file</mark> finns inte.");
}

if (!is_writable($file)) {
  die("Filen <mark>$file</mark> går inte att skriva till.");
}

$myFile = fopen($file, "a") or die("Kan inte öppna filen!");

$txt = strip_tags($txt);

if (filesize($file) === 0) {
  fwrite($myFile, $txt);
} else {
  fwrite($myFile, PHP_EOL . $txt);
}
fclose($myFile);

echo "Skrivet till filen: " . $txt;
