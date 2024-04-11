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

        $sql = "SELECT CONCAT(persons.firstname,' ',persons.lastname) AS fullname, YEAR, brand, reg, model FROM cars inner JOIN persons ON persons.id = cars.carowner GROUP BY persons.id";

        // Förbered och kör SQL-frågan med PDO::query()
        $stmt = $pdo->query($sql);

        //Använder fetch() för att hämta en rad i taget
        echo "<table>";
        while ($row = $stmt->fetch()) {
            // echo "<pre>";
            // print_r($row);
            // echo "</pre>";
    
            echo "<tr>";
            echo "<td>" . $row['brand'] . "</td>";
            echo "<td>" . $row['model'] . "</td>";
            echo "<td>" . $row['reg'] . "</td>";
            echo "<td>" . $row['YEAR'] . "</td>";
            echo "<td>" . $row['fullname'] . "</td>";
            echo "</tr>";

        }
        echo "</table>";

    } catch (PDOException $e) {
        echo "<p>Anslutning misslyckades: " . $e->getMessage() . "</>";
    }

    ?>
</body>

</html>