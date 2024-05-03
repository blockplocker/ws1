<form action="" method="post">
    <fieldset>
        <legend>Lägg till en artist</legend>
        <label for="name">namn</label>
        <input type="text" name="name" id="name" required>

        <label for="bio">biografi</label>
        <input type="text" name="bio" id="bio" required>

        <button type="submit" name="add">Lägg till</button>
    </fieldset>
</form>

<?php
include "functions/connector.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])) {

    try {
        $pdo = connectToDb();

        $name = strip_tags(trim($_POST['name']));
        $bio = strip_tags(trim($_POST['bio']));
        $current_time = date('Y-m-d H:i:s');

        if (!empty($name) && !empty($bio)) {
            $sql = "INSERT INTO artists (name, bio, updated_at) VALUES (:name, :bio, :current_time)";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':bio', $bio);
            $stmt->bindParam(':current_time', $current_time);

            $stmt->execute();

            echo "<p>Artist tillagd</p>";
        } else {
            echo "<p>Alla fält måste vara ifyllda</p>";
        }
    } catch (PDOException $e) {
        echo "<p>Anslutning misslyckades: " . $e->getMessage() . "</p>";
    }
}
?>
