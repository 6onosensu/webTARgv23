//A function that will receive an image from an array and update the image when the page is refreshed
function juhuslikPilt() {
    //An array of images
    const pildid = [
        'img/fir.png',
        'img/sec.png',
        'img/thi.png'
    ];
    //JUHUSLIK PILT
    const juhuslikPilt = Math.floor(Math.random() * pildid.length);
    //An image reveive from the array
    const pilt = pildid[juhuslikPilt];
    const rpilt = document.getElementById("random-pilt");

    rpilt.src = pilt;
}

//kontroll - kas pildiaadress on sama kui option value
function pildiKontroll() {
    puhastaRadio();

    const rpilt = document.getElementById("random-pilt");
    if (document.getElementById("valik").value === rpilt.getAttribute("src")) {
        document.getElementById("vastus").innerHTML="Õige!";
        document.getElementById("vastus").style.color = "green";
    } else {
        document.getElementById("vastus").innerHTML="Vale!";
        document.getElementById("vastus").style.color = "red";
    }
}

function pildiKontrollRadio() {
    puhastaSelect()

    const rpilt = document.getElementById("random-pilt");
    const valik2 = document.getElementsByName("valik2");

    for (let i = 0; i < valik2.length; i++) {
        if (valik2[i].checked) {
            if (valik2[i].value === rpilt.getAttribute("src")) {
                document.getElementById("vastus").innerHTML="Õige!";
                document.getElementById("vastus").style.color = "green";
            } else {
                document.getElementById("vastus").innerHTML="Vale!";
                document.getElementById("vastus").style.color = "red";
            }
        }
    }
}

// puhastamisfunktsioonid
// puhastame radionuppud
function puhastaRadio() {
    const valik2 = document.getElementsByName("valik2");
    for (let i = 0; i < valik2.length; i++) {
        valik2[i].checked = false;
    }
}
//puhastame selectedIndex
function puhastaSelect() {
    document.getElementById("valik").selectedIndex = 0;
}

function arvuta(kogus, pildiValik) {
    return (kogus * pildiValik).toFixed(1);
    //tofixid - kol-vo znakov posle ','
}

const pilt1Hind = 2.5;
const pilt2Hind = 2;
const pilt3Hind = 50;

function radioValikuHinnad() {
    let vastus2 = document.getElementById("vastus2");
    let kogus = document.getElementById("kogus").value;
    let fir = document.getElementById("fir");
    let sec = document.getElementById("sec");
    let thi = document.getElementById("thi");
    if (fir.checked) {
        vastus2.innerHTML = arvuta(kogus, pilt1Hind) + " euro";
    } else if (sec.checked) {
        vastus2.innerHTML = arvuta(kogus, pilt2Hind) + " euro";
    } else if (thi.checked) {
        vastus2.innerHTML = arvuta(kogus, pilt3Hind) + " euro";
    } else {
        vastus2.innerHTML = "Palun vali pilti";
    }
}
