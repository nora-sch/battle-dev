<?php
require '../../vendor/autoload.php';
/**********************************************************************/
/******************** REPRENDRE POUR CHAQUE EXERCICE ******************/

// Nom du fichier de test - Changer le nom pour changer le fichier testé
const INPUT_FILENAME = 'input/input6.txt';

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
/********************************************************************* */
////////////////////////////////////////////

array_shift($input);

$trajet = 0;

foreach ($input as $boat) {
   $trajet += ceil($boat / 10);
}

echo $trajet;


/********************************************************************* */
/*echo array_reduce(array_slice($input, 1), function($result, $boat){
    return $result + ceil($boat / 10);
}, 0);
*/ 