// Stocker le chemin du fichier d'entrée
const inputFile = 'input/input1.txt';

// import de la libraire file-system
const fs = require('fs');

// import de la libraire readline et ouvre le fichier d'entrée en lecture
const lineReader = require('readline').createInterface({
    input: fs.createReadStream(inputFile) 
 });

 // Création d'un tableau vide pour stocker le contenu du fichier d'entrée
const input = [];

/**
 * Lorsqu'une ligne du fichier est lue, on la stocke
 * dans une nouvelle case du tableau input - gestion d'évenement
 */
lineReader.on('line', function(line){
    input.push(line);
});
/**
 * et quand on le ferme, on recoit une réponse - gestion d'évenement
 */
lineReader.on('close', function(){
    ContestResponse();
});

/************************************************* */
/*
const cartes={};
let repeatedNumber=1;
function ContestResponse()
{ 

     //On commence  pour enléver le prémiere case du tableau où est le chiffre pas couleur
   input.shift();
 
//console.log(input)

for(index=0; index<=input.length; index++){
   // console.log(input[index-1])
const indexBefore = input[index-1];
const currentCard=input[index];
    let max=0;
   
    if(currentCard==indexBefore){

        repeatedNumber=repeatedNumber+1;
    } else {repeatedNumber=1}

   console.log(repeatedNumber);
}    
} */

function ContestResponse()
{
    // On retire la première case du tableau qui ne nous intéresse pas
    input.shift();
    // On crée une variable max pour stocker la longueur de la plus longue série trouvée
    // On l'initialise à 0
    let max=0;
    // On crée une variable currentCard qui représentera la carte "précédente"
    // On l'initialise à la valeur null (pas de valeur), car au début elle ne peut pas exister avant le carte nr.1
    let currentCard=null;
    // On crée une variable currentCount pour compter la longueur de la série en cours
    // On l'initialise à 0
    let currentCount=0;
    // On parcours le tableau de cartes
    for(const newCard of input){

        // Si la nouvelle carte est différente de la carte courante, une série se termine, une autre démarre
        if(newCard != currentCard){
             // Si la longueur de la série qui vient de se terminer est plus grande que celle de la plus 
            // grande série connue pour l'instant
            if(currentCount > max){
                // Alors cette série devient la plus grande série connue, on met à jour la variable max
                max = currentCount;
            }         
            // Dans tous les cas on démarre une nouvelle série
            // On met à jour la carte courante
            currentCard = newCard;
            // On met à jour la longueur de la série courante
            currentCount = 1;
            // Et on passe au tur de boucle suivant directement
            continue;
         }

        // Si la nouvelle carte est identique à la carte de la série courante
        // On incrémente la longueur de la série courante
        currentCount++;
    }
    // Après avoir parcouru le tableau de carte, c'est comme si une série se terminait

    // Si la longueur de la série qui vient de se terminer est plus grande que celle de la plus 
            // grande série connue pour l'instant
            if(currentCount > max){
                // Alors cette série devient la plus grande série connue, on met à jour la variable max
                max = currentCount;
            }
            // On envoit la réponse
    console.log(max);
       }