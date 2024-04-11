<?php

$file = "no_file.txt";
// $file = "empty.txt";
// $file = "text.txt";

if (!file_exists($file)) {
  die("Filen <mark>$file</mark> finns inte.");
}

if (file_exists($file)) {
  echo "Filen finns";
}

echo "<p>Mer kod...</p>";
