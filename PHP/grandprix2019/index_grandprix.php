<?php
require '../../vendor/autoload.php';
/**********************************************************************/
/******************** REPRENDRE POUR CHAQUE EXERCICE ******************/

// Nom du fichier de test - Changer le nom pour changer le fichier testé
const INPUT_FILENAME = 'input/input4.txt';
//coucou
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
/*------------------------------------------------------------------------------PAS BON CODE!!!!!-----------------------------------------------
$myPilot = intval(array_shift($input));
$nbEvents = array_shift($input);
$myPlace = $myPilot;

foreach ($input as $event) {
    [$pilot, $action] = explode(' ', $event);

    $placePilot = $pilot;

    switch ($action) {
        case 'D':
            if ($pilot > $myPilot) {
                $placePilot = $placePilot - 1;
                $myPlace = $myPlace;
            } else if ($pilot < $myPilot) {
                $placePilot = $placePilot - 1;
                $myPlace = $myPlace;
            } else if ($pilot == $myPilot) {
                $myPlace = $myPlace - 1;
            }
            break;

        case 'I':
            if ($pilot > $myPilot) {
                $placePilot = 'KO';
                $myPlace = $myPlace;
            } else if ($pilot < $myPilot) {
                $placePilot = 'KO';
                $myPlace = $myPlace - 1;
            } else if ($pilot == $myPilot) {
                $myPlace = 'KO';
            }
            break;
    }
}
echo ($myPlace);

//-----------------------------------code d'OLIVIER--------------------
******************************************************************/
//VERSION 1 : clé = pilotes / valeurs = positions

$piloteFavori = array_shift($input);

array_shift($input);

// Création du tableau de classement de départ
$classement = array_combine(range(1, 20), range(1, 20));


 // [
 //  "1" => 1,
 //  "2" => 2,
 //  "3" => 3,
//  etc.
// ] 


 foreach ($input as $event) {
    list($pilote, $type) = explode(' ', $event);
    switch ($type) {
        case 'D':
            $positionDevant = $classement[$pilote] - 1;
            $piloteQuiPerdUnePlace = array_search($positionDevant, $classement);
            $classement[$pilote]--;
            $classement[$piloteQuiPerdUnePlace]++;
            break;

        case 'I':
            if ($piloteFavori == $pilote) {
                die("KO");
            }
            foreach ($classement as $piloteCourant => $position) {
                if ($position > $classement[$pilote]) {
                    $classement[$piloteCourant]--;
                  
                }
            }
            unset($classement[$pilote]);
            break;
    }
 }

 echo $classement[$piloteFavori];


 //----------------------------------------------------------------------------
 //VERSION 2 : clés = positions / valeurs = pilotes
$piloteFavori = array_shift($input);

array_shift($input);

// Création du tableau de classement de départ
$classement = array_combine(range(1, 20), range(1, 20));

 // [
 //  "1" => 1,
 //  "2" => 2,
 //  "3" => 3,
//  etc.
// ] 

 
foreach ($input as $event) {
    list($pilote, $type) = explode(' ', $event);
    // On récupère la position du pilote qui a fait l'événement
    $index = array_search($pilote, $classement); 
    switch ($type) {
        case 'D':
            $classement[$index] = $classement[$index - 1];
            $classement[$index - 1] = $pilote;
            break;

        case 'I':
            if ($piloteFavori == $pilote) {
                die("KO");
            }
            // On supprime la case du pilote qui a abandonné en mettant à jour les indices du tableau grâce à array_splice
            array_splice($classement, $index, 1);
            break;
    }

}

echo array_search($piloteFavori, $classement);