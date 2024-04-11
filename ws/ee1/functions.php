<?php 

/**
 * skriver ut rader text
 * @param int $n
 */

function ee1(int $n): void {
    $rad = 1;
    while ($n > 0) {
        $n--;
        echo "<p> Här är rad $rad... så att säga. <p>";
    }
}

/**
 * skriver ut namn efternamn och hälsningsfras
 *
 * @param string $fname
 * @param string $lname
 * @return void
 */
function ee2(string $fname, string $lname, string $hälfrs): void {
    if ($hälfrs == "") {
        $hälfrs = "hej";
    }
    echo "<p> $hälfrs $fname $lname </p>";
} 

/**
 * ett tärnings spel
 * @return void
 */
function tärningspelet(): void {
    $n = 1;
    $omgångar = 1;
    
    while ($n != 0) {   //en loop
        $t1 = rand(1,6);  // slumpar tal till tärning
        $t2 = rand(1,6);  // slumpar tal till tärning
        if ($t1 == $t2) {   //kollar om tärningarna har samma värde 
            $n = 0;  //stopar om tärningarna är lika
        }else{
            $omgångar = ++$omgångar;  //visar att det gått en till omgång
        }
        echo "($t1,$t2)"; // skriver ut tärningarna
    }
    echo "<p> Det tog $omgångar att få ett par. </p>";  // skriver ut hur många gånger det tog tills tärningarna är lika
    
}


/**
 * slumpar bokstäver till gemener och versaler
 * @param string $text
 * @return void
 */

function Slumpatext(string $text): void {
    // Hantera om ingen text skickas
    if (empty($text)) {
        echo "ingen text har skickats";
        return;
    }

    // Slumpa versaler och gemener
    $n = 0;
    $slumpadText = "";
    for ($i = 0; $i < strlen($text); $i++) {
        $n = rand(0, 1);
        if ($n == 0){
            $slumpadText = strtoupper($text[$i]);
        }if ($n == 1){
            $slumpadText = strtolower($text[$i]);
        }
        
    }

    // Hantera ond kod
    $slumpadText = strip_tags($slumpadText);

    echo "<p>Slumpad text: $slumpadText</p>";  // Visa den slumpade texten
}


/**
 * slumpar lag och dommare 
 *
 * @param array $people
 * @return void
 */
function Slumpalag(array $people): void {
    $lag1 = "";
    $lag2 = "";
    for ($i = 1; $i < count($people);) {
        $random = array_rand($people);
        $n = ($people[$random]);
        unset($people[$random]);
        $lag1 .=  $n;
        $people = array_values($people);

        $random = array_rand($people);
        $n = ($people[$random]);
        unset($people[$random]);
        $lag2 .=  $n;
        $people = array_values($people);
    }
    $dommare = $people[0];
    echo "<h1> Slumpa lag och dommare </h1>";
    echo "<h3>Dommare</h3>";
    echo "<p>$dommare</p>";
    
    echo "<h3>Lag 1</h3>";
    echo "<p>$lag1</p>";

    echo "<h3>Lag2</h3>";
    echo "<p>$lag2</p>";
}

