<?php

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
$moves = array_shift($input);

// On crée une variable max pour stocker la longueur de la plus longue série trouvée
// On l'initialise à 0
$max = 0;

$step = $input[0];

//on coupe le string et le met dans un array avec loop
$res = $step[0];


for ($currentStep = 0; $currentStep < $moves; $currentStep++) {

    $sameChar = 1;

    for ($nextStep = $currentStep + 1; $nextStep < $moves; $nextStep++) {
        if ($step[$currentStep] != $step[$nextStep])
            break;
        $sameChar++;
    }

    if ($sameChar > $max) {
        $max = $sameChar+1;
        $res = $step[$currentStep];
    }

}

echo($max); */

/****************  OLIVIER  ******************************************************/


$cases = $input[1]; // '-___-' 

$cases = str_split($cases); // [ '-', '_', '_', '_', '-' ]

$previous = '-';  // Au départ on dit qu'on est sur de la terre puisque la terre n'a pas d'incidence, ce sont les fossés qu'on compte
$currentCount = 0; // Longueur du fossé dans lequel on se trouve 
$maxLength = 0; // Longueur du plus grand fossé trouvé jusqu'à présent

foreach ($cases as $case) {

    // 1er cas : on était sur une plate-forme (terre) et on arrive dans un trou
    if ($previous === '-' && $case === '_') {
        $currentCount = 1;
        $previous = '_';
        continue; // "Passe au tour de boucle suivant"
    }

    // 2ème cas : on était dans trou et on reste dans un trou
    if ($previous === '_' && $case === '_') {
        $currentCount++;
        continue;
    }

    // 3ème cas : on était dans un fossé et on arrive sur une plate-forme (terre)
    if ($previous === '_' && $case === '-') {
        if ($currentCount > $maxLength) {
            $maxLength = $currentCount;
        }
        $previous = '-';
    }
}

// On fait attention si on termine par un fossé, il faut prendre en compte ce dernier fossé
if ($currentCount > $maxLength) {
    $maxLength = $currentCount;
}

echo $maxLength + 1;