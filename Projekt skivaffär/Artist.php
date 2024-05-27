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
<?php require_once 'functions/navbar.php'; ?>
<div class="main">
    <?php
    // include add artist
    require_once 'functions/add_artist.php';
    // include show artists
    require_once 'functions/show_artists.php';
    // call show_artists
    show_artists()
        ?>
</div>

</body>
</html>