var requestAnimationFrame, canvas, context, width, height, keys, player, friction, gravity;

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

	level = initLevel();

	keys = [];
	friction = 0.8;
	gravity = 1;

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
function updateGame () {
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

	// clear the canvas
	context.clearRect(0, 0, canvas.width, canvas.height);

	// update player and level info
	player.update();
	level.update();

	// draw player and level
	// we want the level to be on the bottom, so we need to draw it first
	level.render();
	player.render();
}

// on frame draw
function update () {
	updateGame();
	// update frame
	requestAnimationFrame(update);
}
