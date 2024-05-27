<form action="" method="post">
    <fieldset>
        <legend>Lägg till ett album</legend>

        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required>

        <label for="genre">Genre:</label>
        <input type="text" name="genre" id="genre" required>

        <label for="img">Ablum img:</label>
        <input type="text" name="img" id="img" value="https://ifi.se/wp-content/uploads/bfi_thumb/bild-kommer-inom-kort-okel8mz38kislcyzsf0o6rys81s0f3ypg9wi34odfw.jpg" required>

        <label for="release_year">År:</label>
        <?php
        $year = date('Y');
        ?>
        <input type="number" name="release_year" id="release_year" min="1500" max="<?= $year ?>" required value="<?= $year ?>">

        <label for="artist_id">Artist:</label>
        <select name="artist_id" id="artist_id">
            <?php
            require_once "functions/connector.php";

            try {
                $pdo = connectToDb();
                $sql = "SELECT name, artist_id FROM artists";
                $stmt = $pdo->query($sql);
                while ($row = $stmt->fetch()) {
                    echo "<option value='" . htmlspecialchars($row['artist_id']) . "'>" . htmlspecialchars($row['name']) . "</option>";
                }
            } catch (PDOException $e) {
                echo "<option value=''>Anslutningsfel: " . $e->getMessage() . "</option>";
            }
            ?>
        </select>

        <button type="submit" name="add">Lägg till</button>
    </fieldset>
</form>

<?php
// Check if the form has been submitted and the add button has been clicked
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])) {
    try {

        require_once "execute_sql.php";

        $pdo = connectToDb();

        // Get the values from the form and sanitise them into an array
        $data = [
            'title' => strip_tags(trim($_POST['title'])),
            'genre' => strip_tags(trim($_POST['genre'])),
            'release_year' => strip_tags(trim($_POST['release_year'])),
            'artist_id' => strip_tags(trim($_POST['artist_id'])),
            'current_time' => date('Y-m-d H:i:s'),
            'album_img' => strip_tags(trim($_POST['img']))
        ];

        $sql = "INSERT INTO albums (title, genre, release_year, artist_id, updated_at, album_img) VALUES (:title, :genre, :release_year, :artist_id, :current_time, :album_img)";

        insertIntoDatabase($pdo, $data, $sql);

    } catch (PDOException $e) {
        // Display an error message if there is a problem connecting to the database
        echo "<p>Anslutning misslyckades: " . $e->getMessage() . "</p>";
    }
}
?>
