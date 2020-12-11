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
// PAS FINI!!!!!!
/*
$currentCount=0;
$max=0;

// 2°) 

  foreach ($input as $donnees) {
  $donnees = explode(' ', $donnees); // On récupère un tableau [ '7', '4' ]

  $percent = intval($donnees[0]);
  $years = intval($donnees[1]);


$formule = ($percent*$percent/100);
$croissance=$percent+($percent+$formule).
}  
*/

/**********************************************************************/

/****************  OLIVIER  ******************************************************/

list($pourcentage, $annees) = explode(' ', $input[0]);

// Pour input1.txt on aura $pourcentage = 6 et $annees = 5

$total = 0;

for ($i = 1; $i <= $annees; $i++) {
    $total += $pourcentage + ($total * $pourcentage / 100);
}
// parametre 1 - quoi formatter, 2 - chiffres decimales, 3 - point qui separe nombre decimale (pas virgule) , 4 -  espace divise le partie de milliers 1 , 000 . 50 (pas virgule)
$total = number_format($total, 2, '.', '');

echo $total;