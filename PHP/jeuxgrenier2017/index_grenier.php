<?php
/**********************************************************************/
/******************** REPRENDRE POUR CHAQUE EXERCICE ******************/

// Nom du fichier de test - Changer le nom pour changer le fichier testé
const INPUT_FILENAME = 'input/input3.txt';

// 1°) Lecture du fichier de d'entrée
$input = [];
$file = fopen(INPUT_FILENAME, 'r');
while($line = fgetcsv($file)){
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
// 2°) 

// enléve le prémier ligne
$nombreJeux=array_shift($input);
/**********************************************************************/
// 3°) 
$min=min($input);
$max=max($input);
$result=$max-$min;
echo($result);




/****************  OLIVIER  ******************************************************/
/*
array_shift($input);

echo max($input) - min($input);
*/