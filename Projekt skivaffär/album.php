<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Album</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<?php require 'functions/navbar.php'; ?>
<div class="main">
    <?php
    require 'functions/add_album.php';
    require 'functions/show_album.php';
    show_album()
    ?>
</div>

</body>
</html>