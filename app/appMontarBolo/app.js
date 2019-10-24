function showBts(n) {
    if (n == 1) {
        document.getElementById('OpsHex').style.display = "block";
        document.getElementById('OpsCirc').style.display = "none";

        document.getElementById('boloHex').style.display = "block"
        document.getElementById('boloCirc').style.display = "none";
    } else {
        document.getElementById('OpsHex').style.display = "none";
        document.getElementById('OpsCirc').style.display = "block";

        document.getElementById('boloHex').style.display = "none";
        document.getElementById('boloCirc').style.display = "block";
    }

}


function showHex(num) {
    if (num == 2) {

    } else if (num == 3) {
        document.getElementById('oneHex').style.display = "block";
        document.getElementById('twoHex').style.display = "block";
        document.getElementById('threeHex').style.display = "block";
        document.getElementById('fourHex').style.display = "none";
        document.getElementById('fiveHex').style.display = "none";
        document.getElementById('sixHex').style.display = "none";
    } else if (num == 4) {
        document.getElementById('threeHex').style.display = "block";
        document.getElementById('twoHex').style.display = "block";
        document.getElementById('threeHex').style.display = "block";
        document.getElementById('fourHex').style.display = "block";
        document.getElementById('fiveHex').style.display = "none";
        document.getElementById('sixHex').style.display = "none";
    } else if (num == 5) {
        document.getElementById('oneHex').style.display = "block";
        document.getElementById('twoHex').style.display = "block";
        document.getElementById('threeHex').style.display = "block";
        document.getElementById('fourHex').style.display = "block";
        document.getElementById('fiveHex').style.display = "block";
        document.getElementById('sixHex').style.display = "none";
    } else if (num == 6) {
        document.getElementById('oneHex').style.display = "block";
        document.getElementById('twoHex').style.display = "block";
        document.getElementById('threeHex').style.display = "block";
        document.getElementById('fourHex').style.display = "block";
        document.getElementById('fiveHex').style.display = "block";
        document.getElementById('sixHex').style.display = "block";
    }

}

function showCirc(num) {
    if (num == 2) {

    } else if (num == 3) {
        document.getElementById('oneCirc').style.display = "block";
        document.getElementById('twoCirc').style.display = "block";
        document.getElementById('threeCirc').style.display = "block";
        document.getElementById('fourCirc').style.display = "none";
        document.getElementById('fiveCirc').style.display = "none";
        document.getElementById('sixCirc').style.display = "none";
    } else if (num == 4) {
        document.getElementById('threeCirc').style.display = "block";
        document.getElementById('twoCirc').style.display = "block";
        document.getElementById('threeCirc').style.display = "block";
        document.getElementById('fourCirc').style.display = "block";
        document.getElementById('fiveCirc').style.display = "none";
        document.getElementById('sixCirc').style.display = "none";
    } else if (num == 5) {
        document.getElementById('oneCirc').style.display = "block";
        document.getElementById('twoCirc').style.display = "block";
        document.getElementById('threeCirc').style.display = "block";
        document.getElementById('fourCirc').style.display = "block";
        document.getElementById('fiveCirc').style.display = "block";
        document.getElementById('sixCirc').style.display = "none";
    } else if (num == 6) {
        document.getElementById('oneCirc').style.display = "block";
        document.getElementById('twoCirc').style.display = "block";
        document.getElementById('threeCirc').style.display = "block";
        document.getElementById('fourCirc').style.display = "block";
        document.getElementById('fiveCirc').style.display = "block";
        document.getElementById('sixCirc').style.display = "block";
    }

}