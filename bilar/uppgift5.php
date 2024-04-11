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

        $sql = "SELECT CONCAT(persons.firstname,' ',persons.lastname) AS fullname, YEAR, brand, reg, model FROM cars inner JOIN persons ON persons.id = cars.carowner order BY brand";

        // Förbered och kör SQL-frågan med PDO::query()
        $stmt = $pdo->query($sql);

        //Använder fetch() för att hämta en rad i taget
        $brand = "";
        while ($row = $stmt->fetch()) {
            // echo "<pre>";
            // print_r($row);
            // echo "</pre>";
            
            IF ($row['brand'] != $brand) {
            echo "<h1>" . $row['brand'] . "</h1>";
            
            echo "<table>";
            echo "<tr>";
            echo "<td>" . "Reg.nr" . "</td>";
            echo "<td>" . "model" . "</td>";
            echo "<td>" . "år" . "</td>";
            echo "<td>" . "ägare" . "</td>";
            echo "</tr>";
            
        }
                
            echo "<tr>";
            echo "<td>" . $row['reg'] . "</td>";
            echo "<td>" . $row['model'] . "</td>";
            echo "<td>" . $row['YEAR'] . "</td>";
            echo "<td>" . $row['fullname'] . "</td>";
            echo "</tr>";
            echo "</table>";
            
        $brand = $row['brand'];
        }

    } catch (PDOException $e) {
        echo "<p>Anslutning misslyckades: " . $e->getMessage() . "</>";
    }

    ?>
</body>

</html>