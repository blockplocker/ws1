<!-- Form to add an artist -->
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

// Check if the form has been submitted and the add button has been clicked
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])) {
    try {
        $pdo = connectToDb();

        // Get the values from the form and sanitise them
        $name = strip_tags(trim($_POST['name']));
        $bio = strip_tags(trim($_POST['bio']));
        $current_time = date('Y-m-d H:i:s');

        // Check if the fields are empty
        if (!empty($name) && !empty($bio)) {
            $sql = "INSERT INTO artists (name, bio, updated_at) VALUES (:name, :bio, :current_time)";

            $stmt = $pdo->prepare($sql);

            // Bind the values to named placeholders
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':bio', $bio);
            $stmt->bindParam(':current_time', $current_time);

            $stmt->execute();

            echo "<p>Artist tillagd</p>";
        } else {
            //Display error if there are empty fields
            echo "<p>Alla fält måste vara ifyllda</p>";
        }
    } catch (PDOException $e) {
        // Display an error message if there is a problem connecting to the database
        echo "<p>Anslutning misslyckades: " . $e->getMessage() . "</p>";
    }
}
?>
