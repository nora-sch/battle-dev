// Stocker le chemin du fichier d'entrée
const inputFile = "input/input5.txt";

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

/************************************************* */

function ContestResponse() {
  let numeroStart = Number(input[0]);

  input.shift();

  for (let kilometres of input) {
    //console.log(kilometres)
    // mettre dans un tableau
    let [passed, behind] = kilometres.split(" ");
    //ceux qui sont pasées pendant un kilometre courant
    passed = Number(passed);
    //ceux que j'ai passée pendant un kilometre courant
    behind = Number(behind);
    // console.log(passed)

    //variable pour place a la FIN DE chaque kilometre!!! -->  NON, c'est le numeroStart qui change!
    //(pas let place=numeroStart+passed-behind)

    numeroStart += passed - behind;
  }
  console.log(numeroStart);
  if (numeroStart <= 100) {
    console.log(1000);
  } else if (numeroStart < 10000 || numeroStart > 100) {
    console.log(100);
  } else {
    console.log("KO");
  }
}
