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
/**********************************************************************/

$lReservoir = array_shift($input);
$lPar100Km = array_shift($input);

$capacite = 100 / $lPar100Km * $lReservoir;
$pointDepart = 0;

foreach ($input as $station) {
    $kmStation = $station - $pointDepart;
    if ($capacite >=  $kmStation) {
        $pointDepart = $station;
        if ($pointDepart == $input[3]) {
            echo ('OK');
        }
    } else if ($capacite <= $station) {
        echo ('KO');
        exit;
    };
}



//-----------------------------------code de MARIO--------------------

$lReservoir = intval(array_shift($input));
$lPar100Km = intval(array_shift($input));

$capacite = intval(($lReservoir*100)/$lPar100Km);
$pointDepart = 0;

foreach ($input as $station) {
       if ($capacite >=  $station - $pointDepart) {
        $pointDepart = $station;
        $statut='OK';
        }
     else  {$statut= ('KO');
    };
      
    }
echo $statut;

//-----------------------------------code d'OLIVIER--------------------

define('RESERVOIR', array_shift($input));
define('CONSO_100_KM', array_shift($input));
define('AUTONOMIE', intval(RESERVOIR / CONSO_100_KM * 100));

$kmDone = 0;

foreach ($input as $kmFromStart) {
    $kmCurrentStep = $kmFromStart - $kmDone;
    if ($kmCurrentStep >  AUTONOMIE) {
        die('KO');
    }
    // on ajoute notre km parcourous
    $kmDone += $kmCurrentStep;
}

echo 'OK';
