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
/* NON UTILISABLE
function ContestResponse() {
  //On commence  pour enléver le prémiere case du tableau qui est des nombres d'enchéres
  let nbRestaurants = Number(input.shift());

  //On défine le variable max pour y mettre le max montant gagné
  let max = 0;
 // let sum = 0;
  let restaurant=[];
  
  //Le boucle pour parcourir le tableau ou chaque ligne d'input est prix du matin et soir
  for (restaurant of input) {
    //restaurant=[restaurant];
    console.log(restaurant);
 let arrSum= function(restaurant){
   return restaurant.reduce(function(a,b){
     return a=b}, 0);
   }
   console.log(arrSum);
 }
   
  }
  */

// ---------------- OLIVIER ----------------------------

// const average = arr => arr.reduce((a, b) => a + b, 0) / arr.length;

function average(array) {
  /*
  let sum = 0;
  for (const element of array) {
      sum += element;
  }
  */
 // avec array.reduce() ------------------->
 // let sum = array.reduce((sumTemp, element) => (sumTemp + element), 0)
//  return sum / array.length;
return array.reduce((sumTemp, element) => sumTemp + element) / array.length;
}

/*
function ContestResponse()
{
  input.shift();

  // max stocke la plus grande moyenne trouvée jusqu'à maintenant
  let max = 0;

  for (let notes of input) {
      // notes : '12 14 11'
      notes = notes.split(' ').map(Number);
      // notes : [12, 14, 11]
      const avg = Math.ceil(average(notes)); // Calcul de la moyenne arrondie à l'entier supérieur
      if (avg > max) {
          max = avg;
      }
  }

  console.log(max);
}

// VERSION 2 : avec la méthode reduce()
function ContestResponse()
{
    input.shift();

    const max = input.reduce( (maxTemp, notes) => {
        // Cette fonction doit retourner le nouveau résultat temporaire, en fonction de la valeur courante
        notes = notes.split(' ').map(Number);
        const avg = Math.ceil(average(notes));  
                if (avg > maxTemp) {
         // console.log('NEW : ' + avg)
            return avg; // avg devient le nouveau maxTemp
        }
    
        return maxTemp;
       
    }, 0);
    console.log(max);
}
*/

// VERSION 3 : avec la méthode map()
function ContestResponse()
{
    input.shift();

    const max = Math.max(...input.map(notes => Math.ceil(average(notes.split(' ').map(Number)))));

    console.log(max);
}

