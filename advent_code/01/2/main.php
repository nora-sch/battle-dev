<?php
require '../../../vendor/autoload.php';
/**********************************************************************/
/******************** REPRENDRE POUR CHAQUE EXERCICE ******************/

// Nom du fichier de test - Changer le nom pour changer le fichier testé
const INPUT_FILENAME = 'input2.txt';

// 1°) Lecture du fichier de d'entrée
$input = [];
$file = fopen(INPUT_FILENAME, 'r');
while ($line = fgetcsv($file)) {
    $input[] = $line[0];
}

/**********************************************************************/

$sum=2020;
$matched = [];
for ($i = 0; $i < count($input); $i++) {
    for ($j = $i + 1; $j < count($input); $j++) {
        for ($k = $i + 1; $k < count($input); $k++) {
        $check = $input[$i] .",". $input[$j].",". $input[$k];
               if ($input[$i] + $input[$j] + $input[$k]== $sum) {
                
            array_push($matched, $check);
               }
        }
    }
}

$numbers=(explode( ',', $matched[0]));
$result=$numbers[0]*$numbers[1]*$numbers[2];
echo($result);




/*

https://stackoverflow.com/questions/47380628/php-find-a-pair-of-elements-from-an-array-whose-sum-equals-a-given-number/47380723

$input = array (3, 6, -3, 5, -10, 3, 10, 1, 7, -1, -9, -8, 7, 7, -7, -2, -7);
$length = count($input) - 1;
$count = 0;
$matched = array();

for ($i = 0; $i < count($input); $i++) {
  echo "<br />Group ".$i.": <strong>".$input[$i]."</strong>, ";
    $groupmatch = 0;
    $matchon = "";
    for ($j = $i + 1; $j < count($input); $j++) {
        echo $input[$j].", ";
        $check = $input[$i] ."+". $input[$j];
        if ($input[$i] + $input[$j] == 0 && !array_search($check,$matched)) {
            $count++;
            $groupmatch++;
            $matchon .= $check.", ";
            array_push($matched, $check);
        }
    }
  echo "<br />Groupmatch: ".$groupmatch."<br/>";
    echo $matchon."<br />";
}
echo $count;
*/