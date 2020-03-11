var myVar = setInterval(myTimer, 10);
var timer = 0;

function myTimer() {
  timer+= .01;
  document.getElementById("clock").innerHTML = "Time Elapsed: " + timer;
  
}

resizeCanvas