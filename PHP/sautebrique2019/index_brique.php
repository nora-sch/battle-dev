<?php 

/**********************************************************************/
/******************** REPRENDRE POUR CHAQUE EXERCICE ******************/

// Nom du fichier de test - Changer le nom pour changer le fichier testé
const INPUT_FILENAME = 'input/input1.txt';

// Lecture du fichier de d'entrée
$input = [];
$file = fopen(INPUT_FILENAME, 'r');
while($line = fgetcsv($file)){
    $input[] = $line[0];
}

//-----------------------------------------------
$nbCases = array_shift($input);
/* NE MARCHE PAS  -------------------------------- à corriger----------------------------------------
$previous = 'B';  // Au départ on dit qu'on est sur de la terre puisque la terre n'a pas d'incidence, ce sont les fossés qu'on compte
$currentCount = 0; // Longueur du fossé dans lequel on se trouve 
$maxLength = 0; // Longueur du plus grand fossé trouvé jusqu'à présent

foreach ($input as $case) {
    /*

  
    // on était sur la terre et on arrive dans un trou
    if ($previous === 'B' && $case === 'X') {
        if($currentCount)
        $maxLength = $currentCount;
        //$currentCount = 0;
        //$previous = 'X';
        continue; // "Passe au tour de boucle suivant"
    }

    $currentCount++;
}

// On fait attention si on termine par un fossé, il faut prendre en compte ce dernier fossé
if ($currentCount > $maxLength) {
    $maxLength = $currentCount;
}

echo $maxLength ;
*/
/****************  OLIVIER  ******************************************************/

$current = -1;
$max = 0;

foreach ($input as $case) {
    if ($case == 'B') {
        $current++;
        continue;
    }

    // $case == 'X'
    $max = max($max, $current);
    //pour repartir à -1 la prochaine fois quand on arrive sur B
    $current = -1;
}

echo max($max, $current);