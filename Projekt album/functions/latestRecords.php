<?php
    require "functions/connector.php";

    try {
        $pdo = connectToDb();

        $sql = "SELECT album_img, title, name, genre, albums.updated_at FROM artists INNER JOIN albums ON albums.artist_id = artists.artist_id ORDER BY updated_at desc";

        // Förbered och kör SQL-frågan med PDO::query()
        $stmt = $pdo->query($sql);

        //Använder fetch() för att hämta en rad i taget
        
        while ($row = $stmt->fetch()) {
            // echo "<pre>";
            // print_r($row);
            // echo "</pre>";
            echo "<img src=" . $row["album_img"] . " alt='album bild' height=100  width=100>";

            echo "<li>" . $row['name'] ." ". $row['title'] . "</li>";
        }

    } catch (PDOException $e) {
        echo "<p>Anslutning misslyckades: " . $e->getMessage() . "</>";
    }
