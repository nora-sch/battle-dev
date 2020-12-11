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

function ContestResponse() {
  let mesNotes = input.shift();
  mesNotesTable = mesNotes.split(" ").map(Number);
  let N = input.shift(); // tous les amis
  let K = input.shift(); // meilleurs copains
  let notesAmis = input; 
  let notesAmisTable = [];
  let distance = [];

  for (let notes of notesAmis) {
    note = notes.split(" ");
    notesAmisTable.push(note);
  }

  for (let i = 0; i < N; i++) {
    let diffTable = [];

    for (let j = 0; j < 5; j++) {
      let oneNote = Math.abs(notesAmisTable[i][j] - mesNotesTable[j]);
      diffTable.push(oneNote);
    }

    let sumAmis = diffTable.reduce(function (a, b) {
      return a + b;
    });

    distance.push({
      distance: sumAmis,
      indice: i,
    });
  }

  let sorted = distance.sort(function (a, b) {
    return a.distance - b.distance;
  });

  let meilleursAmis = sorted.slice(0, K);
  meilleursAmis = meilleursAmis.map((item) => item.indice);

  let reponse = 0;

  for (const index of meilleursAmis) {
    reponse += parseInt(notesAmisTable[index][5]) / K;
  }

  reponse = Math.floor(reponse);
  console.log(reponse);
}
