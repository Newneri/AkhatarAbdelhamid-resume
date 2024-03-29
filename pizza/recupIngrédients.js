let key = new Array();
let val = new Array();

let url = window.location.search.slice(1,window.location.search.length);

let parametres = url.split("&");

for(i = 0; i < parametres.length; i++){
    liste = parametres[i].split("=");
    key[i] = liste[0];
    val[i] = liste[1];
}
console.log(key+ ' - ' + val);

let recap = document.getElementById("recapCommande");

for(i=0; i<val.length; i++){
    let x = document.createElement("h3");
    x.textContent = val[i];
    recap.appendChild(x);
}