let answs = Array.from(document.querySelectorAll('.answer'));
function readTextBox() {
    let name = document.getElementById("name");
    let answer = document.getElementById("answer");
    let trimmedName = name.value.trim();
    if (trimmedName) {
        answer.innerHTML = "Hello, " + trimmedName + "!";
    } else {
        answer.innerHTML = "Please enter your name.";
    }
}

function toClear() {
    answs.forEach(answ => {
        answ.innerHTML = " ";
    });
    let pilt = document.getElementById("pilt");
    pilt.src = " ";
}

function readRadio() {
    let answer2 = document.getElementById("answer2");
    let targv23 = document.getElementById("targv23");
    let logitgv23 = document.getElementById("logitgv23");
    let pilt = document.getElementById("pilt");

    if (!answer2 || !targv23 || !logitgv23 || !pilt) {
        console.error("Some elements are missing.");
        return;
    }
    if (targv23.checked) {
        answer2.innerHTML = "You are from " + targv23.value + " group!";
        pilt.src="images/fir.png";
    } else if (logitgv23.checked) {
        answer2.innerHTML = "You are from " + logitgv23.value + " group!";
        pilt.src="images/sec.png";
    } else {
        answer2.innerHTML = "Please choose something!";
        pilt.src="images/thi.png";
    }
}

//Checkbox
function readCheckbox() {
    let answer3 = document.getElementById("answer3");
    let checkboxes = document.querySelectorAll('[name="interest"]');
    let aine = Array.from(checkboxes).filter(cb => cb.checked).map(cb => cb.value).join(", ");
    answer3.innerHTML = "Favorites are: " + aine;
}

function selectOption() {
    let answer4 = document.getElementById("answer4");
    let kodu = document.getElementById("kodu");
    let km = document.getElementById("km");
    if (kodu.selectedIndex !== 0) {
        answer4.innerHTML = "The selected city is " + kodu.value + ", your home is " + km.value + "km away from here";
    } else {
        answer4.innerHTML = "Please choose something!";
    }
}
function for5() {
    let ans5 = document.getElementById("answer5");
    let date = document.getElementById("date");
    ans5.innerHTML = "Date of your birth is " + date.value;
}
function for6() {
    let ans6 = document.getElementById("answer6");
    let email = document.getElementById("email");
    ans6.innerHTML = "Your email is " + email.value;
}
function for7() {
    let ans7 = document.getElementById("answer7");
    ans7.innerHTML = "You selected a file"
}
function for8() {
    let ans8 = document.getElementById("answer8");
    let time = document.getElementById("time");
    ans8.innerHTML = "Your time of birth is " + time.value;
}

function for9() {
    let ans9 = document.getElementById("answer9");
    let tel = document.getElementById("tel");
    ans9.innerHTML = "Your number is " + tel.value;
}
function for10() {
    let ans10 = document.getElementById("answer10");
    let datetime = document.getElementById("datetime");
    ans10.innerHTML = "Your local date and time are " + datetime.value;
}
function for11() {
    let ans11 = document.getElementById("answer11");
    let hidden = document.getElementById("hidden");
    ans11.innerHTML = "You can not see this! " + hidden.value;
}
function for12(){
    let ans12 = document.getElementById("answer12");
    ans12.innerHTML = "Your photo"
}
function chooseColor() {
    let color = document.getElementById("varv").value;
    answs.forEach(answ => {
        answ.style.color = color;
    });
}

function createTable() {
    const data = [
        ["Name", "Age", "City"],  // Table header
        ["Alice", 24, "New York"],
        ["Bob", 30, "San Francisco"],
        ["Charlie", 28, "London"]
    ];

    const table = document.createElement("table");
    table.style.width = '100%'; // Set the width of the table
    table.setAttribute('border', '1');

    data.forEach((row, index) => {
        const tableRow = table.insertRow(); // Create a new row

        row.forEach(cellData => {
            const cell = index === 0 ? tableRow.insertCell() : tableRow.insertCell();
            cell.textContent = cellData; // Set the text content of the cell

            if (index === 0) {
                cell.style.fontWeight = 'bold'; // Make headers bold
            }
        });
    });

    const container = document.getElementById("tableContainer");
    container.appendChild(table);
}