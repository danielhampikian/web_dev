function initPlayer (startingX) {
	var newPlayer = {};

	newPlayer.reset = function () {
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

	newPlayer.update = function () {
		// apply physics
		player.xVelocity *= friction;
		player.yVelocity += gravity;

		// change player position
		player.x += player.xVelocity;
		player.y += player.yVelocity;
		player.canvasX = player.x;

		// check for background boundaries to change the background position
		// 0 + width/2 -> let player move up to 0
		if (player.x <= (canvas.width / 2) - (player.width /2)) {
			if (player.x <= 0) {
				player.x = 0;
			}
			player.canvasX = player.x;
		}
		// background.width - width/2 -> let player move up to background.width
		else if (player.x >= level.background.width - (canvas.width / 2) - (player.width /2)) {
			if (player.x >= level.background.width - player.width) {
				player.x = level.background.width - player.width;
			}
			player.canvasX = player.x - level.background.width + canvas.width;
		}
		// anything in between -> move both the background and the player
		else {
			player.canvasX = (canvas.width / 2) - (player.width /2);
		}

		// check for vertical boundaries
		if (player.y >= canvas.height - player.height) {
			player.y = canvas.height - player.height;
			player.jumping = false;
		}
		player.canvasY = player.y;
	};

	newPlayer.render = function () {
		context.fillStyle = 'red';
		context.fillRect(newPlayer.canvasX, newPlayer.canvasY, newPlayer.width, newPlayer.height);
	};

	return newPlayer;
}