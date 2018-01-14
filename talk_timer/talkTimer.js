// JavaScript Document
var elemenArea = document.getElementById("elementarea");
var today = new Date();


window.onload = function () {
	var start = document.getElementById("start");
	start.onclick = timerStart;
	var stop = document.getElementById("stop");
	stop.onclick = timerStop;
};


// initialize your variables outside the function 

var count = 0;
var clearTime;
var seconds = 0,
	minutes = 0,
	hours = 0;
var clearState;
var secs, mins, gethours;

function startWatch() { /* check if seconds is equal to 60 and add a +1 to minutes, and set seconds to 0 */
	if (seconds === 60) {
		seconds = 0;
		minutes = minutes + 1;
	} /* you use the javascript tenary operator to format how the minutes should look and add 0 to minutes if less than 10 */
	mins = (minutes < 10) ? ('0' + minutes + ': ') : (minutes + ': '); /* check if minutes is equal to 60 and add a +1 to hours set minutes to 0 */
	if (minutes === 60) {
		minutes = 0;
		hours = hours + 1;
	} /* you use the javascript tenary operator to format how the hours should look and add 0 to hours if less than 10 */
	gethours = (hours < 10) ? ('0' + hours + ': ') : (hours + ': ');
	secs = (seconds < 10) ? ('0' + seconds) : (seconds); // display the stopwatch 
	var x = document.getElementById("timer");
	x.innerHTML = 'Time: ' + gethours + mins + secs; /* call the seconds counter after displaying the stop watch and increment seconds by +1 to keep it counting */
	seconds++; /* call the setTimeout( ) to keep the stop watch alive ! */
	clearTime = setTimeout("startWatch( )", 1000);
}

function startTime() { /* check if seconds, minutes, and hours are equal to zero and start the stop watch */
	if (seconds === 0 && minutes === 0 && hours === 0) { /* hide the fulltime when the stop watch is running */
		var fulltime = document.getElementById("fulltime");
		fulltime.style.display = "none"; /* hide the start button if the stop watch is running */
		this.style.display = "none"; /* call the startWatch( ) function to execute the stop watch whenever the startTime( ) is triggered */
		startWatch();
	} // if () } // startTime() /* you need to bind the startTime( ) function to any event type to keep the stop watch alive ! */ 
	window.addEventListener('load', function () {
		var start = document.getElementById("startW");
		start.addEventListener('click', startTime);
	}); // startwatch.js end 

}







function timerStart() {

	var square = document.createElement("div");
	square.className = "square";
	square.id = "dateBox";
	square.style.left = "500 px"; //arbitrary hardcoded position
	square.style.top = "500 px";
	//square.style.background = "#000000";
	//TODO: something that makes clicking on this div start the timer -> square.onclick = squareClick; 

	var elementArea = document.getElementById("elementarea");
	elementArea.appendChild(square);
	var h = today.getHours();
	var m = today.getMinutes();
	var s = today.getSeconds();
	m = checkTime(m);
	s = checkTime(s);
	document.getElementById('elementarea').innerHTML =
		h + ":" + m + ":" + s;
	var t = setTimeout(timerStart, 500);
}

function checkTime(i) {

	if (i < 10) {
		i = "0" + i
	}; // add zero in front of numbers < 10
	return i;
}


function timerStop() {

}