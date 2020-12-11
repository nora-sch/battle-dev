<?php
require '../../vendor/autoload.php';
/**********************************************************************/
/******************** REPRENDRE POUR CHAQUE EXERCICE ******************/

// Nom du fichier de test - Changer le nom pour changer le fichier testé
const INPUT_FILENAME = 'input/input1.txt';

// 1°) Lecture du fichier de d'entrée
$input = [];
$file = fopen(INPUT_FILENAME, 'r');
while ($line = fgetcsv($file)) {
    $input[] = $line[0];
}
/*
// Ouverture du fichier, visualisation en tableau

$inputs=file("input/input1.txt");
foreach ($inputs AS $input){
    echo ("<pre> $input </pre>");
}
*/
/**********************************************************************/

$min = array_shift($input);
$max = array_shift($input);
$diviseur = array_shift($input);

//trouver le premier chiffre entre $min et $max qui peut se diviser par $diviseur

$numbers = [];
$currentCount = $min -= 1;
//ou plutôt range(MIN, MAX)
while ($currentCount >= $min && $currentCount < $max) {
    $currentCount++;
    array_push($numbers, $currentCount);
};

foreach ($numbers as $number) {
    $remainder = $number % $diviseur;
    if ($remainder == 0) {
        echo ($number);
        exit;
    }
}



/**********************************************************************/

/****************  OLIVIER  ******************************************************/

define('MIN', $input[0]);
define('MAX', $input[1]);
define('DIVIDER', $input[2]);

for ($number = MIN; $number <= MAX; $number++) {
    if ($number % DIVIDER === 0) {
        //echo $number;
        //exit;
        die("$number");
    }
}