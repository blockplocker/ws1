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
    $contents = fread($handle, filesize($file));
    fclose($handle);

    echo nl2br($contents);
  } else {
    echo "Filen är tom!";
  }
}
