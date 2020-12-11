// Stocker le chemin du fichier d'entrée
const inputFile = "input/input4.txt";

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
  let nbMots = input.shift();

  //- Il doit contenir entre 5 et 7 lettres.
  //- Il doit commencer par deux lettres de l'alphabet qui se suivent dans l'ordre alphabétique.
  //- Il doit se terminer par une voyelle (a, e, i, o, u, ou y).

  function isMagical(word) {

    // carCodeAt pas charAt, car ici charCodeAt() returns the numeric Unicode value of the character at  a specific position in the string pas de valeur de string
    // si on met charAt - il ne peut pas comparer si b suit a mais charCodeAt transforme alphabet dans des chiffres - et il peut comparer si un est plus grand que autre 
    // ou il est le chiffre qui suit un autre chiffre
    let first = word.charCodeAt(0);
    let second = word.charCodeAt(1);
    let vowels = new Array("a", "e", "i", "o", "u", "y");
    let last = word[word.length - 1];

    // Test 3 : la dernière lettre (voyelle)
    //if ('aeiouy'.indexOf(word[word.length - 1]) === -1) {
    // return false;
 

  if (
    word.length < 5 ||
    word.length > 7 ||
    second !== first + 1 ||
    !vowels.includes(last)
  ) {
    return false;
  } else {
    return true;
  } 
}

//on stocke des mots magiques dans un tableau, car il faut savoir s'il ne se répètent pas
const magicalWords = [];
 
for (const word of input) {
  if (isMagical(word) && !magicalWords.includes(word)) {
    magicalWords.push(word);
  }
}

console.log(magicalWords.length);
}
/*
  let count = 0;
  for (word of input) {
    if (isMagical(word) == true) {
      count++;
    }
  }
  console.log(count);
  */

//------------------ brouillon ------------

/*
  for (word of input) {
    let firstlettre = word.charAt(0);
    let secondlettre = word.charAt(1);
    console.log(firstlettre, secondlettre)
    let lastlettre = word[word.length - 1];
    console.log(lastlettre); 
    let vowels=new Array('a','e', 'i','o', 'u','y')
    let last = word[word.length - 1];
    if(!vowels.includes(last)){console.log('X')}else{console.log('OK')}
     if (last!=vowels){return false}
    for(let i=1; i<word.length; i++){
   if (word[i-1]> word[i]){return false;}
  */

//-------------------------- OLIVIER ----------------------------
/*
function isMagical(word) {

  // Test 1 : taille du mot
  if (word.length < 5 || word.length > 7) {
      return false;
  }

  // Test 2 : les 2 premières lettres qui se suivent
  if (word.charCodeAt(0) + 1 !== word.charCodeAt(1)) {
      return false;
  }

  // Test 3 : la dernière lettre (voyelle)
  if ('aeiouy'.indexOf(word[word.length - 1]) === -1) {
      return false;
  }

  return true;
}

function ContestResponse()
{
  const magicalWords = [];

  input.shift();

  for (const word of input) {
      if (isMagical(word) && !magicalWords.includes(word)) {
          magicalWords.push(word);
      }
  }

  console.log(magicalWords.length);
  */
