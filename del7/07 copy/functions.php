<?php

/**
 * returnar summan av talen i en array
 *
 * @param array $array
 * @return float
 */

function summaavtal( array $array):float {
    $total = 0;
    foreach ($array as $element) {
        if (is_numeric($element)) {
            $total += $element;
        }
    }
    return $total;
}


