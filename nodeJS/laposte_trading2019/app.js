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

function ContestResponse() {
  //On commence  pour enléver le prémiere case du tableau qui est des nombres d'enchéres
  let myMoney = Number(input.shift());

  //Le deuxieme case est le prix de matin et soir
  let nbStocks = Number(input.shift());
  //On défine le variable max pour y mettre le max montant gagné
  let max = 0;
  let sum = 0;

  //Le boucle pour parcourir le tableau ou chaque ligne d'input est prix du matin et soir
  for (purchasePrice of input) {
    //.map(Number) permet ajouter "Number" pour chaque element du tableau
    let [priceMorning, priceEvening] = purchasePrice.split(" ").map(Number);
    
   // priceMorning = Number(priceMorning);
   // priceEvening = Number(priceEvening);

    if (priceMorning < priceEvening && priceMorning <= myMoney) {
      sum = priceEvening - priceMorning;
    }
  
    if (sum>max){
      max=sum;
    }
  
     }
  //bestPrice = Math.max(sum);
 // console.log(bestPrice);
  console.log(max)
  
}
// ---------------- OLIVIER ----------------------------
/*
function ContestResponse()
{
    const budget = Number(input.shift());
    input.shift();

    let max = 0;

    for (const action of input) {
        const [prixMatin, prixSoir] = action.split(' ').map(Number);
        if (prixMatin > budget) {
            continue;
        }
        const gain = prixSoir - prixMatin;
        if (gain > max) {
            max = gain;
        }
    }
    console.log(max);
}
*/