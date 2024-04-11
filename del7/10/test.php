<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require "functions.php";


    $month = 5;
    $year = 2006;

    $resultat = days_in_month($month, $year);
    echo "<p> $resultat[1] days in $resultat[0].</p>";
print_r($resultat);


$yearToCheck = 2024;
if (isLeapYear($yearToCheck)) {
    echo "$yearToCheck is a leap year.";
} else {
    echo "$yearToCheck is not a leap year.";
}
    ?>


</body>

</html>