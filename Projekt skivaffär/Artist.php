<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artists</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>

<?php require 'functions/navbar.php'; ?>
<div class="main">
    <?php
    require 'functions/add_artist.php';
    require 'functions/show_artists.php';
    show_artists()
        ?>
</div>

<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this artist?");
    }
</script>


</body>
</html>