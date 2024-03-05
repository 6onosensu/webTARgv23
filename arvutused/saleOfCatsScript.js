function getRandomImage() {
    const images = ['img/cats/siamese.jpg', 'img/cats/british.jpg', 'img/cats/maineCoon.jpg'];
    document.getElementById("random-cat").src = images[Math.floor(Math.random() * images.length)];
}
function checkImg() {
    cleanRadio();

    const img = document.getElementById("random-cat").getAttribute("src");
    document.getElementById("answer").innerHTML = document.getElementById("option").value === img ? "Correct!" : "Incorrect!";
    document.getElementById("answer").style.color = document.getElementById("option").value === img ? "green" : "red";
}
function cleanRadio() {
    const choice = document.getElementsByName("choice");
    for (let i = 0; i < choice.length; i++) {
        choice[i].checked = false;
    }
}

function checkImgR() {
    cleanSelect()
    const img = document.getElementById("random-cat").getAttribute("src");
    const choices = document.getElementsByName("choice");
    for (let i = 0; i < choices.length; i++) {
        if (choices[i].checked) {
            document.getElementById("answer").innerHTML = choices[i].value === img ? "Correct!" : "Incorrect!";
            document.getElementById("answer").style.color = choices[i].value === img ? "green" : "red";
        }
    }
}

function cleanSelect() {
    document.getElementById("option").selectedIndex = 0;
}

function calculate(quantity, price) {
    return (quantity * price).toFixed(0);
}

const siamesePrice = 400;
const britishPrice = 250;
const maineCoonPrice = 500;

function showResult() {
    let quantity = Number(document.getElementById("quantity").value);
    let answer2 = document.getElementById("answer2");
    let siameseR = document.getElementById("siamese");
    let britishR = document.getElementById("british");
    let maineCoonR = document.getElementById("maineCoon");
    let siamOption = document.getElementById("siam");
    let britOption = document.getElementById("brit");
    let mcOption = document.getElementById("mc");
    const siamChecked = siameseR.checked || siamOption.selected
    const britChecked = britishR.checked || britOption.selected
    const mcChecked = maineCoonR.checked || mcOption.selected
    if (siamChecked) {
        answer2.innerHTML = calculate(quantity, siamesePrice) + " Euro";
    } else if (britChecked) {
        answer2.innerHTML = calculate(quantity, britishPrice) + " Euro";
    } else if (mcChecked) {
        answer2.innerHTML = calculate(quantity, maineCoonPrice) + " Euro";
    } else {
        answer2.innerHTML = "Please select a cat!";
    }
}