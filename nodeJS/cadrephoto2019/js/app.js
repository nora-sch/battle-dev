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
let minSize = 9999;
function ContestResponse()
{
    for(const planche of input){

        //console.log(planche)

        if (planche < minSize) {
            minSize = planche;
          }

     console.log(minSize)          }
                   }
*/
/*
// fonction d'Olivier
function ContestResponse()
{
    // On récupère la taille du plus petit morceau
    const squareSize = Math.min(...input);

    // On stockera ici la somme des chutes, au départ 0
    let garbageSize = 0;

    // On parcours les 4 planches
    for(const size of input){

        // Pour chaque planche on ajoute au total des chutes ce qu'on doit couper pour cette planche-là
        garbageSize += size - squareSize;
    }

    // On envoie la réponse
    console.log(garbageSize);
    
}
    */

/*
// fonction de Vincent
function ContestResponse() {
    let valeurMinimale = 1001;
    let boisjeter = 0;
    for (let i = 0; i <input.length ; i++){
        if (input[i] < valeurMinimale) {
            valeurMinimale = +input[i]; 
        }
    }
    for(let index = 0; index<input.length; index++) {
        const longueur = +input[index];
        boisjeter += longueur - valeurMinimale;
    }
    console.log(boisjeter);
}
*/

// fonction de Baptiste
function ContestResponse(){

    //On identifie la plus petite planche et on la range en index 0 du tableau
    input.sort(function(plank1, plank2){return plank1-plank2;
    });

    let total = 0;

    // On doit retirer le plus petit nombre a chaque entrée et garder le résultat

for (let index=0; index < input.length; index++){
    let reduce = input[index]-input[0];
    //on doit additionner les résultats
    total=total+reduce;
}
console.log(total);

}