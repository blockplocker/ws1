<?php

// $file = "no_file.txt";
// $file = "empty.txt";
// $file = "text.txt";
$file = "ooops.txt";

if (!file_exists($file)) {
  die("Filen <mark>$file</mark> finns inte.");
}

$handle = fopen($file, 'r');

if ($handle) {
  if (filesize($file) > 0) {
    echo "<ol>";
    while (!feof($handle)) {
      echo "<li>" . htmlentities(fgets($handle)) . "</li>";
    }
    echo "</ol>";
  } else {
    echo "Filen är tom!";
  }
}
