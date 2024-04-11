<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"/>
</head>

<body>
    <form action="" method="post">
        <fieldset class="container">
            <legend>Lägg till en bil</legend>

            <div class="container">
                <label for="reg">Regestreringsnummer</label>
                <input type="text" name="reg" id="reg" required>
            </div>

            <div class="container">
                <label for="brand">Märke</label>
                <input type="text" name="brand" id="brand" required>
            </div>

            <div class="container">
                <label for="model">Modell</label>
                <input type="text" name="model" id="model" required>
            </div>

            <div class="container">
                <?php
                $year = date('Y');
                ?>
                <label for="year">År</label>
                <input type="number" name="year" id="year"  min="1900" max=<?=$year?> required value=<?=$year?>>
            </div>

            <div class="container">
                <label for="price">Pris</label>
                <input type="number" name="price" id="price" required>
            </div>

            <div class="container">
                <label for="carowner">Ägare</label>
                <select name="carowner" id="carowner" required>
                    
                    <?php
                    require "connector.php";

                    $pdo = connectToDb();

                    $sql = "SELECT CONCAT(persons.firstname,' ',persons.lastname) AS fullname, id from persons";

                    $stmt = $pdo->query($sql);

                    // Använder fetch() för att hämta en rad i taget
                    while ($row = $stmt->fetch()) {
                        echo "<option value='$row[id]'>";
                        print_r($row['fullname']);
                        echo "</option>";
                    }
                    ?>

                </select>

            </div>

            <button type="submit">Lägg till</button>

        </fieldset>
    </form>

    <?php

    if ($_POST) {
        
        try {
            $pdo = connectToDb();

            // Förbered och kör SQL-frågan med PDO::query()
            $sql = "INSERT INTO cars (reg, brand, model, year, price, carowner) VALUES (:reg, :brand, :model, :year, :price, :carowner)";
            
            $reg = strip_tags(trim($_POST['reg']));
            $brand = strip_tags(trim($_POST['brand']));
            $model = strip_tags(trim($_POST['model']));
            $year = strip_tags(trim($_POST['year']));
            $price = strip_tags(trim($_POST['price']));
            $carowner = strip_tags(trim($_POST['carowner']));
            
            $args = [$reg, $brand, $model, $year, $price, $carowner];

            if(!empty($reg) && !empty($brand) && !empty($model) && !empty($year) && !empty($price) && !empty($carowner)){

                
                $stmt = $pdo->prepare($sql);
                $stmt->execute(array_combine(explode(", ", ":reg, :brand, :model, :year, :price, :carowner"), $args));
                
                echo "<p>Bil tillagd</p>";

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






    // try {
    //     $pdo = connectToDb();
    

    //     $stmt = $pdo->query($sql);
    
    //     //Använder fetch() för att hämta en rad i taget
    //     while ($row = $stmt->fetch()) {
    //         // echo "<pre>";
    //         // print_r($row);
    //         // echo "</pre>";
    //     }
    
    // } catch (PDOException $e) {
    //     echo "<p>Anslutning misslyckades: " . $e->getMessage() . "</>";
    // }
    
    ?>
</body>

</html>