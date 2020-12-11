<?php
require '../../../vendor/autoload.php';
/**********************************************************************/
/******************** REPRENDRE POUR CHAQUE EXERCICE ******************/

// Nom du fichier de test - Changer le nom pour changer le fichier testé
const INPUT_FILENAME = 'input.txt';

// 1°) Lecture du fichier de d'entrée
$input = [];
$file = fopen(INPUT_FILENAME, 'r');
while ($line = fgetcsv($file)) {
    $input[] = $line[0];
}

/**********************************************************************/
$tour = 0;
$array = [];

foreach ($input as $entry) {
    $tour++;
    $entry = (explode(" ", $entry));
    $numbers = explode("-", $entry[0]);
    $position1 = $numbers[0];
    $position2 = $numbers[1];
    $letter = str_replace(':', '', $entry[1]);;
    $password = $entry[2];

    $passwordLetterArray = str_split($password);
    $keys = array_keys($passwordLetterArray);
    $count = 0;
    foreach ($passwordLetterArray as $key => $val) {
        // Here $val is also array like ["Hello World 1 A","Hello World 1 B"], and so on
        // And $key is index of $array array (ie,. 0, 1, ....)

        if ($key + 1 == $position1 || $key + 1 == $position2) {

               if ($val == $letter) {

              //  echo $key + 1 . '=' . $val . ' need ' . $letter . ' in ' . $tour . '<br />';
                array_push($array, $tour);
            }
        }
    }
}

$counted=array_count_values($array);
foreach($counted as $one){
    if($one==1){
$count++;
    }
}

dd($count);
