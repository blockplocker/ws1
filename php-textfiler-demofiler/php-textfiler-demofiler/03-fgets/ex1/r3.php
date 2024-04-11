<?php

// $file = "no_file.txt";
// $file = "empty.txt";
$file = "text.txt";

if (!file_exists($file)) {
  die("Filen <mark>$file</mark> finns inte.");
}

$handle = fopen($file, 'r');

if ($handle) {
  if (filesize($file) > 0) {
    $contents = fgets($handle);
    fclose($handle);

    var_dump($contents);
  } else {
    echo "Filen är tom!";
  }
}
