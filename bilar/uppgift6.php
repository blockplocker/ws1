<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <fieldset>
            <legend>Lägg till medlem</legend>

            <div class="formbox">
                <label for="firstname">Förmamn</label>
                <input type="text" name="firstname" id="firstname" required>
            </div>

            <div class="formbox">
                <label for="lastname">Efternamn</label>
                <input type="text" name="lastname" id="lastname" required>
            </div>

            <div class="formbox">
                <label for="bday">Födelsedatum</label>
                <input type="date" name="bday" id="bday" required>
            </div>

            <button type="submit">Skicka</button>

        </fieldset>
    </form>

    <?php
    require "connector.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $bday = $_POST['bday'];

        try {
            $pdo = connectToDb();

            $sql = "INSERT INTO persons (firstname, lastname, dateofbirth) VALUES (:firstname, :lastname, :bday)";

            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':bday', $bday);

            $stmt->execute();

            echo "<p>Medlem tillagd</p>";
        } catch (PDOException $e) {
            echo "<p>Anslutning misslyckades: " . $e->getMessage() . "</>";
        }
    }






    // try {
    //     $pdo = connectToDb();

    //     $sql = "SELECT CONCAT(persons.firstname,' ',persons.lastname) AS fullname, YEAR, brand, reg, model FROM cars inner JOIN persons ON persons.id = cars.carowner order BY brand";

    //     // Förbered och kör SQL-frågan med PDO::query()
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