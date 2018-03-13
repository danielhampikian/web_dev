function initLevel() {
	var newLevel = {};

	// start the background at the top left edge
	newLevel.background = {
		x: 0,
		y: 0
	};

	// background image
	backgroundImg = new Image();
	backgroundImg.onload = function () {
		// make the size of the level accessible to the game
		newLevel.background.width = backgroundImg.width;
		newLevel.background.height = backgroundImg.height;
	};

	newLevel.update = function () {
		// we need to move our background in relation to the player
		// 0 + width/2 -> don't move the background
		if (player.x <= (canvas.width / 2) - (player.width /2)) {
			newLevel.background.x = 0;
		}
		// background.width - width/2 -> don't move the background
		else if (player.x >= level.background.width - (canvas.width / 2) - (player.width /2)) {
			newLevel.background.x = -(level.background.width - canvas.width);
		}
		// anything in between -> move both the background and the player
		else {
			level.background.x -= player.xVelocity;
		}

	};

	newLevel.render = function () {
		// draw the background
		context.drawImage(backgroundImg, newLevel.background.x, newLevel.background.y);
	};

	backgroundImg.src = "imgs/background.png";

	return newLevel;
}