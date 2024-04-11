<?php 
function writeDateToLog() {
    $date = date("Y-m-d H:i:s");
    $logFile = "log.txt";
    file_put_contents($logFile, $date . PHP_EOL, FILE_APPEND);
}

function readLog() {
    $logFile = "log.txt";
    $log = file_get_contents($logFile);
    $log = str_replace(PHP_EOL, "<br>", $log);
    $logArray = explode("<br>", $log);
    $logArray = array_reverse($logArray);
    return $logArray;
}