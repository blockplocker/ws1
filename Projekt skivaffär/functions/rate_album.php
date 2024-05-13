<?php

/**
 * Rate album
 *
 * @param int $album_id The ID of the album to rate
 * @param int $rating The rating to assign to the album
 * @return void
 */
function rate_album($album_id, $rating)
{
    $pdo = connectToDb();

    try {
        // Start a transaction
        $pdo->beginTransaction();

        // Sanitise the values
        $album_id = strip_tags(trim($album_id));
        $rating = strip_tags(trim($rating));

        // SQL to update the rating of the album
        $sqlAlbum = "UPDATE albums SET rating = :rating WHERE album_id = :albumId";
        $stmtAlbum = $pdo->prepare($sqlAlbum);
        $stmtAlbum->execute(['rating' => $rating, 'albumId' => $album_id]);

        // Commit the transaction
        $pdo->commit();
        echo "Album rated successfully";
    } catch (PDOException $e) {
        // Rollback the transaction if any error occurs
        $pdo->rollback();
        echo "Error rating album: " . $e->getMessage();
    }

    $stmtAlbum = null;
    $pdo = null;
}
