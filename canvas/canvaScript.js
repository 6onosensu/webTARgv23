function delete_() {
    let w = document.getElementById("window").getContext("2d");
    w.clearRect(0, 0, 500, 500); //x,y, width, height
}

// ring ja ringjoon
function circle() {
    let w = document.getElementById("window").getContext("2d");
    //ringjoon
    w.beginPath();
    w.strokeStyle = "blue";
    w.arc(50,50,20,0, 2 * Math.PI, true); // (x,y,R)
    w.stroke();
    //ring
    w.beginPath();
    w.fillStyle = "blue";
    w.arc(100,50,20,0, 2 * Math.PI, true); // (x,y,R)
    w.fill();
}

function  line() {
    let w = document.getElementById("window").getContext("2d");
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
    let w = document.getElementById("window").getContext("2d");
    w.fillStyle = "white";
    w.fillRect(20, 20, 40, 40);
    w.fillText("kaasaegne pilt", 100, 50);
}

function square2() {
    let w = document.getElementById("window").getContext("2d");
    let width = document.getElementById("width").value;
    let heigth = document.getElementById("height").value;
    w.fillStyle = "coral";
    w.fillRect(20, 20, width, heigth);
    w.fillText("kaasaegne pilt", 100, 50);
}
///https://legoman.thkit.ee/
function radius_() {
    let w = document.getElementById("window").getContext("2d");
    let r = document.getElementById("r").value;
    w.beginPath();
    w.fillStyle = "white";
    w.strokeStyle = "grey";
    w.arc(200, 400,r, 0, r * Math.PI); // (x,y,R)
    w.stroke();
    w.fill();
}

function rectangle() {
    let w = document.getElementById("window").getContext("2d");
    let x = document.getElementById("xRec").value;
    let y = document.getElementById("yRec").value;
    w.fillStyle = "coral";
    w.fillRect(100, 300, x, y);
}

function triangle() {
    let w = document.getElementById("window").getContext("2d");
    let bot = document.getElementById("h").value;
    let top = document.getElementById("top").value;
    w.beginPath();
    w.moveTo(bot, top);
    w.lineTo(90, bot);
    w.lineTo(400, bot);
    w.lineTo(300, top);
    w.strokeStyle = "red";
    w.stroke();
}

