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

  const [minLat, minLong, maxLat, maxLong] = input.shift().split(' ').map(Number);
 let nbPersonnes= input.shift();
  let count = 0;

  for (let coords of input) {
let [latPers, longPers]=coords.split(' ').map(Number);
     

      if (latPers >= minLat && latPers <= maxLat && longPers >= minLong && longPers <= maxLong) {
          count++;
      }
  }
  console.log(count);

}
//--------------- OLIVIER ----------------------------

function ContestResponse()
{
    const [from_lat, from_lng, to_lat, to_lng] = input.shift().split(' ').map(Number);

    input.shift();

    let n = 0;

    for (const [latitude, longitude] of input.map(coords => coords.split(' ').map(Number))) {
        if (latitude >= from_lat && latitude <= to_lat && longitude >= from_lng && longitude <= to_lng) {
            n++;
        }
    }

    console.log(n);
}

