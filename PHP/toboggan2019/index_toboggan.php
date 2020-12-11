<?php
require '../../vendor/autoload.php';
/**********************************************************************/
/******************** REPRENDRE POUR CHAQUE EXERCICE ******************/

// Nom du fichier de test - Changer le nom pour changer le fichier testé
const INPUT_FILENAME = 'input/input3.txt';

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

$ages=explode(' ', $input[1]);
$count=0;
foreach($ages as $age ){
    if($age>=5&&$age<=9)
    $count++;
}echo($count);

/**********************         CODE DU MARIO          ************* */
echo count(array_filter(explode(" ",$input[1]),function($child) {
    return $child<10 && $child>4 ;
}));

/**********************         CODE D'OLIVIER          ************* */

echo count(array_filter(explode(' ', $input[1]), function($item){
    return $item >= 5 && $item <= 9;
}));

/**********************         CODE D'OLIVIER          ************* */

echo array_reduce(explode(' ', $input[1]), function($result, $item){
    return $item >= 5 && $item <= 9 ? $result + 1 : $result;
}, 0);

/**********************         CODE D'OLIVIER          ************* */
echo array_sum(array_map(function($item){
    return $item >= 5 && $item <= 9 ? 1 : 0;
}, explode(' ', $input[1])));