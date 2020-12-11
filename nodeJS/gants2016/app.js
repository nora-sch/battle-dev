// Stocker le chemin du fichier d'entrée
const inputFile = "input/input3.txt";

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
/*
function ContestResponse() {
 
  let nbGants = Number(input.shift());


  // creation d'un OBJECT
 const gants = {};

  //Le boucle pour parcourir le tableau ou chaque ligne d'input est un color de gant
  for (const color of input) {
    // Si l'objet gants ne contient pas la propriété dont le nom est stocké dans la variable color
    if (!gants.hasOwnProperty(color)){
      // Alors on initialise une propriété en rangeant la valeur 0 dedans
     gants[color] = 0;
        } 
         // Dans tous les cas, on incrémente le nombre de gants pour cette couleur
    gants[color]++;
     
}
 // On va transformer l'objet gants en tableau du type [ ['rouge', 3], ['jaune', 2], ['bleu', 1] ]
const arrayEntries=Object.entries(gants);

for(const [color, numbers] of arrayEntries) {

  const numbers=Object.values(gants);
  //console.log(numbers)
  const colors=Object.keys(gants);
  if(numbers%2==1){
    console.log(numbers)
  }
//const [color, number] = gantColor.split(" ");
 //let res= Math.floor(number/2);
 //console.log(res);
}
}*/
// ---------------- OLIVIER ----------------------------
// VERSION 1 : on empile tous les gants par couleur et ensuite on compte les paires
function ContestResponse()
{
   input.shift();

   let paires = 0;
   let gants = {};

   // 1ère étape : compter le nombre de gants par couleur
   for (const color of input) {

       // Si la propriété qui porte le nom de la couleur n'existe pas dans l'objet
       if (!(color in gants)) {

            // On crée cette propriété et on l'initialise à 0
            gants[color] = 0;
       }

       // On incrémente le nombre de gants pour cette couleur
       gants[color]++;
   }

   // 2ème étape : on compte les paires possibles
   for (color in gants) {
        paires += Math.floor(gants[color]/2);
        // équivalent à : paires = paires + Math.floor(gants[color]/2);
   }

   console.log(paires);
}

// VERSION 2 : on constitue les paires au fur-et-à-mesure
function ContestResponse()
{
    input.shift();

    let paires = 0;
    let gants = [];

    for (const color of input) {
        
        const index = gants.indexOf(color);

        // La couleur est présente parmi les gants qu'on a de côté
        // la méthode indexOf() retourne -1 si elle ne trouve pas l'élément dans le tableau
        if (index !== -1) {
            paires++;
            gants.splice(index, 1);
        } 

        // Sinon (si la couleur n'est pas présente dans le tableau) on ajoute la couleur au tableau
        else {
            gants.push(color);
        }
    }

    console.log(paires);
}