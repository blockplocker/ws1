<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="uppdate artist">
    <title>Update Artist</title>
</head>
<body>
    
    
    <?php require_once 'functions/navbar.php'; ?>

    <div class="main">
        <h1>Update Artist</h1>
        <?php
        // Inkludera databasanslutningsfilen
        require_once "functions/connector.php";

        // Kontrollera om ett artist-id har skickats via post
        // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //     $artist_id = $_POST['artist_id'];
        if (isset($_POST['update_artist'])) {
            $artist_id = $_POST['artist_id'];

            try {
                // Anslut till databasen
                $pdo = connectToDb();

                // Förbered en SQL-fråga för att hämta information om artisten
                $sql = "SELECT * FROM artists WHERE artist_id = :artist_id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':artist_id', $artist_id);
                $stmt->execute();
                $artist = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($artist) {
                    // Visa ett formulär för att uppdatera artistinformation
                    ?>
                                        <form action="" method="post">
                                            <input type="hidden" name="artist_id" value="<?php echo htmlspecialchars($artist['artist_id']); ?>">
                                            <input type="hidden" name="updated_at" value="<?php echo htmlspecialchars($artist['updated_at']); ?>">
                                            <label for="name">Name:</label>
                                            <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($artist['name']); ?>" required><br>
                                            <label for="bio">Bio:</label>
                                            <input type="text" name="bio" id="bio" value="<?php echo htmlspecialchars($artist['bio']); ?>"><br>
                                            <button type="submit" name="update">Update Artist</button>
                                        </form>
                                        <?php
                } else {
                    echo "Artist not found.";
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        } else {
            echo "No artist selected.";

            //Go to artist.php if no artist was selected or when you uppdate an artist
            header("location:artist.php");
        }

        // Process the form submission when the Update Artist button is clicked
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
            try {

                // require_once "functions/connector.php";
                require_once "functions/execute_sql.php";

                $pdo = connectToDb();

                // Get the values from the form and sanitise them into an array
                $data = [
                    'artist_id' => strip_tags(trim($_POST['artist_id'])),
                    'name' => strip_tags(trim($_POST['name'])),
                    'bio' => strip_tags(trim($_POST['bio'])),
                    'current_time' => date('Y-m-d H:i:s'),
                ];

                $sql = "UPDATE artists SET name = :name, bio = :bio, updated_at = :current_time WHERE artist_id = :artist_id";

                insertIntoDatabase($pdo, $data, $sql);

            } catch (PDOException $e) {
                // Display an error message if there is a problem connecting to the database
                echo "<p>Anslutning misslyckades: " . $e->getMessage() . "</p>";
            }
        }
        ?>
</div>

</body>
</html>