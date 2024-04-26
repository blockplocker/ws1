<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<nav>
    <ul>
        <li><a href="index.php">Hem</a></li>
        <li><a href="artists.php">Artister</a></li>
        <li><a href="album.php">Album</a></li>
        <li><a href="remove.php">Ta bort artist</a></li>
        <li><a href="artist_add.php">Lägg till artist</a></li>
        <li><a href="album_add.php">Lägg till album</a></li>
        <li><a href="update.php">Updatera</a></li>
        <li><a href="rate.php">Betygsätt</a></li>
    </ul>
</nav>


    <style>
        *, ::after, ::before {
            box-sizing: border-box;
        }
        
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        
nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

nav ul li {
    float: left;
}

nav ul li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

nav ul li a:hover {
    background-color: #111;
}

    </style>
</body>
</html>