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

//dd(count($input));
//dd(strlen($input[0]));
//dd((count($input))/(strlen($input[0])));

$tree = '#';
$square = '.';
$steps = 3;
$landscapeArray = [];
$objectArray = [];

array_shift($input);

foreach ($input as $row) {
    array_push($landscapeArray, str_repeat($row, (count($input))));
}

foreach ($landscapeArray as $row) {
      if ($row[$steps] == $tree) {
        array_push($objectArray, 'X');
    }
    if ($row[$steps] == $square) {
        array_push($objectArray, 'O');
    }
    $steps = $steps + 3;
}


$counted = array_flip(array_count_values($objectArray));

$needle = 'X';
foreach ($counted as $key => $value) {
    $current_key = $key;
    if ($needle === $value) {
        echo $current_key;
    }
}
