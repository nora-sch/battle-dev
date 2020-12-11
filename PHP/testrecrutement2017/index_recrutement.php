<?php
/**********************************************************************/
/******************** REPRENDRE POUR CHAQUE EXERCICE ******************/

// Nom du fichier de test - Changer le nom pour changer le fichier testé
const INPUT_FILENAME = 'input/input1.txt';

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
foreach($input AS $note ){
if($note>=10){echo "JOB";}
else{echo "ECHEC";};
}
/**********************************************************************/



/****************  OLIVIER  ******************************************************/
/*
$note = $input[0];

if ($note >= 10) {
    echo 'JOB';
}

else {
    echo 'ECHEC';
}
*/

// OU
/*
$note = $input[0];

// Avec l'expression ternaire
echo $note >= 10 ? 'JOB' : 'ECHEC';
*/