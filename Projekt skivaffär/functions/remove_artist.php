<?php

/**
 * remove artist and its albums
 *
 * @param [type] $id
 * @return void
 */
function remove_artist($id) {
    $pdo = connectToDb();

    try {
        // Start a transaction
        $pdo->beginTransaction();

        // SQL to delete all albums for the artist
        $sqlAlbums = "DELETE FROM albums WHERE artist_id = :artistId";
        $stmtAlbums = $pdo->prepare($sqlAlbums);
        $stmtAlbums->execute(['artistId' => $id]);

        // SQL to delete the artist
        $sqlArtist = "DELETE FROM artists WHERE artist_id = :artistId";
        $stmtArtist = $pdo->prepare($sqlArtist);
        $stmtArtist->execute(['artistId' => $id]);

        // Commit the transaction
        $pdo->commit();
        echo "Artist and their albums deleted successfully";
    } catch (PDOException $e) {
        // Rollback the transaction if any error occurs
        $pdo->rollback();
        echo "Error deleting record: " . $e->getMessage();
    }

    $stmtAlbums = null;
    $stmtArtist = null;
    $pdo = null;
    // header("location: artist.php");
}
?>
<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this artist?");
    }
</script>