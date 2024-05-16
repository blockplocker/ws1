<<?php 

/**
 *  funktion för att beräkna tiden sedan ett datum
 *
 * @param [type] $date
 * @return string
 */
function timeElapsed($date) {
    // Konvertera det angivna datumet till en tidsstämpel
    $timestamp = strtotime($date);

    // Kontrollera om tidsstämpeln är giltig
    if ($timestamp === false) {
        return "Ogiltigt datum";
    }

    // Beräkna skillnaden i sekunder mellan det angivna datumet och dagens datum
    $difference = time() - $timestamp;

    // Konvertera skillnaden till år, månader, veckor, dagar och timmar
    $years = floor($difference / (365 * 24 * 60 * 60));
    $months = floor($difference / (30 * 24 * 60 * 60));
    $weeks = floor($difference / (7 * 24 * 60 * 60));
    $days = floor($difference / (24 * 60 * 60));
    $hours = floor($difference / (60 * 60));

    // Returnera resultatet baserat på den mest relevanta tidsenheten
    if ($years > 0) {
        return $years . " år sedan";
    } elseif ($months > 0) {
        return $months . " månader sedan";
    } elseif ($weeks > 0) {
        return $weeks . " veckor sedan";
    } elseif ($days > 0) {
        return $days . " dagar sedan";
    } else {
        return $hours . " timmar sedan";
    }
}


