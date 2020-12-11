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
// 2°) 
/*
// enléve le prémier ligne
$tours = array_shift($input);


foreach ($input as $tour){
 
    $result=explode(" ",$tour); 
      
       $A=$result[0];
       $B=$result[1];

           dump($A);
};
*/

/****************  OLIVIER  ******************************************************/

// On se débarasse de la première case du tableau d'entrée 
array_shift($input);

$pointsA = 0;
$pointsB = 0;

// On parcours le tableau d'entrée
foreach ($input as $battle) {

    // $battle représente la case courante du tableau $input : '7 4'
    $cards = explode(' ', $battle); // On récupère un tableau [ '7', '4' ]

    $cardA = intval($cards[0]);
    $cardB = intval($cards[1]);

    // On pourrait faire tout ça en seule ligne avec list()
    // list($cardA, $cardB) = explode(' ', $battle); 

    // On compare les cartes des joueurs pour ce tour
    if ($cardA > $cardB) {
        $pointsA++;   
    } elseif ($cardB > $cardA) {
        $pointsB++;
    }
}

if ($pointsA > $pointsB) {
    echo 'A';
} else {
    echo 'B';
}