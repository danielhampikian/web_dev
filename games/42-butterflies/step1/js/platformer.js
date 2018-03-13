var requestAnimationFrame, canvas, context, width, height;

(initialize());


function initialize () {
	requestAnimationFrame = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimation || window.msRequestAnimationFrame;
	window.requestAnimationFrame = requestAnimationFrame;
	canvas = document.getElementById('canvas');
	context = canvas.getContext('2d');
	// these can be arbitrary, but should be less than the background image dimensions
	// height can be the same if there will be no vertical change in background
	width = 800;
	height = 600;
	canvas.width = width;
	canvas.height = height;
}

// on page load
window.addEventListener('load', function () {
	update();
});

// on frame draw
function update () {
	context.fillStyle = 'green';
	context.fillRect(width / 2, height / 2, 25, 25);
	// update frame
	requestAnimationFrame(update);
}
