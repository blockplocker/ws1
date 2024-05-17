<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Albums by Artist</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <?php require 'functions/navbar.php'; ?>

    <div class="main">

        <h1>Album efter Artist</h1>
        <form action="" method="post">
            <label for="artist">Välj en artist:</label>
            <select name="artist" id="artist">
                <?php
            include "functions/connector.php";
            
            try {
                $pdo = connectToDb();
                $sql = "SELECT artist_id, name FROM artists";
                $stmt = $pdo->query($sql);
                while ($row = $stmt->fetch()) {
                    echo "<option value='" . htmlspecialchars($row['artist_id']) . "'>" . htmlspecialchars($row['name']) . "</option>";
                }
            } catch (PDOException $e) {
                echo "<option value=''>Anslutningsfel: " . $e->getMessage() . "</option>";
            }
            ?>
        </select>
        <button type="submit">Visa Album</button>
    </form>
    
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $artist_id = $_POST['artist'];
        try {
            $pdo = connectToDb();
            $sql = "SELECT title FROM albums WHERE artist_id = :artist_id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':artist_id', $artist_id);
            $stmt->execute();
            $albums = $stmt->fetchAll();
            if ($stmt->rowCount() > 0) {
                echo "<h2>Album av vald Artist:</h2>";
                echo "<ul>";
                foreach ($albums as $album) {
                    echo "<li>" . htmlspecialchars($album['title']) . "</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>Inga album hittades av den valda artisten.</p>";
            }
        } catch (PDOException $e) {
            echo "<p>Anslutning misslyckades: " . $e->getMessage() . "</p>";
        }
    }
    ?>
    </div>
</body>
</html>
