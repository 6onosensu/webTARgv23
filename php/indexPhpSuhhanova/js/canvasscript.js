const w = document.getElementById("window").getContext("2d");


function delete_() {
    w.clearRect(0, 0, 500, 500); //x,y, width, height
}

function circle() {
    //ringjoon
    w.beginPath();
    w.strokeStyle = "blue";
    w.arc(50, 50, 20, 0, 2 * Math.PI, true); // (x,y,R)
    w.stroke();
    //ring
    w.beginPath();
    w.fillStyle = "blue";
    w.arc(100, 50, 20, 0, 2 * Math.PI, true); // (x,y,R)
    w.fill();
}

function line() {
    //line
    w.beginPath();
    w.strokeStyle = "red";
    w.fillStyle = "black";
    w.lineWidth = "3";
    w.moveTo(20, 10); //start
    w.lineTo(50, 50); //finish
    w.lineTo(10, 50);
    w.lineTo(20, 10);
    w.stroke(); // draw
    w.fill();
}

function square() {
    w.fillStyle = "white";
    w.fillRect(20, 20, 40, 40);
    w.fillText("kaasaegne pilt", 100, 50);
}

function square2() {
    const width = document.getElementById("width").value;
    const heigth = document.getElementById("height").value;
    w.fillStyle = "coral";
    w.fillRect(20, 20, width, heigth);
    w.fillText("kaasaegne pilt", 100, 50);
}

//----------------------------------------------------
function rectangle() {
    const x = document.getElementById("xRec").value;
    const y = document.getElementById("yRec").value;
    w.fillStyle = "#fff2e6";
    w.fillRect(100, 300, x, y);
}

function window_() {
    const r = document.getElementById("r").value;
    w.beginPath();
    w.fillStyle = "lightblue";
    w.strokeStyle = "#331a00";
    w.lineWidth = "3";
    w.arc(200, 400, r, 0, r * Math.PI); // (x,y,R)
    w.stroke();
    w.fill();
}

function roof() {
    const angle = document.getElementById("angle").value;
    const h = document.getElementById("h_roof").value;
    const x = 80;
    const y = 300;
    const b_width = 340;
    const radians = angle * Math.PI / 180;
    const t_width = b_width - 2 * (h / Math.tan(radians));
    const xdelta = (b_width - t_width) / 2;

    w.beginPath();
    w.moveTo(x, y); // bottom left angle
    w.lineTo(x + b_width, y); // bottom right angle
    w.lineTo(x + b_width - xdelta, y - h); // top right angle
    w.lineTo(x + xdelta, y - h); // top left angle
    w.fillStyle = "#331a00";
    w.fill();
}

function door() {
    const h = document.getElementById("h_door").value;
    const width = document.getElementById("w_door").value;
    const singleDouble = document.getElementsByName("door");
    const x = 270;
    const y = 470;
    let doorType = 1;
    for (const selection of singleDouble) { // getting selection by value of singleDouble
        if (selection.checked) {
            doorType = parseInt(selection.value, 10);
            break;
        }
    }

    w.fillStyle = "lightblue";
    w.strokeStyle = "#331a00";
    w.lineWidth = "4";

    if (doorType === 1) {
        w.fillRect(x, y - h, width, h);
        w.strokeRect(x, y - h, width, h);
    } else if (doorType === 2) {
        w.fillRect(x, y - h, width, h);
        w.strokeRect(x, y - h, width, h);
        w.fillRect(x + width / 2, y - h, width, h);
        w.strokeRect(x + width / 2, y - h, width, h);
    }

}

function handle() {
    const r = document.getElementById("handle").value;
    w.beginPath();
    w.fillStyle = "#331a00";
    w.arc(280, 430, r, 0, r * Math.PI);
    w.stroke();
    w.fill();
}

function porch() {
    const h = document.getElementById("porch").value;
    const x = 250;
    const y = 470;
    w.fillStyle = "brown";
    w.fillRect(x, y, 105, h);
}