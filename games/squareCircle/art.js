var maxZ = 1000;
var shapeMaxD = 40;
var shapeMinD = 20;
var canvasW = 740;
var canvasH = 340;

var getCanvas;
var timer;

$("#prevImg").on('click', function () {
	html2canvas(document.querySelector("#art")).then(canvas => {
		document.body.appendChild(canvas);
		getCanvas = canvas;
	});
});

$("#convImg").on('click', function () {
	var imageData = getCanvas.toDataURL("image/png");
	var newData = imageData.replace(/^data:image\/png/, "data:application/octet-stream");
	$("#convImg").attr("download", "image.png").attr("href", newData);
});

window.onload = function() {

	var addS = document.getElementById("addS");
	addS.onclick = addSquare;
	var addC = document.getElementById("addC");
	addC.onclick = addCircle;
	var clear = document.getElementById("clear");
	clear.onclick = clearAll;
	var addT = document.getElementById("addT");
	addT.onclick = addTriangle;
	var start = document.getElementById("start");
	start.onclick = timedArtStart;
	var stop = document.getElementById("stop");
	stop.onclick = timedArtStop;
};
function timedArtStart() {
	timer = setInterval(function(){ generateRandom() }, 1000);
}

function timedArtStop() {
    clearInterval(timer);
}


function generateRandom() {
	var shape = (parseInt(Math.random()*3));
	switch(shape) {
		case 0:
			addSquare();
			break;
		case 1:
			addCircle();
			break;
		case 2:
			addTriangle();
			break;
		default:
		break;
	}
}

function randXPos(){
	return (parseInt(Math.random() * canvasW)) + "px";
}
function randYPos(){
	return (parseInt(Math.random() * canvasH)) + "px";
}
function randDim(){
	return (parseInt(Math.random() * shapeMaxD) + shapeMinD) + "px";
}

function clearAll() {
	var artArea = document.getElementById("art");
	var shapes = artArea.getElementsByTagName("div");
	for (let i = shapes.length - 1; i >= 0; i--) {
		shapes[i].parentNode.removeChild(shapes[i]);
	}
}

function addSquare() {
	var square = document.createElement("div");
	square.className = "square_custom";
	square.style.left = randXPos();
	square.style.top = randYPos();
	square.style.backgroundColor = getRandomColor();
	var randW = randDim();
	var randH = randDim();
	square.style.width = randW;
	square.style.height = randH;
	square.onclick = frontClick;
	var artArea = document.getElementById("art");
	artArea.appendChild(square);
}

function addCircle(){
	var circle = document.createElement("div");
	circle.className = "circle_custom";
	circle.style.left = randXPos();
	circle.style.top = randYPos();
	circle.style.backgroundColor = getRandomColor();
	var randW = randDim();
	var randH = randDim();
	circle.style.width = randW;
	circle.style.height = randH;
	circle.onclick = frontClick;
	var artArea = document.getElementById("art");
	artArea.appendChild(circle);
}

function addTriangle(){
	var triangle = document.createElement("div");
	triangle.className = "triangle_custom";
	triangle.style.left = randXPos();
	triangle.style.top = randYPos();
	var randC = getRandomColor();
	var randB = randDim();
	triangle.style.borderRight = randB + " solid transparent";
	triangle.style.borderLeft = randB + " solid transparent";
	triangle.style.borderBottom = randB + " solid " + randC;
	triangle.onclick = frontClick;
	var artArea = document.getElementById("art");
	artArea.appendChild(triangle);
}


function frontClick(){
var oldZ = parseInt(this.style.zIndex);
	if (oldZ == maxZ) {
		this.parentNode.removeChild(this);
	}
	else {
		maxZ++;
		this.style.zIndex = maxZ;
	}
}

function getRandomColor() {
	var letters = "0123456789abcdef";
	var result = "#";
	for (var i = 0; i<6; i++) {
		result += letters.charAt(parseInt(Math.random() * letters.length));
	}
	return result;
}
