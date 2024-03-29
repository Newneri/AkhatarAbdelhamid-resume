function ajouterArtiste() {
    let list = document.getElementById("mylist");
    let newArtist = document.getElementById("ajouter").value;
    if (newArtist != "") {
        let child = list.appendChild(document.createElement("option"));
        child.textContent = newArtist;
        list.size += 1;
    } else {
        alert("Enter a name!")
    }
}

function supprArtiste() {
    let artist = document.getElementById("supprimer").value;
    let list = document.getElementById("mylist");
    let taille = document.getElementById("mylist").children.length;
    let child = document.getElementById("mylist").children;
    let trouve = 0;
    let i = 0;
    for (i; i < taille; i++) {
        if (artist == child[i].text) {
            trouve = 1;
            list.removeChild(child[i]);
            list.size -= 1;
        }
    }
}