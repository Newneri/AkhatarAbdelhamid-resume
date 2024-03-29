let numbers = [...document.getElementsByClassName('btn')]
let operators = [...document.getElementsByClassName('operator')]
let inputBox = document.getElementById("input");

let input = 0;

const addNumber = (n) => {
    inputBox.textContent += n.target.textContent;
}

const calcOperator = (o) => {
    if(inputBox.textContent == ""){
        return;
    }else if(o.target.id == "ac"){
        inputBox.textContent = "";
        input = 0;
    }else if(o.target.id == "plus-minus"){
        input = -1 * parseFloat(inputBox.textContent);
        inputBox.textContent = input;
    } else {
        inputBox.textContent += o.target.textContent;
    }
}

function calculate() {
    inputBox.textContent = eval(inputBox.textContent)
}

numbers.forEach((n) => {
    n.addEventListener("click", addNumber);
});

operators.forEach((n) => {
    n.addEventListener("click", calcOperator);
});
