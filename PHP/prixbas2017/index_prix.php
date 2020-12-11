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
   };




/**********************************************************************/
// 2°) 

/**********************************************************************/



/****************  OLIVIER  ******************************************************/

// On évacue la première valeur du tableau qui ne nous intéresse pas
array_shift($input);

// On évacue la deuxième valeur du tableau (qui est devenue la première) et on la conserve dans une variable $search 
// Le nom du produit qu'on recherche
$search = array_shift($input);


/*
// On initialise le prix le plus petit à un nombre très grand pour être certain que le prix du premier produit sera plus petit et prendra sa place
$minPrice = 9999;

foreach ($input as $product) {

    // $product : 'armoire 15'
    list($name, $price) = explode(' ', $product);

    $price = intval($price);

    // Si le produit est celui qu'on cherche et que son prix est plus petit que le plus petit prix trouvé 
    if ($name === $search && $price < $minPrice) {
        $minPrice = $price;
    }
}

echo $minPrice;
*/

/** VERSION 2 **/
/*
$input = array_filter($input, function($product) use ($search) {

    // $product : 'armoire 15'
    list($name, $price) = explode(' ', $product);

    return $name === $search;
});

// Ici on a plus que les produits qui nous intéresse dans le tableau $input 
// function x agit à $input dans les crochets
$input = array_map(function($product) {
    list($name, $price) = explode(' ', $product);
    return intval($price);
}, $input);

echo min($input);
*/

/** VERSION 3 **/
echo array_reduce($input, function($minPrice, $product) use ($search) {
    list($name, $price) = explode(' ', $product);
    $price = intval($price);
    if ($name === $search && $price < $minPrice) {
        return $price;
    }
    return $minPrice;
}, 9999);