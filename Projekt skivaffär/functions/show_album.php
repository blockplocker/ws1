<?php
require "timeElapsed.php";

/**
 * Show all albums, rate and modify buttons
 *
 * @return void
 */
function show_album()
{

    try {
        // Connect to the database
        $pdo = connectToDb();

        // Prepare a SQL query to be executed against the database
        $sql = "SELECT * FROM all_albums";

        // Prepare and execute the SQL query with PDO::query()
        $stmt = $pdo->query($sql);

        // Use fetch() to retrieve one row at a time
        while ($row = $stmt->fetch()) {
            echo "<ul>";


            echo "<li><img src='" . htmlspecialchars($row["album_img"]) . "' alt='album bild' height='100'  width='100'></li>";
            echo "<li>Artist: " . htmlspecialchars($row['name']) . "</li>";
            echo "<li>Title: " . htmlspecialchars($row['title']) . "</li>";
            echo "<li>Release year: " . htmlspecialchars($row['release_year']) . "</li>";
            echo "<li>Genre: " . htmlspecialchars($row['genre']) . "</li>";
            echo "<li>Rating: " . htmlspecialchars($row['rating']) . "</li>";
            echo "<li>Updated at: " . htmlspecialchars(timeElapsed($row['updated_at'])) . "</li>";

            // Generate a form for each delete button, passing in the ID of the record as a hidden input field
            echo "<form method='post' action=''>";
            echo "<input type='hidden' name='album_id' value='" . htmlspecialchars($row['album_id']) . "'>";
            echo "<input type='range' name='rating' id='rating' min='1' max='5' required>";
            echo "<button type='submit' name='rate'>Rate album</button>";
            echo "</form>";

            // Generate a form for each rate button, passing in the ID of the record as a hidden input field
            echo "<form method='post' action='./uppdate_album.php'>";
            echo "<input type='hidden' name='album_id' value='" . htmlspecialchars($row['album_id']) . "'>";
            echo "<button type='submit' name='update_album'>Modifiera album</button>";
            echo "</form>";

            echo "</ul>";
        }

        include "rate_album.php";
        // Handle form submission for deletion
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['rate'])) {
            $album_id = $_POST['album_id'];
            $rating = $_POST['rating'];
            rate_album($album_id, $rating);
        }

        // Catch any errors from PHP PDO
    } catch (PDOException $e) {
        echo "<p>Connection failed: " . $e->getMessage() . "</p>";
    }

}