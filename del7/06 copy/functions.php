<?php

/**
 * 
 *
 * @param array $array
 * @return void
 */
function list_array(array $array): void
{
    asort($array);
    foreach ($array as $element) {
        echo "<p> $element </p>";

    }
}


