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

$nbWords = array_shift($input);
$valeurs = array_shift($input);
$valeurs = explode(" ", $valeurs);
$alphabet = range('A', 'Z');
$scoreTable = array_combine($alphabet, $valeurs);
dump($scoreTable);
$scores=[];
foreach ($input as $words) {
     dump($words);
    $lettres = str_split($words);
    $wordValue = 0;
    foreach ($lettres as $lettre) {
        $wordValue += $scoreTable[$lettre];
          }
    $scores[$words] = $wordValue;
    dump($wordValue);
}

 // On récupère maintenant le meilleur score
 $bestScore = max($scores); // 13

 $winners = [];

 foreach ($scores as $words => $wordValue) {
     if ($wordValue == $bestScore) {
         $winners[] = $words;
     }
 }

 $minLength = min(array_map(function($words){
     return strlen($words);
 }, $winners));

 echo $bestScore . ' ' . $minLength;


/**********************************************************************/

/****************  OLIVIER  ******************************************************/
/*
// Pas besoin du nombre de mots
array_shift($input);

// On récupère le tableau de points associés aux lettres
$points = explode(' ', array_shift($input)); // ['1', '3', '3', '2', '1', etc... ]

// On crée un tableau avec toutes les lettres de l'alphabet
$alphabet = range('A', 'Z');

// On crée un tableau en associant les 2 : les lettres de l'alphabet en clés, leurs points en valeurs
define('POINTS', array_combine($alphabet, $points));


 // [
 //    'A' => 1,
 //     'B' => 3,
 //    'C' => 3,
 //     'D' => 2,
 //     'E' => 1,
 // ]
 //

$scores = [];


foreach ($input as $mot) {
    $scoreMot = 0;
    foreach(str_split($mot) as $lettre) {
        $scoreMot += POINTS[$lettre];
    }
    $scores[$mot] = $scoreMot;
}


foreach ($input as $mot) {
    $scores[$mot] = array_sum(array_map(function($lettre) {
        return POINTS[$lettre];
    }, str_split($mot)));
}

//
 // [
 //     "VOITURE" => 10,
 //      "CLAVIERS" => 13,
 //      "CAR" => 5,
 //      "MOTO" => 5,
 //     "BUS" => 5,
 //      "KART" => 13
 // ]
 //

 // On récupère maintenant le meilleur score
 $bestScore = max($scores); // 13

 $winners = [];

 // On construit un tableau avec uniquement les mots qui ont le meilleur score
 foreach ($scores as $mot => $scoreMot) {
     if ($scoreMot == $bestScore) {
         $winners[] = $mot;
     }
 }

 // On récupère la plus petite longueur parmis ces mots
 $minLength = min(array_map(function($mot){
     return strlen($mot);
 }, $winners));

 echo $bestScore . ' ' . $minLength;
 */