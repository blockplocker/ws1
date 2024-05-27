<?php require 'functions/navbar.php'; ?>

<div class="main">
    <h1>Update Artist</h1>
    <?php
    // Inkludera databasanslutningsfilen
    include "functions/connector.php";

    // Kontrollera om ett artist-id har skickats via post
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
                    <button type="submit" >Update Artist</button>
                </form>
                <?php
            } else {
                echo "Artist not found.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    

        // Process the form submission when the Update Artist button is clicked
        try {
            $pdo = connectToDb();

            // Get the values from the form and sanitize them
            $name = strip_tags(trim($_POST['name']));
            $bio = strip_tags(trim($_POST['bio']));
            $current_time = date('Y-m-d H:i:s');

            // Check if the fields are empty
            if (!empty($name) && !empty($bio)) {
                $sql = "UPDATE artists SET name = :name, bio = :bio, updated_at = :current_time WHERE artist_id = :artist_id";
                $stmt = $pdo->prepare($sql);

                // Bind the values to named placeholders
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':bio', $bio);
                $stmt->bindParam(':current_time', $current_time);
                $stmt->bindParam(':artist_id', $artist_id);

                $stmt->execute();

                echo "<p>Artist uppdaterad</p>";
            } else {
                // Display error if there are empty fields
                echo "<p>Alla fält måste vara ifyllda</p>";
            }
        } catch (PDOException $e) {
            // Display an error message if there is a problem connecting to the database
            echo "<p>Anslutning misslyckades: " . $e->getMessage() . "</p>";
        }
    } else {
        echo "No artist selected.";
    }
    ?>
</div>
