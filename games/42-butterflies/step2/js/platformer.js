var requestAnimationFrame, canvas, context, width, height, keys, player;

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

	keys = [];

	player = initPlayer(width / 4);
}

// on page load
window.addEventListener('load', function () {
	update();
});

// on keydown event
document.body.addEventListener('keydown', function (e) {
	keys[e.keyCode] = true;
});

// on keyup event
document.body.addEventListener('keyup', function (e) {
	keys[e.keyCode] = false;
});

// update the game canvas
function updateGame() {
	// check for keys pressed
	if (keys[38] || keys[32]) {
		// up arrow || space bar
		if (!player.jumping) {
			player.jumping = true;
			player.yVelocity = -player.maxSpeed * 2;
		}
	}
	if (keys[39]) {
		// right arrow
		if (player.xVelocity < player.maxSpeed) {
			player.xVelocity++;
		}
	}
	if (keys[37]) {
		// left arrow
		if (player.xVelocity > -player.maxSpeed) {
			player.xVelocity--;
		}
	}

	// change player position
	player.x += player.xVelocity;
	player.y += player.yVelocity;
	player.canvasX = player.x;
	player.canvasY = player.y;

	// clear the canvas
	context.clearRect(0, 0, canvas.width, height);

	// draw player
	player.render();
}

// on frame draw
function update () {
	updateGame();
	// update frame
	requestAnimationFrame(update);
}
