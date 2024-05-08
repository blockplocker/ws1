<?php
// include "connector.php";
// include "remove_album.php";

try {
    // Connect to the database
    $pdo = connectToDb();

    // Prepare a SQL query to be executed against the database
    $sql = "SELECT * FROM albums order by album_id desc";

    // Prepare and execute the SQL query with PDO::query()
    $stmt = $pdo->query($sql);

    // Use fetch() to retrieve one row at a time
    while ($row = $stmt->fetch()) {
        echo "<img src='" . htmlspecialchars($row["album_img"]) . "' alt='album bild' height='100'  width='100'>";
        echo "<ul>";
        echo "<li>Title: " . htmlspecialchars($row['title']) . "</li>";
        // echo "<li>Artist: " . htmlspecialchars($row['name']) . "</li>";
        echo "<li>Release year: " . htmlspecialchars($row['release_year']) . "</li>";
        echo "<li>Genre: " . htmlspecialchars($row['genre']) . "</li>";
        echo "<li>Rating: " . htmlspecialchars($row['rating']) . "</li>";
        echo "<li>Låtar: " . htmlspecialchars($row['låtlista']) . "</li>"; 
        echo "<li>Updated at: " . htmlspecialchars($row['updated_at']) . "</li>";
        echo "</ul>";
    }

    // Handle form submission for deletion
    // if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
    //     $album_id = $_POST['album_id'];
    //     remove_album($album_id);
    // }

    // Catch any errors from PHP PDO
} catch (PDOException $e) {
    echo "<p>Connection failed: " . $e->getMessage() . "</p>";
}
?>

<script>
function confirmDelete() {
    return confirm("Are you sure you want to delete this album?");
}
</script>
