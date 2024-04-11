<?php

/**
 * reverse string
 *
 * @param string $string
 * @return string
 */

function reverse( string $string):string {
    $array = mb_str_split($string);
    $array = array_reverse($array);
    $namn = "";
    foreach ($array as $letter) {
        $namn .= $letter;
    }
    return $namn;
}


