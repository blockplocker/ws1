<form  action="" method="post">
        <fieldset >
            <legend>Lägg till ett album</legend>

                <label for="title">Title:</label>
                <input type="text" name="title" id="title" required>

                <label for="genre">Genre:</label>
                <input type="text" name="genre" id="genre" required>

                <?php
                $year = date('Y');
                ?>
                <label for="release_year">År:</label>
                <input type="number" name="release_year" id="release_year"  min="1500" max=<?= $year ?> required value=<?= $year ?>>

                <select name="a" id="">
                    <?php
                    include "functions/connector.php";

                    $pdo = connectToDb();

                    $sql = "SELECT name, artist_id from artists";

                    $stmt = $pdo->query($sql);

                    // Använder fetch() för att hämta en rad i taget
                    while ($row = $stmt->fetch()) {
                        echo "<option value='$row[artist_id]'>";
                        print_r($row['name']);
                        echo "</option>";
                    }
                    ?>

                </select>

            <button type="submit">Lägg till</button>

        </fieldset>
    </form>

    
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include "functions/connector.php";

        try {
            $pdo = connectToDb();
            $sql = "INSERT INTO albums (title, genre, release_year, artist_id) VALUES (:title, :genre, :release_year, :artist_id)";

            $title = strip_tags(trim($_POST['title']));
            $genre = strip_tags(trim($_POST['genre']));
            $release_year = strip_tags(trim($_POST['release_year']));
            $artist_id = $_POST['artist_id']; // Assuming it's a safe integer ID from the dropdown
    
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':genre', $genre);
            $stmt->bindParam(':release_year', $release_year);
            $stmt->bindParam(':artist_id', $artist_id);

            $stmt->execute();

            echo "<p>Album tillagd</p>";

        } catch (PDOException $e) {
            echo "<p>Anslutning misslyckades: " . $e->getMessage() . "</p>";
        }
    }
    ?>