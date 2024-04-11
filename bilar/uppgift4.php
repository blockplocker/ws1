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
    $start_time = microtime(true);

    try {
        $pdo = connectToDb();

        $sql = "SELECT YEAR, brand, reg, model FROM bilar order by brand asc";

        // Förbered och kör SQL-frågan med PDO::query()
        $stmt = $pdo->query($sql);
        $brand = "";
        //Använder fetch() för att hämta en rad i taget
        while ($row = $stmt->fetch()) {
            // echo "<pre>";
            // print_r($row);
            // echo "</pre>";
            if ($row['brand'] != $brand){
                echo "<h1>" . $row['brand'] . "</h1>";
                
                echo "</table>";
                echo "<table>";
                echo "<tr>";
                echo "<td>" . "Reg.nr" . "</td>";
                echo "<td>" . "model" . "</td>";
                echo "<td>" . "år" . "</td>";
                echo "</tr>";
            }

            echo "<tr>";
            echo "<td>" . $row['reg'] . "</td>";
            echo "<td>" . $row['model'] . "</td>";
            echo "<td>" . $row['YEAR'] . "</td>";
            echo "</tr>";
            $brand = $row['brand'];
        }

    } catch (PDOException $e) {
        echo "<p>Anslutning misslyckades: " . $e->getMessage() . "</>";
    }

    
$end_time = microtime(true);

$execution_time = ($end_time - $start_time);

echo " Execution time of script = " . $execution_time . " sec";
    ?>
</body>

</html>