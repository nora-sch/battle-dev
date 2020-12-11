// Stocker le chemin du fichier d'entrée
const inputFile = "input/input2.txt";

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
  let nbAuctions = input.shift();
  //Le deuxieme case est le prix de base
  let bidPrice = Number(input.shift());
  //On défine le variable max pour y mettre le max prix d'acheteur
  let max = 0;
  //On défine la variable de gagnant
  let winner;
  //Le boucle pour parcourir tous les prix et acheteurs ou auction est chaque ligne d'input
  for (auction of input) {
      //On cree un tableau où on coupe les lignes et on sépare le prix de acheteur
    let [price, biddersName] = auction.split(" ");
    price = Number(price);
//Si le prix est plus elévé que variable max - on le define comme max et on récupére le nom d'acheteur sous la variable winner
    if (max < price) {
      max = price;
      winner = biddersName;
    }
  }
  //Résultats -si le max est moin bas que prix début, il n y a pas de gagneur, si le max est plus elevé, on visualise le nom d'acheteur (gagnant)
  if (max <= bidPrice) {
    console.log("KO");
  } else {
    console.log(winner);
  }
}
