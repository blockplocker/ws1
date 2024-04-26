<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php include 'navbar.php'; ?>
<form action="" method="post">
        <fieldset class="container">
            <legend>Lägg till ett album</legend>

                <label for="title">title</label>
                <input type="text" name="title" id="title" required>

                <label for="genre">genre</label>
                <input type="text" name="genre" id="genre" required>

                <?php
                $year = date('Y');
                ?>
                <label for="release_year">År</label>
                <input type="number" name="release_year" id="release_year"  min="1500" max=<?= $year ?> required value=<?= $year ?>>

                    <?php
                    require "connector.php";

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

            </div>

            <button type="submit">Lägg till</button>

        </fieldset>
    </form>

    <?php
    // require "connector.php";

    // if ($_POST) {

    //     try {
    //         $pdo = connectToDb();

    //         // Förbered och kör SQL-frågan med PDO::query()
    //         $sql = "INSERT INTO cars (title, brand, genre, release_year, price, carowner) VALUES (:title, :brand, :genre, :release_year, :price, :carowner)";

    //         $title = strip_tags(trim($_POST['title']));
    //         $genre = strip_tags(trim($_POST['genre']));
    //         $release_year = strip_tags(trim($_POST['release_year']));
    //         $artist_id = strip_tags(trim($_POST['artist_id']));

    //         $args = [$title, $genre, $release_year, $artist_id];

    //         if (!empty($title)  && !empty($genre) && !empty($release_year) && !empty($artist_id)) {


    //             $stmt = $pdo->prepare($sql);
    //             $stmt->execute(array_combine(explode(", ", ":title, :genre, :release_year,  :artist_id"), $args));

    //             echo "<p>album tillagd</p>";

    //         } else {
    //             echo "<p>Alla fält måste vara ifyllda</p>";
    //         }


    //         // $stmt = $pdo->prepare($sql);
    
    //         // $stmt->bindParam(':firstname', $firstname);
    
    //         // $stmt->execute();
    
    //     } catch (PDOException $e) {
    //         echo "<p>Anslutning misslyckades: " . $e->getMessage() . "</>";
    //     }
    // }


    ?>

</body>
</html>