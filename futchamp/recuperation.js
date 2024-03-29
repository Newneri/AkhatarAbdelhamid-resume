// Analyse des paramètres de l'URL pour récupérer les données
let url = new URLSearchParams(window.location.search);

// Sélection de l'élément HTML représentant le terrain
let terrain = document.querySelector("#terrain2");

// Initialisation des tableaux pour stocker les images des joueurs et la formation
let images = [];
let formation = [];

// Parcours de tous les paramètres de l'URL
for (const parametres of url) {
    // Vérification si le paramètre représente un joueur
    if (parametres[0].startsWith("joueur")) {
        // Décodage de l'URL pour récupérer l'adresse de l'image du joueur
        const urlJoueur = decodeURIComponent(parametres[1]); 
        // Ajout de l'URL de l'image dans le tableau des images
        images.push(urlJoueur);
    } else {
        // Si le paramètre représente une formation, l'ajouter au tableau de formation après le décodage
        formation.push(parseInt(decodeURIComponent(parametres[1])));
    }
}

// Fonction pour initialiser le terrain avec les images des joueurs
function initiateTerrain(code) {
    let tmp = 0;
    // Parcours de chaque ligne dans la formation
    for (let i = 0; i < code.length; i++) {
        // Création d'un élément div pour représenter une ligne sur le terrain
        let ligne = document.createElement("div");
        ligne.classList = ["line"];
        terrain.appendChild(ligne);
        // Parcours du nombre de joueurs dans la ligne actuelle de la formation
        for (let j = 0; j < code[i]; j++) {
            // Création d'un élément img pour représenter un joueur sur le terrain
            let slot = document.createElement("img");
            // Attribution de l'URL de l'image du joueur à l'élément
            slot.src = images[tmp];
            // Ajout du joueur à la ligne actuelle du terrain
            terrain.children[i].appendChild(slot);
            tmp++; // Passage à l'image suivante dans le tableau des images
        }
    }
}

// Appel de la fonction pour initialiser le terrain avec la formation et les images des joueurs
initiateTerrain(formation);
