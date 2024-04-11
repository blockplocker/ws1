<?php

/**
 * 
 */ 

function days_in_month( int $month, int $year) {
    
    $months = [
        "dummy",
        ["January", 31],
        ["February", 28],  // 29 in a leap year
        ["March", 31],
        ["April", 30],
        ["May", 31],
        ["June", 30],
        ["July", 31],
        ["August", 31],
        ["September", 30],
        ["October", 31],
        ["November", 30],
        ["December", 31],
    ];

    // if ($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0){
    // };
    
    return $months[ $month ];
}
function isLeapYear($year) {
    return ($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0);
}
