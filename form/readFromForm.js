function readTextBox() {
    let name = document.getElementById("name");
    let answer = document.getElementById("answer");

    answer.innerHTML = "Hello, " + name.value + "!";
}

function toClear() {
    let answer = document.getElementById("answer");
    let answer2 = document.getElementById("answer2");
    answer.innerHTML = " ";
    answer2.innerHTML = " ";
}

function readRadio() {
    let answer2 = document.getElementById("answer2");
    let targv23 = document.getElementById("targv23");
    let logitgv23 = document.getElementById("logitgv23");
    if (targv23.checked) {
        answer2.innerHTML = "Sa oled " + targv23.value + " rühmast!";
    } else if (logitgv23.checked) {
        answer2.innerHTML = "Sa oled " + logitgv23.value + " rühmast!";
    } else {
        answer2.innerHTML = "Palun vali midagi!";
    }

}