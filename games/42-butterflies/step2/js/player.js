function initPlayer (startingX) {
	var newPlayer = {};

	newPlayer.reset = function() {
		newPlayer.height = 25;
		newPlayer.width = 25;
		newPlayer.x = startingX;
		newPlayer.y = canvas.height - newPlayer.height;
		newPlayer.maxSpeed = 10;
		newPlayer.xVelocity = 0;
		newPlayer.yVelocity = 0;
		newPlayer.jumping = false;
	};

	newPlayer.reset();

	newPlayer.render = function () {
		context.fillStyle = 'green';
		context.fillRect(newPlayer.canvasX, newPlayer.canvasY, newPlayer.width, newPlayer.height);
	};

	return newPlayer;
}