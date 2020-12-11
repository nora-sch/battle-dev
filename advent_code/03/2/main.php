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

function getResult($steps, $moves, $shifts, $array)
{
    $landscapeArray = [];
    $objectArray = [];
    $tree = '#';
    $square = '.';
    $tourn = 0;


    //array_shift($array);
    array_splice($array,0,$shifts);

    foreach ($array as $row) {
        array_push($landscapeArray, str_repeat($row, (count($array))));
    }
//dd($landscapeArray);

    foreach ($landscapeArray as $row) {
    
        //  dd($landscapeArray);
        $tourn++;
 
        if ($shifts == 2) {
            if ($tourn % 2) {
                if ($row[$steps] == $tree) {
                 
                    array_push($objectArray, 'X');
                }
                if ($row[$steps] == $square) {
                    array_push($objectArray, 'O');
                }
                $steps = $steps + $moves;
            }
        } else {
          
            if ($row[$steps] == $tree) {
                             array_push($objectArray, 'X');
            }
            if ($row[$steps] == $square) {
                array_push($objectArray, 'O');
            }
            $steps = $steps + $moves;
        }
    }


    $counted = array_flip(array_count_values($objectArray));

    $needle = 'X';
    foreach ($counted as $key => $value) {
        $current_key = $key;
        if ($needle === $value) {
            return $current_key;
        }
    }
}

$resultTable = [];

//Right 1, down 1.
array_push($resultTable, getResult(1, 1, 1, $input));
//Right 3, down 1.
array_push($resultTable, getResult(3, 3,  1, $input));
//Right 5, down 1.
array_push($resultTable, getResult(5, 5,  1, $input));
//Right 7, down 1.
array_push($resultTable, getResult(7, 7,  1, $input));
//Right 1, down 2.
array_push($resultTable, getResult(1, 1, 2, $input));
$value = 1;

foreach ($resultTable as $result) {

    $value = $result * $value;
}
echo $value;
//dd($resultTable);
//input-2 336 ok
//input-1 1438223688 too high
//          958815792