function randomize() {
    var numberRange = document.getElementById('num').value;
    console.log("number range is: " + numberRange);
    var num = getRandom(numberRange);
    var display = document.getElementById("randomVal");
    display.innerHTML = num;
    showRandomValue(numberRange, num)
}

function getRandom(max){
    return Math.floor(Math.random() * Math.floor(max) + 1);
}
function showRandomValue(max, num){
    var dispArea = document.getElementById("valShow");
    for(var i = 0; i < max; i++){
        var divToDisplay = document.createElement("div");

        if (i == num){
        divToDisplay.style.padding = "10px";
        divToDisplay.style.margin = "10px";

        divToDisplay.style.width = "100px";
        divToDisplay.style.height = "100px";
        divToDisplay.style.backgroundColor = "#12fad2";
        dispArea.appendChild(divToDisplay);
        
        }
        else {
        divToDisplay.style.padding = "10px";
        divToDisplay.style.margin = "10px";


    divToDisplay.style.width = "100px";
    divToDisplay.style.height = "100px";
    divToDisplay.style.backgroundColor = "#af2132";
    dispArea.appendChild(divToDisplay);
}
    }
    
    }
