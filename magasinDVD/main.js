let availables = document.getElementById("available");
let selected = document.getElementById("selected");

let availablesArray = [... availables.children];
let selectedArray = [... document.getElementsByClassName("selected")];

let price = document.getElementById("prix");

const addToList = (img) => {
    console.log("Add " + img.target.src);
    price.textContent = parseFloat(price.textContent) + 2.5;
    price.textContent += "€";

    selected.appendChild(img.target);
    console.log(selectedArray)

}

const removeFromList = (img) => {
    console.log("Remove " + img.target.src);
    price.textContent = parseFloat(price.textContent) - 2.5;
    price.textContent += "€";
    
    availables.appendChild(img.target);
}

availablesArray.forEach((n) => {
    n.addEventListener("click", addToList);
});

selectedArray.forEach( (n) => {
    n.addEventListener("click", removeFromList);
}) 