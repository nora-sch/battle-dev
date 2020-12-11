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
  //On commence  pour enléver le prémieres cases
  let prixPersonne = Number(input.shift());
  let nbTables = Number(input.shift());

  //On défine le variable max pour y mettre le total income
  
  let income = 0;

  //Le boucle pour parcourir le tableau ou chaque ligne d'input est nombre de personnes par table
  for (persTable of input) {
    persTable = Number(persTable);
    // reduced price-------------------
    if (persTable < 4) {
      prixReduit = prixPersonne;
      //console.log(prixReduit)
    } else if (persTable >= 4 && persTable < 6) {
      prixReduit = prixPersonne - (prixPersonne / 100) * 10;
      //  console.log(prixReduit)
    } else if (persTable >= 6 && persTable < 10) {
      prixReduit = prixPersonne - (prixPersonne / 100) * 20;
      //   console.log(prixReduit)
    } else if (persTable >= 10) {
      prixReduit = prixPersonne - (prixPersonne / 100) * 30;
      // console.log(prixReduit)
    }
    let soldeTable = prixReduit * persTable;
    income += soldeTable;
  }
  console.log(Math.ceil(income));
}
// ---------------- OLIVIER ----------------------------
/*
function ContestResponse()
{
    const ppp = Number(input.shift());

    input.shift();

    let recette = 0;

    for (const n of input) {
        
        // n est le nombre de client à chacune des table
        let note = n * ppp;

        if (n >= 10) { // Table de plus de 10 personnes : 30% de réduction
            note *= 0.7; // On multiplie la note par 70%
        }
        else if (n >= 6) { // Table de plus de 10 personnes : 20% de réduction
            note *= 0.8; // On multiplie la note par 80%
        } 
        else if (n >= 4) { // Table de plus de 10 personnes : 10% de réduction
            note *= 0.9; // On multiplie la note par 90%
        }

        recette += note;
    }

    console.log(Math.ceil(recette));
}
*/