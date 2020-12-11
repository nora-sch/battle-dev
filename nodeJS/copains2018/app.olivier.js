const inputFile = 'input/input1.txt';


// Import de la librairie file-system
const fs = require('fs');

// Import de la librairie readline
const lineReader = require('readline').createInterface({
    input: fs.createReadStream(inputFile)
});

/**
 * On prépare un tableau vide pour stocker
 * le contenu du fichier
 */
const input = [];

/**
 * Lorsqu'une ligne du fichier est lue, on la stocke
 * dans une nouvelle case du tableau input
 */
lineReader.on('line', function(line){
    input.push(line);
});

/**
 * Lorsque tout le fichier est lu on appelle
 * simplement la fonction contestResponse
 */
lineReader.on('close', function(){
    ContestResponse();
});

/**********************************************************************/

/**
 * Calcule la distance entre 2 tableaux de notes
 */
function computeDistance(notesA, notesB)
{
    let distance = 0;

    // On parcourt les notes
    for (let index = 0; index < notesA.length; index++) {

        // On calcule la différence entre les notes de A et de B en valeur absolue
        distance += Math.abs(notesA[index] - notesB[index]);
    }

    return distance;
}

function ContestResponse()
{
   /**
    * ETAPE 1 : récupérer les données d'entrées
    * et les stocker dans un format exploitable
    */

    // Première ligne du tableau input : mes notes sous forme '10 9 2 1 5' qu'on tranforme sous forme [10, 9, 2, 1, 5]
    const myNotes = input.shift().split(' ').map(Number);

    // Deuxième ligne du tableau input : le nombre d'amis, on s'en fiche, on le supprime
    input.shift();

    // Troisième ligne du tableau input : le nombre de meilleurs amis 
    const numberOfBestFriends = Number(input.shift());

    // Les reste du tableau input : les notes des amis sous forme '4 5 4 1 10 8'
    const allFriendsNotes = [];
    for (const currentNotes of input) {
        allFriendsNotes.push(currentNotes.split(' ').map(Number));
    }

    /**
     * ETAPE 2 : qui sont mes meilleurs amis ?
     */

    // Initialisation d'un tableau qui contiendra les distances et les indices de chaque ami
    let distances = [];

    // Je parcours le tableau des notes des amis
    for (const [index, friendNotes] of allFriendsNotes.entries()) {

        // Calcul de la distance entre mes notes et les notes de mon n-ième ami
        const distance = computeDistance(myNotes, friendNotes);

        // On stocke dans un tableau un objet avec la distance et l'indice de l'ami correspondant
        distances.push({
            index: index,
            distance: distance
        });
    }

    // Une fois les distances calculées, on va les trier par ordre croissant !
    distances = distances.sort((objDist1, objDist2) => objDist1.distance - objDist2.distance);

    // On ne garde que les premières distances qui correspondent aux meilleurs amis
    distances = distances.slice(0, numberOfBestFriends);

    // On ne garde ensuite que les indices des meilleurs amis
    const bestFriendsIndexes = distances.map(objDist => objDist.index);

    /**
     * ETAPE 3 : calculer la moyenne des meilleurs amis
     */

    // On fait la somme des notes de mes meilleurs amis pour Rocky VI
    const sum = bestFriendsIndexes.reduce( (total, index) => {
        return total + allFriendsNotes[index][5];
    }, 0);

    // On calcule la moyenne en divisant par le nombre de meilleurs amis
    const avg = Math.floor(sum / numberOfBestFriends);

    console.log(avg);
}