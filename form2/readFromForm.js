function readTextBox() {
    let name = document.getElementById("name");
    let answer = document.getElementById("answer");

    answer.innerHTML = "Hello, " + name.value + "!";
}

function toClear() {
    answer.innerHTML = " ";
    answer2.innerHTML = " ";
    answer3.innerHTML = " ";
    answer4.innerHTML = " ";
    answer5.innerHTML = " ";
    answer6.innerHTML = " ";
    answer7.innerHTML = " ";
    answer8.innerHTML = " ";
    answer9.innerHTML = " ";
    answer10.innerHTML = " ";
    answer11.innerHTML = " ";
    answer12.innerHTML = " ";
    pilt.src = " ";
}

function readRadio() {
    let answer2 = document.getElementById("answer2");
    let targv23 = document.getElementById("targv23");
    let logitgv23 = document.getElementById("logitgv23");
    let pilt = document.getElementById("pilt");

    if (targv23.checked) {
        answer2.innerHTML = "You are from " + targv23.value + " group!";
        pilt.src="img/fir.png"
    } else if (logitgv23.checked) {
        answer2.innerHTML = "You are from " + logitgv23.value + " group!";
        pilt.src="img/sec.png"
    } else {
        answer2.innerHTML = "Please choose something!";
        pilt.src="thi.png"
    }

}

//Checkbox
function readCheckboxValik() {
    let answer3 = document.getElementById("answer3");
    let andmebaasid = document.getElementById("andmebaasid");
    let matemaatika = document.getElementById("matemaatika");
    let programeerimine = document.getElementById("programeerimine");
    // alt + j - valib mitu elemente korraga

    let aine = "";
    if (andmebaasid.checked) {
        aine += andmebaasid.value + ", ";
    }
    if (matemaatika.checked) {
        aine += matemaatika.value + ", ";
    }
    if (programeerimine.checked) {
        aine += programeerimine.value + ", ";
    }
    answer3.innerHTML = "Favorites is " + aine;
}

function selectOptionValik() {
    let answer4 = document.getElementById("answer4");
    let kodu = document.getElementById("kodu");
    let km = document.getElementById("km");

    if (kodu.selectedIndex !== 0) {
        answer4.innerHTML = "The selected city is " + kodu.value + ", your home is " + km.value + "km away from here";
    } else {
        answer4.innerHTML = "Please choose something!";
    }
}

function forAnsver5() {
    let answer5 = document.getElementById("answer5");
    let date = document.getElementById("date")
    answer5.innerHTML = "Date of your birth is " + date.value;
}

function chooseColor() {
    let varv = document.getElementById("varv");
    answer.style.color = varv.value;
    answer2.style.color = varv.value;
    answer3.style.color = varv.value;
    answer4.style.color = varv.value;
    answer5.style.color = varv.value;
    answer6.style.color = varv.value;
    answer7.style.color = varv.value;
    answer8.style.color = varv.value;
    answer9.style.color = varv.value;
    answer10.style.color = varv.value;
    answer11.style.color = varv.value;
    answer12.style.color = varv.value;
}

function toPrintTable() {




}