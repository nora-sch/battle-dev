<?php
require '../../vendor/autoload.php';
/**********************************************************************/
/******************** REPRENDRE POUR CHAQUE EXERCICE ******************/

// Nom du fichier de test - Changer le nom pour changer le fichier testé
const INPUT_FILENAME = 'input/input1.txt';

// 1°) Lecture du fichier de d'entrée
$input = [];
$file = fopen(INPUT_FILENAME, 'r');
while($line = fgetcsv($file)){
    $input[] = $line[0];
   }

   //-------------------------------------------------

   // ------------enléve le prémier ligne
$removed=array_shift($input);
//--------------des notes du chaque restaurant dans un tableau - dans chaque ligne un restaurant avec ses 3 notes
foreach($input as $restaurant){
    // ------------on divise des notes de chaque restaurant dans son propre tableau et chaque note est dans sa ligne
    $notes= explode(" ",$restaurant);
   // print_r($notes);
   // -------------nombre de notes
   $noteTypes=count($notes);
   //print_r($noteTypes);
   // ------------ sum de notes pour chaque restaurant
$notesSum=(array_sum($notes));
//dump($notesSum);
// ---------moyen de la somme arrondi à l'haut (ceil)
$noteMoyenne=ceil(($notesSum/$noteTypes));
//dump($noteMoyenne);
// ---------- on stock le resultat dans un tableau !!!!!!!!!!!!!
$tableauMoyens[]=$noteMoyenne;
//dump ($tableauMoyens);
}
//----------- on trouve montant maximal dans ce tableau
$max=max($tableauMoyens);
echo ($max);