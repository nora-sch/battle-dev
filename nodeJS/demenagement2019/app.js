// Stocker le chemin du fichier d'entrée
const inputFile = "input/input1.txt";

// import de la libraire file-system
const fs = require("fs");

// import de la libraire readline et ouvre le fichier d'entrée en lecture
const lineReader = require("readline").createInterface({
  input: fs.createReadStream(inputFile),
});

// Création d'un tableau vide pour stocker le contenu du fichier d'entrée
const input = [];

/**
 * Lorsqu'une ligne du fichier est lue, on la stocke
 * dans une nouvelle case du tableau input - gestion d'évenement
 */
lineReader.on("line", function (line) {
  input.push(line);
});
/**
 * et quand on le ferme, on recoit une réponse - gestion d'évenement
 */
lineReader.on("close", function () {
  ContestResponse();
});

/*************************************************************************/
/*ne marche pas PAS FINI-------------------------------------------------------------------------------------

function ContestResponse() {
  //On commence  pour enléver le prémieres cases 
  let nbPacks = Number(input.shift());
  
  //On défine le variable max pour y mettre le total aller-retour
  let maxWeight=[];
  let moves =0;
    
 // function sum(arr) { return arr.reduce((a,b) => a + b, 0); }
// let sum = input.reduce(((sumTemp, weightPack) => sumTemp + weightPack), 0);
 //console.log(sum);

  //Le boucle pour parcourir le tableau ou chaque ligne d'input est poids du colis
  for (weightPack of input) {
    weightPack=Number(weightPack);
  //  console.log(weightPack);

if(sum<100){
  maxWeight.unshift(weightPack);
}else { maxWeight.shift(weightPack);}
console.log(weightPack);
    }
//  console.log();
}
*/
// ---------------- OLIVIER ----------------------------


const sum = array => array.reduce((sumTemp, currentNumber) => sumTemp + currentNumber, 0);
function ContestResponse()
{
    input.shift();

    let allersRetours = 0;
    let monteCharge = [];

    // Pour chaque carton...
    for (const poidsCarton of input.map(Number)) {

        // Si le poids du monte-charge + poids du nouveau est <= 100
        if (sum(monteCharge) + poidsCarton <= 100) {

            // Alors on ajoute le nouveau carton
            monteCharge.push(poidsCarton);
            continue;
        }

        // Ici la limite des 100 kgs est dépassée avec le nouveau carton
        allersRetours++; // On compte un aller-retour supplémentaire
        monteCharge = []; // Le monte-charge revient vide
        monteCharge = [poidsCarton]; // On pose le nouveau carton sur le monte-charge
    }

    allersRetours++;

    console.log(allersRetours);
}


/*
function ContestResponse()
{
    input.shift();

    let allersRetours = 0;
    let monteCharge = 0;

    // Pour chaque carton...
    for (const poidsCarton of input.map(Number)) {

        // Si le poids du monte-charge + poids du nouveau est <= 100
        if (monteCharge + poidsCarton <= 100) {

            // Alors on ajoute le nouveau carton
            monteCharge += poidsCarton;
            continue;
        }

        // Ici la limite des 100 kgs est dépassée avec le nouveau carton
        allersRetours++; // On compte un aller-retour supplémentaire
        monteCharge = poidsCarton; // On pose le nouveau carton sur le monte-charge
    }

    allersRetours++;

    console.log(allersRetours);
}*/