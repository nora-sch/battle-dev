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

/************************************************* */
let currentCount = 0;
let currentRow = 0;
let min = 0;

function ContestResponse() {
  // On retire la première case du tableau qui ne nous intéresse pas
  input.shift();

  let looserName = null;
  let looserSize = 9999;

  // separer le prénom et longeur du paille dans un tableau

  for (const person of input) {
    /*
     tab=person.split(" ",2);
     //console.log(tab); 
     // person est maintenant un tableau : ["prenom", "longeur"]
     let longeur = (tab[1]);  
    //console.log(longeur)
    let prenom=(tab[0])
    // console.log(prenom)
*/
    // Alternative avec la "destructuration" de tableau
    let [name, size] = person.split(" ");
    //console.log(size)

    size = Number(size);
    // ou size = parseInt(size);
    // ou size = +size; pour conventir le size de string à number

    if (size < looserSize) {
      looserName = name;
      looserSize = size;
    }
  }
  console.log(looserName);
}
