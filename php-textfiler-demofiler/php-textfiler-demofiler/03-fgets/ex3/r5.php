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
    while (!feof($handle)) {
      $lines[] = fgets($handle);
    }

    echo "<ol>";
    foreach ($lines as $row) {
      echo "<li>" . $row . "</li>";
    }
    echo "</ol>";
  } else {
    echo "Filen är tom!";
  }
}
