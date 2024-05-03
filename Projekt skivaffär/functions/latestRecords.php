<div class="main">

        <h1>Välkommen till vår skivaffär!</h1>
        <p>Här kan du hitta information om de senaste albumen och artisterna.</p>
        <div class="senaste">

            <?php
            require "connector.php";

            try {
                // Anslut till databasen
                $pdo = connectToDb();

                // Förbered en SQL-fråga som ska köras mot databasen
                $sql = "SELECT * from latest";

                // Förbered och kör SQL-frågan med PDO::query()
                $stmt = $pdo->query($sql);

                //Använder fetch() för att hämta en rad i taget
                while ($row = $stmt->fetch()) {
                    echo "<img src=" . $row["album_img"] . " alt='album bild' height=100  width=100>";

                    echo "<ul>";
                    echo "<li>Title: " . $row['title'] . "</li>";
                    echo "<li>Artist: " . $row['name'] . "</li>";
                    echo "<li>Release year: " . $row['release_year'] . "</li>";
                    echo "<li>Genre: " . $row['genre'] . "</li>";
                    echo "<li>Rating: " . $row['rating'] . "</li>";
                    echo "<li>låtar: " . $row['låtlista'] . "</li>";
                    echo "<li>Updated at: " . $row['updated_at'] . "</li>";
                    echo "</ul>";

                }
                // Fånga upp eventuella fel från PHP PDO
            } catch (PDOException $e) {
                echo "<p>Anslutning misslyckades: " . $e->getMessage() . "</>";
            }

            ?>

</div>
    </div>