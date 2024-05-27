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
require_once "functions/connector.php";

// Check if the form has been submitted and the add button has been clicked
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])) {
    try {

        require_once "execute_sql.php";

        $pdo = connectToDb();

        // Get the values from the form and sanitise them into an array
        $data = [
            'name' => strip_tags(trim($_POST['name'])),
            'bio' => strip_tags(trim($_POST['bio'])),
            'current_time' => date('Y-m-d H:i:s'),
        ];

        $sql = "INSERT INTO artists (name, bio, updated_at) VALUES (:name, :bio, :current_time)";

        insertIntoDatabase($pdo, $data, $sql);

    } catch (PDOException $e) {
        // Display an error message if there is a problem connecting to the database
        echo "<p>Anslutning misslyckades: " . $e->getMessage() . "</p>";
    }
}