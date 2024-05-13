<form action="" method="post">
    <fieldset>
        <legend>Lägg till ett album</legend>

        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required>

        <label for="genre">Genre:</label>
        <input type="text" name="genre" id="genre" required>

        <label for="release_year">År:</label>
        <?php
        $year = date('Y');
        ?>
        <input type="number" name="release_year" id="release_year" min="1500" max="<?= $year ?>" required value="<?= $year ?>">

        <label for="artist_id">Artist:</label>
        <select name="artist_id" id="artist_id">
            <?php
            include "functions/connector.php";

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
        $pdo = connectToDb();

        // Get the values from the form and sanitise them
        $title = strip_tags(trim($_POST['title']));
        $genre = strip_tags(trim($_POST['genre']));
        $release_year = strip_tags(trim($_POST['release_year']));
        $artist_id = strip_tags(trim($_POST['artist_id']));
        $current_time = date('Y-m-d H:i:s');

        // Check if the fields are empty
        if (!empty($title) && !empty($genre) && !empty($release_year) && !empty($artist_id) && !empty($current_time)) {
            $sql = "INSERT INTO albums (title, genre, release_year, artist_id, updated_at) VALUES (:title, :genre, :release_year, :artist_id, :current_time)";

            $stmt = $pdo->prepare($sql);

            // Bind the values to named placeholders
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':genre', $genre);
            $stmt->bindParam(':release_year', $release_year);
            $stmt->bindParam(':artist_id', $artist_id);
            $stmt->bindParam(':current_time', $current_time);

            $stmt->execute();

            echo "<p>Album tillagd</p>";

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
