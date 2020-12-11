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

/**********************************************************************/
/****************************FUNCTIONS*********************************/
// vérifie et le contenu du tableau et enrégistre des coordonnés du récherchable dans un autre tableau

function searchForX($searchable, $array)
{
    $table = [];
    for ($y = 0; $y < count($array); $y++) {

        for ($x = 0; $x < count($array); $x++) {

            if ($array[$y][$x] === $searchable) {
                $table[] = [$y, $x];
            }
        }
    }
    return ($table);
}

// 2°) 
// enléve le prémier ligne
$size = array_shift($input);

/**********************************************************************/
// creation de la matrice

$matrix = [];
$cultivable = [];

$matrix = array_map('str_split', $input);

/**********************************************************************/
// vérifie et le contenu du tableau $matrix et enrégistre des coordonnés du récherchable dans un autre tableau $coordinates

$coordinatesX = searchForX('X', $matrix); // un tableau [ [0,5], [1,2] ]

/**********************************************************************/

function insideCases($y, $x, $size)
{
    if ($y >= 0 && $x >= 0) {
        if ($y < $size && $x < $size) {
            return true;
        }
    }
    return false;
}

foreach ($coordinatesX as $case) {
    $y = $case[0];
    $x = $case[1];

    if (insideCases($y - 1, $x - 1, $size) ) {
        array_push($cultivable, [$y - 1, $x - 1]);
    }
    if (insideCases($y, $x - 1, $size) ) {
        array_push($cultivable, [$y, $x - 1]);
    }
    if (insideCases($y + 1, $x - 1, $size) ) {
        array_push($cultivable, [$y + 1, $x - 1]);
    }
    if (insideCases($y - 1, $x, $size) ) {
        array_push($cultivable, [$y - 1, $x]);
    }
    if (insideCases($y + 1, $x, $size) ) {
        array_push($cultivable, [$y + 1, $x]);
    }
    if (insideCases($y - 1, $x + 1, $size) ) {
        array_push($cultivable, [$y - 1, $x + 1]);
    }
    if (insideCases($y, $x + 1, $size) ) {
        array_push($cultivable, [$y, $x + 1]);
    }
    if (insideCases($y + 1, $x + 1, $size) ) {
        array_push($cultivable, [$y + 1, $x + 1]);
    }
}
//supprimer des doublons dans le tableau $cultivable
$cultivable = array_unique($cultivable, SORT_REGULAR);
//
$finalResult = array_filter($cultivable, function ($element) use ($coordinatesX) {
    if (!in_array($element, $coordinatesX)) {
        return true;
    } else {
        return false;
    }
});

echo(count($finalResult));

