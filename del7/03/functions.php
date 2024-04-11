<?php

/**
 *räknar arean av en cirkel
 *
 * @param float $radius
 * @return string
 */
function cirkelarea(float $radius): string
{
    $area = M_PI * pow($radius, 2);
    $area = number_format($area, 2);
    return $area;
}