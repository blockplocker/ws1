<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artists</title>
    <!-- Link to external CSS file -->
    <link rel="stylesheet" href="index.css">
</head>
<body>
<!-- include navbar -->
<?php require 'functions/navbar.php'; ?>
<div class="main">
    <?php
    // include add artist
    require 'functions/add_artist.php';
    // include show artists
    require 'functions/show_artists.php';
    // call show_artists
    show_artists()
        ?>
</div>

</body>
</html>