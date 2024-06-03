<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Album" >
    <title>Album</title>
    <!-- Link to external CSS file -->
    <link rel="stylesheet" href="index.css">
</head>
<body>
    
<!-- include navbar -->
<?php require_once 'functions/navbar.php'; ?>
<div class="main">
    <?php
    // include add album
    require_once 'functions/add_album.php';
    // include show album
    require_once 'functions/show_album.php';
    // call show_album
    show_album()
    ?>
</div>

</body>
</html>