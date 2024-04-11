<?php

/**
 * returnar minsta av talen i en array
 *
 * @param array $array
 * @return float
 */

function summaavtal( array $array):float {
    $minvalue = $array;
    foreach ($array as $number) {
        if ($number < $minvalue ) {
            $minvalue = $number;
        }
    }
    return $minvalue;
}


