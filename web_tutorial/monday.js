var thisIsAGlobalVariable = "hello world";
var catAppearing = true;

function getRandomNum(){
    return Math.floor(Math.random() * 6) + 1;
}

function switchPictures() {
    var pictureToSwitch = document.getElementById("picture");
    var num = getRandomNum();
    if(num == 3) {
        pictureToSwitch.src = "dog.jpg";
    } 
    else {
        pictureToSwitch.src = "cat.jpg";
    }
}