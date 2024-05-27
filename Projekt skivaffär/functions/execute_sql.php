<?php 

/**
 * prepare and execute sql statment
 *
 * @param [type] $pdo
 * @param [type] $data
 * @param [type] $sql
 * @return void
 */
function insertIntoDatabase($pdo, $data, $sql) {
    // Check if all values in the data array are not empty
    foreach ($data as $key => $value) {
        if (empty($value)) {
            echo "<p>Alla fält måste vara ifyllda</p>";
            return;
        }
    }

    $stmt = $pdo->prepare($sql);

    // Bind the values to named placeholders
    foreach ($data as $key => $value) {
        $stmt->bindValue(':' . $key, $value);
    }

    if ($stmt->execute()) {
        echo "<p>Formulärets innethåll är tillagdt</p>";
    } else {
        echo "<p>Något gick fel, försök igen</p>";
    }
}
