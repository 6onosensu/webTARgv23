function getRandomImage() {
    const images = [
        'img/cats/siamese.jpg',
        'img/cats/british.jpg',
        'img/cats/maineCoon.jpg'
    ];
    const randomeImg = Math.floor(Math.random() * images.length);
    const img = images[randomeImg];
    const rImg = document.getElementById("random-cat");
    rImg.src = img;
}
function checkImg() {
    cleanRadio();

    const rImg = document.getElementById("random-cat");
    if (document.getElementById("option").value === rImg.getAttribute("src")) {
        document.getElementById("answer").innerHTML="Õige!";
        document.getElementById("answer").style.color = "green";
    } else {
        document.getElementById("answer").innerHTML="Vale!";
        document.getElementById("answer").style.color = "red";
    }
}
function cleanRadio() {
    const choice = document.getElementsByName("choice");
    for (let i = 0; i < choice.length; i++) {
        choice[i].checked = false;
    }
}

function checkImgR() {
    cleanSelect()

    const rImg = document.getElementById("random-cat");
    const choice = document.getElementsByName("choice");

    for (let i = 0; i < choice.length; i++) {
        if (choice[i].checked) {
            if (choice[i].value === rImg.getAttribute("src")) {
                document.getElementById("answer").innerHTML="Õige!";
                document.getElementById("answer").style.color = "green";
            } else {
                document.getElementById("answer").innerHTML="Vale!";
                document.getElementById("answer").style.color = "red";
            }
        }
    }
}
function cleanSelect() {
    document.getElementById("option").selectedIndex = 0;
}
