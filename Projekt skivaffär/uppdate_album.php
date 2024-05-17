<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Album</title>
</head>
<body>
<?php require 'functions/navbar.php'; ?>

<div class="main">

    <h1>Update Album</h1>
    <?php
    // Inkludera databasanslutningsfilen
    include "functions/connector.php";

    // Kontrollera om ett album-id har skickats via POST
    if (isset($_POST['update_album'])) {
        $album_id = $_POST['album_id'];

        try {
            // Anslut till databasen
            $pdo = connectToDb();

            // Förbered en SQL-fråga för att hämta information om albumet
            $sql = "SELECT * FROM albums WHERE album_id = :album_id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':album_id', $album_id);
            $stmt->execute();
            $album = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($album) {
                // Visa ett formulär för att uppdatera albuminformation
                ?>
                <form action="" method="post">
                <input type="hidden" name="album_id" value="<?php echo $album['album_id']; ?>">
                <input type="hidden" name="artist_id" value="<?php echo $album['artist_id']; ?>">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" value="<?php echo $album['title']; ?>" required><br>
                <label for="genre">Genre:</label>
                <input type="text" name="genre" id="genre" value="<?php echo $album['genre']; ?>" required><br>
                <label for="release_year">Release Year:</label>
                <input type="number" name="release_year" id="release_year" value="<?php echo $album['release_year']; ?>" required><br>
                <label for="album_img">Album img:</label>
                <input type="text" name="album_img" id="album_img" value="<?php echo $album['album_img']; ?>" required><br>


            <button type="submit" name="update">Update Album</button>
            </form>

            <?php
            } else {
                echo "Album not found.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    // else {
    //     echo "No album selected.";
    // }
    

    // Check if the form has been submitted and the update button has been clicked
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
        try {
            $pdo = connectToDb();

            // Get the values from the form and sanitise them
            $title = strip_tags(trim($_POST['title']));
            $genre = strip_tags(trim($_POST['genre']));
            $release_year = strip_tags(trim($_POST['release_year']));
            $artist_id = strip_tags(trim($_POST['artist_id']));
            $album_id = strip_tags(trim($_POST['album_id']));
            $album_img = strip_tags(trim($_POST['album_img']));
            $updated_at = date('Y-m-d H:i:s');

            // Check if the fields are empty
            if (!empty($title) && !empty($genre) && !empty($release_year) && !empty($artist_id) && !empty($album_id) && !empty($updated_at) && !empty($album_img)) {
                $sql = "UPDATE albums SET title = :title, genre = :genre, release_year = :release_year, artist_id = :artist_id, updated_at = :updated_at, album_img = :album_img where album_id = :album_id";

                // $sql = "UPDATE albums SET title = 'title', genre = 'test', release_year = 0, artist_id = 1, updated_at = '0000-05-15 09:11:13', album_img = '69' WHERE album_id = 29";
    
                $stmt = $pdo->prepare($sql);

                // Bind the values to named placeholders
                $stmt->bindParam(':title', $title);
                $stmt->bindParam(':genre', $genre);
                $stmt->bindParam(':release_year', $release_year);
                $stmt->bindParam(':artist_id', $artist_id);
                $stmt->bindParam(':album_id', $album_id);
                $stmt->bindParam(':updated_at', $updated_at);
                $stmt->bindParam(':album_img', $album_img);

                $stmt->execute();

                echo "<p>Album uppdaterad</p>";

            } else {
                //Display error if there are empty fields
                echo "<p>Alla fält måste vara ifyllda</p>";
            }
        } catch (PDOException $e) {
            // Display an error message if there is a problem connecting to the database
            echo "<p>Anslutning misslyckades: " . $e->getMessage() . "</p>";
        }
    }

    ?>
</div>
</body>
</html>
