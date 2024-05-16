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
                            <form action="update_album.php" method="post">
                                <input type="hidden" name="album_id" value="<?php echo $album['album_id']; ?>">
                                <label for="title">Title:</label>
                                <input type="text" name="title" id="title" value="<?php echo $album['title']; ?>" required><br>
                                <label for="genre">Genre:</label>
                                <input type="text" name="genre" id="genre" value="<?php echo $album['genre']; ?>" required><br>
                                <label for="release_year">Release Year:</label>
                                <input type="number" name="release_year" id="release_year" value="<?php echo $album['release_year']; ?>" required><br>
                                <button type="submit">Update Album</button>
                            </form>
                            <?php
            } else {
                echo "Album not found.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "No album selected.";
    }
    ?>
</div>
</body>
</html>
