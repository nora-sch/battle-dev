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

// enléve le prémier ligne
$removed=array_shift($input);

// On crée une variable max pour stocker la longueur de la plus longue série trouvée
    // On l'initialise à 0
    $max=0;
    // On crée une variable currentCard qui représentera la carte "précédente"
    // On l'initialise à la valeur null (pas de valeur), car au début elle ne peut pas exister avant le carte nr.1
   $currentCard=null;
    // On crée une variable currentCount pour compter la longueur de la série en cours
    // On l'initialise à 0
  $currentCount=0;
    // On parcours le tableau de cartes
    foreach($input AS $newCard){

        // Si la nouvelle carte est différente de la carte courante, une série se termine, une autre démarre
        if($newCard != $currentCard){
             // Si la longueur de la série qui vient de se terminer est plus grande que celle de la plus 
            // grande série connue pour l'instant
            if($currentCount > $max){
                // Alors cette série devient la plus grande série connue, on met à jour la variable max
                $max = $currentCount;
            }         
            // Dans tous les cas on démarre une nouvelle série
            // On met à jour la carte courante
            $currentCard = $newCard;
            // On met à jour la longueur de la série courante
            $currentCount = 1;
            // Et on passe au tur de boucle suivant directement
            continue;
         }

        // Si la nouvelle carte est identique à la carte de la série courante
        // On incrémente la longueur de la série courante
        $currentCount++;
    }
   
    // Après avoir parcouru le tableau de carte, c'est comme si une série se terminait

    // Si la longueur de la série qui vient de se terminer est plus grande que celle de la plus 
            // grande série connue pour l'instant
            if($currentCount > $max){
                // Alors cette série devient la plus grande série connue, on met à jour la variable max
                $max = $currentCount;
            }
            // On envoit la réponse
    echo($max);
        