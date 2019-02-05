function randomize(){
   var numberToRandomize = document.getElementById('maxNumber').value;
   console.log("number to randomize is: " + numberToRandomize);

   var returnVal = getRandomInt(numberToRandomize);
   console.log("return value: " + returnVal);
   var display = document.getElementById('studentSelected');
   display.innerHTML = "Student Number " + returnVal;
}
function getRandomInt(max) {
  return Math.floor(Math.random() * Math.floor(max) + 1);
}
