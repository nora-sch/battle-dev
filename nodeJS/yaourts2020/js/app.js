// Stocker le chemin du fichier d'entrée
const inputFile = 'input/input3.txt';

// import de la libraire file-system
const fs = require('fs');

// import de la libraire readline et ouvre le fichier d'entrée en lecture
const lineReader = require('readline').createInterface({
    input: fs.createReadStream(inputFile) 
 });

 // Création d'un tableau vide pour stocker le contenu du fichier d'entrée
const input = [];

/**
 * Lorsqu'une ligne du fichier est lue, on la stocke
 * dans une nouvelle case du tableau input - gestion d'évenement
 */
lineReader.on('line', function(line){
    input.push(line);
});
/**
 * et quand on le ferme, on recoit une réponse - gestion d'évenement
 */
lineReader.on('close', function(){
    ContestResponse();
});


/*************************************************************************/
/**-> Parcourir le tableau input pour compter les couleurs
-> Se débarrasser de la première valeur (N, le nombre de votes)
Pour parcourir un tableau en JavaScript : 
- boucle for
- utiliser la méthode forEach() de la classe Array
Par exemple avec forEach() : array.forEach( function(item){ ... });
la fonction anonyme en paramètre de forEach() sera exécutée pour chaque valeur du tableau
chaque valeur du tableau viendra remplir le paramètre item
- Solution 3 : la boucle for...of

[Rappel] : 
- créer un objet : const obj = {}; ou bien const obj = new Object(); ou bien encore const obj = Object.create(null);
- pour créer une propriété dans un objet : obj.prop = 'valeur';
[Attention] Ici il y a une difficulté c'est que le nom des couleurs qui deviendront le nom des propriétés de l'objet seront contenus dans une variable 
Pour créer une propriété dont le nom est contenu dans une variable, on utilisera la syntaxe des tableaux associatifs mais sur l'objet (!) :
obj[maVariable] = 'valeur';
Allez-y petit à petit, première 'micro étape' : 
- supprimer la première case du tableau input qui ne nous intéresse pas
- parcourir le tableau input et afficher dans la console chaque couleur (chaque vote)
[Indication] Lorsque vous allez créer les propriétés dans l'objet, il va falloir vérifier si la propriété que vous voulez rajouter existe déjà ou non. Si elle existe déjà, il faudra simplement incrémenter sa valeur (++), si elle n'existe pas, il faudra la créer.
Pour savoir si une propriété existe dans un objet il existe la méthode hasOwnProperty()
Exemple : if(obj.hasOwnProperty('maPropriete')){ ... }

Exemple de fonction anonyme : 
function(couleur) {
    console.log(couleur);}
[Rappel] Une fonction en JavaScript n'est rien d'autre qu'un objet de la classe Function
Lorsqu'on donne en paramètre d'une fonction une autre fonction (addEventListener, forEach, etc), on peut donner directement la valeur de la fonction en paramètre
C'est ce qu'on appelle une fonction anonyme
La boucle for...of va permettre de parcourir un tableau
for(const item of tableau) { ... 
*/


function ContestResponse()
{ 
    // On crée un objet de coleurs pour savoir si on a déjà 
    const votes = {};
    

    //On commence  pour enléver le prémiere case du tableau où est le chiffre pas couleur
   input.shift();
/*
    // Version 1 : avec la boucle for
    for(let index = 0; index < input.length; index++){
       // console.log(input[index]);
        if(!(votes.hasOwnProperty[input[index]])){
    votes[input[index]]=0;  }
    votes[input[index]++]};
       
    console.log(votes) PAS CORRECT!!!!! A CORRIGER

    */
/*
    // Version 2 : avec la méthode .forEach() de la classe Array
    input.forEach(function(couleur) {
        console.log(couleur);
    })   */

    // Version 3 : avec la boucle for...of permettre parcourir chaque ligne du tableau input 
    // en le mettant comme le valeur dans un variable color
    for (const color of input) {
       // console.log(color)
         // Si l'objet votes ne contient pas la propriété dont le nom est stocké dans la variable color
        if(!votes.hasOwnProperty(color)){

            // Alors on initialise une propriété en rangeant la valeur 0 dedans
            votes[color] = 0;
        }

        // Dans tous les cas, on incrémente le nombre de votes pour cette couleur
        votes[color]++;
    } 
 // console.log(votes); 
 
 // On va transformer l'objet votes en tableau du type [ ['rouge', 3], ['jaune', 2], ['bleu', 1] ]
const arrayEntries=Object.entries(votes);
//console.log(arrayEntries);

// Puis on va trier le tableau obtenu avec la méthode sort()
arrayEntries.sort(function(color1, color2){
    return color2[1] - color1[1];
});
//console.log(arrayEntries);
 // Il ne reste plus qu'à faire un console.log() des 2 premières entrées du tableau ! :)
 console.log(arrayEntries[0][0] + ' ' + arrayEntries[1][0]);
}
