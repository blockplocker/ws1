
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Albums by Artist</title>
    <!-- Link to external CSS file -->
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <!-- Include the navbar.php file to show navbar -->
    <?php require 'functions/navbar.php'; ?>

    <div class="main">
        <!-- Form to select an artist and view their albums -->
        <h1>Album efter Artist</h1>
        <form action="" method="post">
            <label for="artist">Välj en artist:</label>
            <!-- Dropdown to select an artist -->
            <select name="artist" id="artist">
                <?php
                // Include the connector.php file to connect to the database
                include "functions/connector.php";
                
                try {
                    // Connect to the database
                    $pdo = connectToDb();
                    // SQL query to fetch artist ID and name
                    $sql = "SELECT artist_id, name FROM artists";
                    // Execute the query
                    $stmt = $pdo->query($sql);
                    // Loop through each artist and create an option element
                    while ($row = $stmt->fetch()) {
                        echo "<option value='" . htmlspecialchars($row['artist_id']) . "'>" . htmlspecialchars($row['name']) . "</option>";
                    }
                } catch (PDOException $e) {
                    // Display an error message if the connection fails
                    echo "<option value=''>Anslutningsfel: " . $e->getMessage() . "</option>";
                }
                ?>
            </select>
            <!-- Submit button to view albums -->
            <button type="submit">Visa Album</button>
        </form>
        
        <?php
        // Check if the form was submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Get the selected artist ID from the form
            $artist_id = $_POST['artist'];
            try {
                // Connect to the database
                $pdo = connectToDb();
                // SQL query to fetch albums by the selected artist
                $sql = "SELECT title FROM albums WHERE artist_id = :artist_id";
                // Prepare the SQL statement
                $stmt = $pdo->prepare($sql);
                // Bind the artist ID parameter
                $stmt->bindParam(':artist_id', $artist_id);
                // Execute the query
                $stmt->execute();
                // Fetch all albums
                $albums = $stmt->fetchAll();
                // Check if any albums were found
                if ($stmt->rowCount() > 0) {
                    // Display the albums
                    echo "<h2>Album av vald Artist:</h2>";
                    echo "<ul>";
                    foreach ($albums as $album) {
                        echo "<li>" . htmlspecialchars($album['title']) . "</li>";
                    }
                    echo "</ul>";
                } else {
                    // Display a message if no albums were found
                    echo "<p>Inga album hittades av den valda artisten.</p>";
                }
            } catch (PDOException $e) {
                // Display an error message if the query fails
                echo "<p>Anslutning misslyckades: " . $e->getMessage() . "</p>";
            }
        }
        ?>
    </div>
</body>
</html>