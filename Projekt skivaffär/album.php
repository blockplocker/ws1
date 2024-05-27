<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Album</title>
    <!-- Link to external CSS file -->
    <link rel="stylesheet" href="index.css">
</head>
<body>
    
<!-- include navbar -->
<?php require 'functions/navbar.php'; ?>
<div class="main">
    <?php
    // include add album
    require 'functions/add_album.php';
    // include show album
    require 'functions/show_album.php';
    // call show_album
    show_album()
    ?>
</div>

</body>
</html>