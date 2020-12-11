<?php
/**********************************************************************/
/******************** REPRENDRE POUR CHAQUE EXERCICE ******************/

// Nom du fichier de test - Changer le nom pour changer le fichier testé
const INPUT_FILENAME = 'input/input2.txt';

// 1°) Lecture du fichier de d'entrée
$input = [];
$file = fopen(INPUT_FILENAME, 'r');
while($line = fgetcsv($file)){
    $input[] = $line[0];
   };


//COUCOUCOU

/**********************************************************************/
// 2°) 
// On évacue la première valeur du tableau et on le stocke ( c'est nombre de notes)
$nbNotes = array_shift($input);
$average = floor(array_sum($input)/count($input));
echo $average;
/**********************************************************************/



/****************  OLIVIER  ******************************************************/
/**
 * VERSION 1
 * Calculer la moyenne = faire la somme des notes et diviser cette somme par le nombre de notes
 */ 
/*
// Calcul de la somme des notes
$sum = 0;
foreach ($input as $note) {
    $note = intval($note);
    $sum += $note;
}

// Calcul de la moyenne
$moyenne = floor($sum / count($input));

echo $moyenne;*/


/* VERSION 2 
 */
echo floor(array_sum(array_map(function($note){
    return intval($note);
}, $input)) / count($input));