var zPos = 1000;

window.onload = function() {

//var numElements = parseInt(Math.random() * 20) + 20;
	
	for (var i =0; i < 40; i++) {
	// loop numElements times and make a square and a cirle each loop
	// put that square and circle in a random position in the shapearea

	var width = parseInt(Math.random() * 20) + 30;
	var height = parseInt(Math.random() * 20) + 20;

	addElements(width, height);
	}

};

function addElements(sizeW, sizeH) {
	
	var square = document.createElement("div");
	square.className = "square";

	square.style.left = parseInt(Math.random() * 450) + "px";
	square.style.top = parseInt(Math.random() * 650) + "px";
	//TODO: assign random color
	square.style.width = sizeW;
	square.style.height = sizeH;
	//TODO: make it clickable
	var graphicsArea = document.getElementById("shapearea");
	graphicsArea.appendChild(square);

}















