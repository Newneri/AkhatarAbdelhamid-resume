// ------------------------------------- Définition des variables globales ------------------------------------- 
let imagePath = "src/images/imgMen/";
let imageContainer = document.querySelector("#results");
let terrain = document.querySelector("#terrain");
let form = document.querySelector("#form");
let formation = [3, 3, 4, 1];
let men = ["alisson", "brunoFernandes", "bukayoSaka", "GabrielMartinelli", "jackGrealish", "joaoCancelo",
    "johnatanClauss", "judeBellingham", "kevinDeBruyne", "kylianMbappe", "lucaHermandez", "martinOdegaard",
    "olivierGiroud", "philFoden", "robertLewandowski", "theoHermandez", "tonyKroos", "virgilVanDijk"];
let women = ["alexGreenwood", "alexiaPutellas", "alexMorgan", "bethMead", "carolineHansen", "debinha", "DzseniferMarozsan",
    "eugenieLeSommer", "jackieGroenen", "jordanNobbs", "kenzaDali", "kimLittle", "leahWilliamson", "liaWalti",
    "lucyBronze", "mapiLeon", "mariona", "maryEarps", "millieTurner", "onaBatlle", "pernilleHarder", "samKerr", "sandraPanos"];
let genders = [men, women];
let genderBool = 0;
let selectedPlayers = [];


// Fonction pour filtrer les joueurs en fonction du genre
function filter(gender) {
    let images = imageContainer.children;
    for (let i = 0; i < images.length; i++) {
        images[i].style.display = "block";
    }
    if (gender == 0) {
        for (let i = 0; i < images.length; i++) {
            if (!images[i].classList.contains("man")) {
                images[i].style.display = "none";
            }
        }
    } else {
        for (let i = 0; i < images.length; i++) {
            if (!images[i].classList.contains("woman")) {
                images[i].style.display = "none";
            }
        }
    }
    genderBool = gender;
}

// Fonction pour retirer un joueur de la liste passée en paramètre
function removePlayer(name, tab) {
    for (let i = 0; i < tab.length; i++) {
        if (tab[i] == name) {
            tab.splice(i, 1);
        }
    }
}

// Fonction pour initialiser toutes les cartes des joueurs
function initiateCards() {
    for (let i = 0; i < men.length; i++) {
        let child = document.createElement("img");
        child.src = "src/images/imgMen/" + men[i] + ".png";
        child.alt = men[i];
        child.draggable = "true";
        child.classList.add("player");
        child.classList.add("man");
        child.id = men[i]
        imageContainer.appendChild(child);
    }
    for (let i = 0; i < women.length; i++) {
        let child = document.createElement("img");
        child.src = "src/images/imgWomen/" + women[i] + ".png";
        child.alt = women[i];
        child.draggable = "true";
        child.classList.add("player");
        child.classList.add("woman");
        child.id = women[i]
        imageContainer.appendChild(child);
    }
}

// Fonction appelée lorsque le glissement d'un élément commence
function dragStart(event) {
    event.dataTransfer.setData("id", event.target.id);
    console.log(event.target.alt + " Has been dragged")
}

// Fonction appelée lorsqu'un élément est survolé pendant le glissement
function dragOver(event) {
    event.preventDefault();
}

// Fonction appelée lorsqu'un élément est lâché
function drop(event) {
    if (event.target.classList.contains("selected")) {
        event.preventDefault();
        console.log("Drop over a slot");
    } else {
        event.preventDefault();

        let playerId = event.dataTransfer.getData("id");
        let player = document.getElementById(playerId);

        player.removeAttribute("id");
        console.log(playerId + " Has been dropped");
        event.target.src = player.src;
        event.target.alt = player.alt;
        event.target.classList = player.classList;
        event.target.classList.remove("slot");
        event.target.classList.remove("player");
        event.target.classList.add("selected");
        event.target.draggable = "false";
        event.target.id = playerId;
        removePlayer(playerId, genders[genderBool]);
        imageContainer.removeChild(player);

        selectedPlayers.push(event.target);
        console.log(selectedPlayers)
        selectedPlayers.forEach(selected => {
            selected.addEventListener("click", remove);
        })
    }
}

// Fonction pour supprimer un joueur de la liste sélectionnée
function remove(event) {
    if (event.target.classList.contains("selected")) {
        console.log("click on " + event.target.alt);
        if (event.target.classList.contains("man")) {
            genders[0].push(event.target.alt);
        } else {
            genders[1].push(event.target.alt);
        }
        let image = document.createElement("img");
        event.target.removeAttribute("id");
        image.src = event.target.src;
        image.alt = event.target.alt;
        image.id = event.target.alt;
        image.draggable = "true";
        image.classList = event.target.classList;
        image.classList.remove("selected");
        image.classList.add("player");
        imageContainer.appendChild(image);

        event.target.src = "src/images/empty.png"
        event.target.alt = "";
        event.target.classList = ["slot"]
    } else {
        return;
    }
}

// Fonction pour initialiser le jeu
function initiateGame() {
    let players = document.querySelectorAll(".player");
    let slots = document.querySelectorAll(".slot");

    players.forEach(player => {
        player.addEventListener("dragstart", dragStart);
    });
    slots.forEach(slot => {
        slot.addEventListener("dragover", dragOver);
        slot.addEventListener("drop", drop);
    });
}

// Fonction pour valider la composition et créer les champs de formulaire
function valider() {
    let tmp = 0;
    let compo = document.querySelectorAll(".selected")
    if (compo.length < 11) {
        alert("Veuillez finalisere votre composition")
        return false;
    } else {
        while (form.firstChild) {
            if (form.lastChild.type != "submit") {
                form.removeChild(form.lastChild)
            } else {
                break;
            }
        }
        while (tmp < compo.length) {
            let input = document.createElement("input")
            input.type = "hidden";
            input.value = compo[tmp].src;
            input.name = "joueur-" + tmp;
            form.appendChild(input);
            tmp++;
        }

        for (let i = 0; i < formation.length; i++) {
            let input = document.createElement("input");
            input.type = "hidden";
            input.value = formation[i];
            input.name = "line-"+ tmp;
            form.appendChild(input);
            console.log(i + "added to form")
            tmp++
        }
        return true;
    }
}

// Fonction pour initialiser le terrain de jeu avec des emplacements vides
function initiateTerrain(code) {
    for (let i = 0; i < code.length; i++) {
        let ligne = document.createElement("div");
        ligne.classList = ["line"]
        terrain.appendChild(ligne);
        for (let j = 0; j < code[i]; j++) {
            let slot = document.createElement("img");
            slot.classList = ["slot"];
            slot.src = "src/images/empty.png";
            terrain.children[i].appendChild(slot);
        }
    }
}// Fonction principale pour démarrer le jeu

// Fonction principale pour démarrer le jeu déclenché par les buttons des formations
function start(code) {
    console.log("Start");
    let loadingP = document.getElementById("loading-page");
    loadingP.style.display = 'none';
    formation = code;
    initiateTerrain(formation);
    initiateCards();
    initiateGame();
}
