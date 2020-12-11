<?php
require '../../../vendor/autoload.php';
/**********************************************************************/
/******************** REPRENDRE POUR CHAQUE EXERCICE ******************/

// Nom du fichier de test - Changer le nom pour changer le fichier testé
const INPUT_FILENAME = 'input3.txt';

// 1°) Lecture du fichier de d'entrée
$input = [];
$file = fopen(INPUT_FILENAME, 'r');
while ($line = fgetcsv($file)) {
    $input[] = $line[0];
}

/**********************************************************************/

$string1 = implode(" ", $input);

$arr2 = explode(" ", $string1);

$lastKey = count($arr2) - 1;

$arr3 = [];
$arr4 = [];

for ($i=0; $i<count($arr2); $i++) {
   // echo $arr2[$i]."<br/>";
    array_push($arr3, $arr2[$i]);
    if ($arr2[$i] !== "" || $arr2[$i] !== " ") {
       // array_push($arr3, $arr2[$i]);
       // echo $arr2[$i]."<br/>";
    }
    if ($arr2[$i] === " " || $arr2[$i] === "" || $arr2[$i] == $arr2[$lastKey]) {
        array_push($arr4, $arr3);
        $arr3 = [];
    }
}

$arr7 = [];
$arr8 = [];

foreach ($arr4 as $row) {
    $string5 = implode(" ", $row);
    $arr6 = explode(" ", $string5);

    for ($i = 0; $i < count($arr6); $i++) {

        $key = substr($arr6[$i], 0, 3);
        $value = substr($arr6[$i], 4);
        //echo "  line ".$i."<br/>";
        $arr7[$key] = $value;
    }
    array_push($arr8, $arr7);
    $arr7 = [];
}

$count = 0;
foreach ($arr8 as $passport) {
    if (
        array_key_exists('byr', $passport)
        && array_key_exists('iyr', $passport)
        && array_key_exists('eyr', $passport)
        && array_key_exists('hgt', $passport)
        && array_key_exists('hcl', $passport)
        && array_key_exists('ecl', $passport)
        && array_key_exists('pid', $passport)
    ) {
        $count++;
        }
}
echo($count);
dd($arr2);
// 203 is too low 

// 206 OK <-- avec 3 tables cassées