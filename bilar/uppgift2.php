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

        $sql = "SELECT CONCAT(persons.firstname,' ',persons.lastname) AS fullname, COUNT(cars.carowner) AS carcount FROM cars RIGHT OUTER JOIN persons ON persons.id = cars.carowner GROUP BY persons.id;";

        // Förbered och kör SQL-frågan med PDO::query()
        $stmt = $pdo->query($sql);

        //Använder fetch() för att hämta en rad i taget
        echo "<ul>";
        while ($row = $stmt->fetch()) {
            // echo "<pre>";
            // print_r($row);
            // echo "</pre>";
    
            echo "<li>" . $row['fullname'] ." har ". $row['carcount'] . " bilar". "</li>";
        }
        echo "</ul>";

    } catch (PDOException $e) {
        echo "<p>Anslutning misslyckades: " . $e->getMessage() . "</>";
    }

    ?>
</body>

</html>
