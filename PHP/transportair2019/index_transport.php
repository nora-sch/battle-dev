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

/* PAS FINI

$moi = array_shift($input);
$ami = array_shift($input);
$nbGares=36;

[$monDepart, $maLigne]=explode(' ',$moi);
[$sonDepart, $saLigne]=explode(' ',$ami);


 function est_multiple($nbGares, $maLigne){
     if($nbGares % $maLigne == 0){
     return true;}
     else {return false;}
 }
 if (est_multiple($nbGares, $maLigne)==true && est_multiple($nbGares, $saLigne)==true){


for($i=0; $i<=$nbGares; $i++){

};
*/


/************************************     code d'OLIVIER     **********************************/

/**********************************************************************/

list($gareA, $ligneA) = explode(' ', $input[0]);
list($gareB, $ligneB) = explode(' ', $input[1]);

$start = max([$gareA, $gareB]);

for ($gare = $start; $gare <= 36; $gare++) {
    if ($gare % $ligneA === 0 && $gare % $ligneB ===0) {
        die("$gare");
    }
}


/**********************************************************************/
for ($gare = max([$input[0][0], $input[1][0]]); $gare <= 36; $gare++) {
    if ($gare % $input[0][1] === 0 && $gare % $input[1][1] ===0) {
        die("$gare");
    }
}