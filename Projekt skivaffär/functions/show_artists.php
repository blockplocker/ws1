<?php
// include "connector.php";
include "remove_artist.php";

// Function to show all artists 
/**
 * Show artists and add a remove button
 *
 * @return void
 */
function Show_artists() {
    require "timeElapsed.php";
    try {
        // Connect to the database
        $pdo = connectToDb();

        // Prepare a SQL query to be executed against the database
        $sql = "SELECT * FROM artists order by artist_id desc";

        // Prepare and execute the SQL query with PDO::query()
        $stmt = $pdo->query($sql);

        // Use fetch() to retrieve one row at a time
        while ($row = $stmt->fetch()) {
            echo "<ul>";
            // Escape output to prevent XSS
            echo "<li>Artist: " . htmlspecialchars($row['name']) . "</li>";
            echo "<li>Bio: " . htmlspecialchars($row['bio']) . "</li>";
            echo "<li>Updaterad: " . htmlspecialchars(timeElapsed($row['updated_at'])) . "</li>";
            // Generate a form for each delete button
            echo "<form method='post' action=''>";
            echo "<input type='hidden' name='artist_id' value='" . htmlspecialchars($row['artist_id']) . "'>";

            echo "<button type='submit' name='delete' onclick='return confirmDelete()'>Remove Artist</button>";

            echo "</form>";

            
        echo "<form method='post' action='./uppdate_artist.php'>";
        echo "<input type='hidden' name='artist_id' value='" . htmlspecialchars($row['artist_id']) . "'>";

        echo "<button type='submit' name='update_artist'>Modifiera artist</button>";

        echo "</form>";

            echo "</ul>";
        }

        // Handle form submission for deletion
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
            $artist_id = $_POST['artist_id'];
            remove_artist($artist_id);
        }

        // Catch any errors from PHP PDO
    } catch (PDOException $e) {
        echo "<p>Connection failed: " . $e->getMessage() . "</p>";
    }
}
