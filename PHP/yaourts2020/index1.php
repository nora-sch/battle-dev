<?php
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
/*
// Ouverture du fichier, visualisation en tableau

$inputs=file("input/input1.txt");
foreach ($inputs AS $input){
    echo ("<pre> $input </pre>");
}
*/
/**********************************************************************/
// 2°) Compter le nombre de votes pour chaque couleur
// enléve le prémier ligne
$removed=array_shift($input);
// compter des values d' array dans un tableau associatif où coleur est un key et valeur nombre de fois elle repéte
$colors=array_count_values($input);

/**********************************************************************/
// 3°) Trier les votes pour récupérer les 2 couleurs qui arrivent en tête
//on les mets dans un variable qui va montrer un array des coleurs (automatique descendant?)
$counted=array_keys($colors);
echo($counted[0]." ".$counted[1]);

// On ne garde que les 2 premières couleurs
$colors= array_slice($colors, 0, 2);
// à continuer!!!!!


/****************  OLIVIER  ******************************************************/
/*
// On supprimer la première case qui est inutile
array_shift($input);

// On crée un tableau vide pour compter les couleurs
$colorCount = [];

// On parcours le tableau d'entrée $input
foreach($input as $color){

    // Si la clé qui correspond à la couleur courante n'existe pas...
    if(!array_key_exists($color, $colorCount)){

        // On crée une case dans le tableau avec cette clé et on stocke la valeur 0
        $colorCount[$color] = 0;
    }

    // On incrémente le nombre de votes pour cette couleur
    $colorCount[$color]++;
}


 // Altenative à la boucle foreach() pour compter les couleurs : la fonction 
 
 // $colorCount = array_count_values($input);
 
// Tri du tableau par ordre décroissant pour avoir les couleurs avec le plus de votes en premier
arsort($colorCount);

// On ne garde que les 2 premières couleurs
$colorCount = array_slice($colorCount, 0, 2);

// On récupère les clés (le nom des couleurs)
$colors = array_keys($colorCount);


 //Faire un echo du résultat demandé
 
echo implode(' ', $colors); 
*/

