<?php
/**********************************************************************/
/******************** REPRENDRE POUR CHAQUE EXERCICE ******************/

// Nom du fichier de test - Changer le nom pour changer le fichier testé
const INPUT_FILENAME = 'input/input2.txt';

// 1°) Lecture du fichier de d'entrée
$input = [];
$file = fopen(INPUT_FILENAME, 'r');
while($line = fgetcsv($file)){
    $input[] = $line[0];
   };




/**********************************************************************/
// 2°) 
// On évacue la première valeur du tableau et on n'a pas besoin
$nbWords = array_shift($input);

/**********************************************************************/
// code d'Alex
/*
$reponse = [];

foreach($input as $word) {
    if ($word === strrev($word)){
        $reponse[] = $word;
    }
   }; echo(implode('  ', $reponse));
*/


/****************  OLIVIER  ******************************************************/

$palindromes = [];

foreach ($input as $word) {
    if ($word === strrev($word)) {
        $palindromes[] = $word;
    }
}

echo implode(' ', $palindromes);


array_shift($input);

$palindromes = [];

//------------------------------------------------ avec function ---------------
function isPalindrome(string $word) {
    return $word === strrev($word);
}

foreach ($input as $word) {
    if (isPalindrome($word)) {
        $palindromes[] = $word;
    }
}

echo implode(' ', $palindromes);