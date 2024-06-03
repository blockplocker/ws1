<div class="main">
    <h1>Välkommen till vår skivaffär!</h1>
    <p>Här kan du hitta information om de senaste albumen och artisterna.</p>
    <div class="senaste">
        
        <?php

        require_once "connector.php";
        require_once "timeElapsed.php";

        try {
            // Connect to the database
            $pdo = connectToDb();

            // Prepare a SQL query to fetch latest albums
            $sql = "SELECT * FROM all_albums";

            // Prepare and execute the SQL query with PDO
            $stmt = $pdo->query($sql);

            // Use fetch() to retrieve one row at a time
            while ($row = $stmt->fetch()) {
                echo "<ul>";
                echo "<li><img src='" . htmlspecialchars($row["album_img"]) . "' alt='album bild' height='100'  width='100'></li>";
                echo "<li>Title: " . htmlspecialchars($row['title']) . "</li>";
                echo "<li>Artist: " . htmlspecialchars($row['name']) . "</li>";
                echo "<li>Release year: " . htmlspecialchars($row['release_year']) . "</li>";
                echo "<li>Genre: " . htmlspecialchars($row['genre']) . "</li>";
                echo "<li>Rating: " . htmlspecialchars($row['rating']) . "</li>";
                echo "<li>Updaterad: " . htmlspecialchars(timeElapsed($row['updated_at'])) . "</li>";
                echo "</ul>";
            }
        } catch (PDOException $e) {
            echo "<p>Anslutning misslyckades: " . $e->getMessage() . "</p>";
        }
        ?>
    </div>
</div>
