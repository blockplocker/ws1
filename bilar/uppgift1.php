<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require "connector.php";

    try {
        $pdo = connectToDb();

        $sql = "SELECT concat(firstname, ' ' , lastname) AS fullname FROM persons";

        // Förbered och kör SQL-frågan med PDO::query()
        $stmt = $pdo->query($sql);

        //Använder fetch() för att hämta en rad i taget
        echo "<ul>";
        while ($row = $stmt->fetch()) {
            // echo "<pre>";
            // print_r($row);
            // echo "</pre>";
    
            echo "<li>" . $row['fullname'] . "</li>";
        }
        echo "</ul>";

    } catch (PDOException $e) {
        echo "<p>Anslutning misslyckades: " . $e->getMessage() . "</>";
    }

    ?>
</body>

</html>