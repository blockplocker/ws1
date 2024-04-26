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
            <legend>Lägg till en artist</legend>

                <label for="name">Förnamn</label>
                <input type="text" name="name" id="name" required>

                <label for="bio">biografi</label>
                <input type="text" name="bio" id="bio" required>


            <button type="submit">Lägg till</button>

        </fieldset>
    </form>

    <?php
    require "functions/connector.php";

    if ($_POST) {

        try {
            $pdo = connectToDb();

            // Förbered och kör SQL-frågan med PDO::query()
            $sql = "INSERT INTO artists (name, bio, created_at, updated_at) VALUES (:name, :bio, :created_at, :updated_at)";

            $name = strip_tags(trim($_POST['name']));
            $bio = strip_tags(trim($_POST['bio']));
            $year = date('Y-m-d H:i:s');

            $args = [$name, $bio, $year, $year];

            if (!empty($name) && !empty($bio) && !empty($year) && !empty($year)) {


                $stmt = $pdo->prepare($sql);
                $stmt->execute(array_combine(explode(", ", ":name, :bio, :year, :year"), $args));

                echo "<p>artist tillagd</p>";

            } else {
                echo "<p>Alla fält måste vara ifyllda</p>";
            }


            // $stmt = $pdo->prepare($sql);
    
            // $stmt->bindParam(':firstname', $firstname);
    
            // $stmt->execute();
    
        } catch (PDOException $e) {
            echo "<p>Anslutning misslyckades: " . $e->getMessage() . "</>";
        }
    }


    ?>

</body>
</html>