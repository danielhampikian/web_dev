<?php
  $thisPage = "Play Black Holes";
  
  require_once('header.php');
  require_once('nav.php');
?>
<div class="content">
	<body>
		<div>
			<p>
				<h2> Practice your VIM skills by trying to get to the green fruit without running into a black hole!</h2>
				<h2> Just like in a VIM editer: "h" moves left, "j" moves down, "k" moves up, "l" moves left </h2>
        <h3> Watch out: the red squares will bounce you!!! </h3>


</p>
</div>


<div #canvas>
<script>

//TODO: refactor, break into small functions and classes, come up with some test code, 
//      figure out bug where it crashes when enemy hits a wall sometimes,
//      set up scoring system and mini game make arrows not move (switch to different controls?)
var
/**
 * Constants
 */
COLS = 26,
ROWS = 26,
EMPTY = 0,
SNAKE = 1,
ENEMY = 9,
FRUIT = 2,
LAVA = 3,
WATER = 4,
OBSTACLE = 5,
LEFT  = 0,
UP    = 1,
RIGHT = 2,
DOWN  = 3,
NONE = 4,
KEY_LEFT  = 72,
KEY_UP    = 75,
KEY_RIGHT = 76,
KEY_DOWN  = 74,
DIFFICULTY = 3,
/**
 * Game objects
 */
canvas,   /* HTMLCanvas */
ctx,    /* CanvasRenderingContext2d */
keystate, /* Object, used for keyboard inputs */
frames,   /* number, used for animation */
score;    /* number, keep track of the player score */
/**
 * Grid datastructor, usefull in games where the game world is
 * confined in absolute sized chunks of data or information.
 * 
 * @type {Object}
 */
grid = {
  width: null,  /* number, the number of columns */
  height: null, /* number, the number of rows */
  _grid: null,  /* Array<any>, data representation */
  /**
   * Initiate and fill a c x r grid with the value of d
   * @param  {any}    d default value to fill with
   * @param  {number} c number of columns
   * @param  {number} r number of rows
   */
  init: function(d, c, r) {
    this.width = c;
    this.height = r;
    this._grid = [];
    for (var x=0; x < c; x++) {
      this._grid.push([]);
      for (var y=0; y < r; y++) {
        this._grid[x].push(d);
      }
    }
  },
  /**
   * Set the value of the grid cell at (x, y)
   * 
   * @param {any}    val what to set
   * @param {number} x   the x-coordinate
   * @param {number} y   the y-coordinate
   */
  set: function(val, x, y) {
    this._grid[x][y] = val;
  },
  /**
   * Get the value of the cell at (x, y)
   * 
   * @param  {number} x the x-coordinate
   * @param  {number} y the y-coordinate
   * @return {any}   the value at the cell
   */
  get: function(x, y) {
    return this._grid[x][y];
  }
}
/**
 * The snake, works as a queue (FIFO, first in first out) of data
 * with all the current positions in the grid with the snake id
 * 
 * @type {Object}
 */
snake = {
  direction: null, /* number, the direction */
  last: null,    /* Object, pointer to the last element in
            the queue */
  _queue: null,  /* Array<number>, data representation*/
  /**
   * Clears the queue and sets the start position and direction
   * 
   * @param  {number} d start direction
   * @param  {number} x start x-coordinate
   * @param  {number} y start y-coordinate
   */
  init: function(d, x, y) {
    this.direction = d;
    this._queue = [];
    this.insert(x, y);
  },
  /**
   * Adds an element to the queue
   * 
   * @param  {number} x x-coordinate
   * @param  {number} y y-coordinate
   */
  insert: function(x, y) {
    // unshift prepends an element to an array
    this._queue.unshift({x:x, y:y});
    this.last = this._queue[0];
  },
  /**
   * Removes and returns the first element in the queue.
   * 
   * @return {Object} the first element
   */
  remove: function() {
    // pop returns the last element of an array
    return this._queue.pop();
  }
};


enemy = {
  direction: null, /* number, the direction */
  last: null,    /* Object, pointer to the last element in
            the queue */
  _queue: null,  /* Array<number>, data representation*/
  
  init: function(d, x, y) {
    this.direction = d;
    this._queue = [];
    this.insert(x, y);
  },

  insert: function(x, y) {
    // unshift prepends an element to an array
    this._queue.unshift({x:x, y:y});
    this.last = this._queue[0];
  },

  remove: function() {
    // pop returns the last element of an array
    return this._queue.pop();
  }
};

get_random_direction = function() {
  var direction = Math.round(Math.random()*4);
   switch (direction) {
      case 1:
        return LEFT;
        break;
      case 2:
        return RIGHT;
        break;
      case 3:
        return DOWN;
        break;
      case 4:
        return UP;
        break;
}
}

reverse_direction = function(snake_for_direction) {
  var snake = snake_for_direction;
  switch (snake.direction) {
      case LEFT:
        snake.direction = RIGHT;
        break;
      case UP:
        snake.direction = DOWN;
        break;
      case RIGHT:
        snake.direction = LEFT;
        break;
      case DOWN:
        snake.direction = UP;
        break;
    
}

}

get_random_empty = function() {
var empty = [];
  // iterate through the grid and find all empty cells
  for (var x=1; x < grid.width-1; x++) {
    for (var y=1; y < grid.height-1; y++) {
      if (grid.get(x, y) === EMPTY) {
        empty.push({x:x, y:y});
      }
    }
  }
  // chooses a random cell
  var randpos = empty[Math.round(Math.random()*(empty.length - 1))];
return randpos;
}
/**
 * Set a food id at a random free cell in the grid
 */
function setFood() {
  var empty = [];
  // iterate through the grid and find all empty cells
  for (var x=0; x < grid.width; x++) {
    for (var y=0; y < grid.height; y++) {
      if (grid.get(x, y) === EMPTY) {
        empty.push({x:x, y:y});
      }
    }
  }
  // chooses a random cell
  var randpos = empty[Math.round(Math.random()*(empty.length - 1))];
  grid.set(FRUIT, randpos.x, randpos.y);
}

/**
 * Creates a random geometric object of food (for now)
 */
function setFoodShapes(DIFFICULTY, envo) {
  var empty = [];
  var envo = envo;
  // iterate through the grid and find all empty cells
  for (var x=0; x < grid.width; x++) {
    for (var y=0; y < grid.height; y++) {
      if (grid.get(x, y) === EMPTY) {
        empty.push({x:x, y:y});
      }
    } 
  }
  // go through stack
  for (var y = 0; y<DIFFICULTY; y++) {
  for (var x= 0; x<grid.width; x++) {
  var randpos = empty[Math.round(Math.random()*(empty.length - 1))];
  //set that element to FRUIT
  grid.set(envo, randpos.x, randpos.y);
  setFoodShapes();
}
}
}

function outlineGrid() {
  for (var y = 0; y<grid.height; y++) {
  for (var x= 0; x<grid.width; x++) {
  if (x === 0|| y === 0 || x === grid.width-1) {
    grid.set(OBSTACLE, x, y);
  }
  if (y === grid.height-1) {
    grid.set(OBSTACLE, x, y);
  }
}
}
}
/**
 * Dynamic gameplay start
 */
function main() {
  // create and initiate the canvas element
  canvas = document.createElement("canvas");
  canvas.width = COLS*20;
  canvas.height = ROWS*20;
  ctx = canvas.getContext("2d");
  // add the canvas element to the body of the document
  document.body.appendChild(canvas);
  // sets an base font for bigger score display
  ctx.font = "12px Helvetica";
  frames = 0;
  keystate = {};
  // keeps track of the keybourd input
  document.addEventListener("keydown", function(evt) {
    keystate[evt.keyCode] = true;
  });
  document.addEventListener("keyup", function(evt) {
    delete keystate[evt.keyCode];
  });
  // intatiate game objects and starts the game loop
  init();
  loop();
}
/**
 * Resets and inits game objects
 */
function init() {
  score = 0;
  grid.init(EMPTY, COLS, ROWS);
  var sp = {x:Math.floor(COLS/2), y:ROWS-1};
  var randpos = get_random_empty();
  var randdir = get_random_direction();



//  setFoodShapes(DIFFICULTY, FRUIT);
  setFoodShapes(DIFFICULTY, LAVA);
//  setFoodShapes(DIFFICULTY, WATER);
  setFoodShapes(DIFFICULTY, OBSTACLE);
  outlineGrid();
  setFood();
  snake.init(randdir, randpos.x, randpos.y);
  grid.set(SNAKE, randpos.x, randpos.y);

  randpos = get_random_empty();
  randdir = get_random_direction
  enemy.init(randdir, randpos.x, randpos.y);
  grid.set(ENEMY, randpos.x, randpos.y)

  
}

/**
 * The game loop function, used for game updates and rendering
 */
function loop() {
  update();
  draw();
  // When ready to redraw the canvas call the loop function
  // first. Runs about 60 frames a second
  window.requestAnimationFrame(loop, canvas);
}

/**
 * Updates the game logic
 */
function update() {
  frames++;
  // changing direction of the snake depending on which keys
  // that are pressed
  if (keystate[KEY_LEFT]) {
    snake.direction = LEFT;
  }
  if (keystate[KEY_UP]) {
    snake.direction = UP;
  }
  if (keystate[KEY_RIGHT]) {
    snake.direction = RIGHT;
  }
  if (keystate[KEY_DOWN]) {
    snake.direction = DOWN;
  }
  // each five frames update the game state.
  if (frames%5 === 0) {
    // pop the last element from the snake queue i.e. the
    // head
    var nx = snake.last.x;
    var ny = snake.last.y;
    // updates the position depending on the snake direction
    switch (snake.direction) {
      case LEFT:
        nx--;
        break;
      case UP:
        ny--;
        break;
      case RIGHT:
        nx++;
        break;
      case DOWN:
        ny++;
        break;
      case NONE:
        break;
    }
    // checks all gameover conditions
    // if (0 > nx || nx > grid.width-1  ||
    //   0 > ny || ny > grid.height-1 ||
    //   grid.get(nx, ny) === SNAKE
    // ) {
    //   return init();
    // }


    // bounces off walls
    if (1 > nx) {
      snake.direction = RIGHT;
    }

    if (nx > grid.width-2) {
      snake.direction = LEFT;
    }

    if (1 > ny) {
      snake.direction = DOWN;
    }

    if (ny > grid.height-2)  {
      snake.direction = UP;
    }
    
    if (grid.get(nx, ny)===OBSTACLE) {
      grid.set(OBSTACLE, nx, ny);
      snake.direction=NONE;
      grid.set(OBSTACLE, nx, ny);
    }
    else if (grid.get(nx, ny)===WATER) {
      snake.direction=NONE;
      grid.set(WATER, nx, ny);
    }
    else if (grid.get(nx, ny) === LAVA) {
      //make the tail more lava or poison or whatever
      grid.set(LAVA, nx, ny);
      reverse_direction(snake);
    }
    else if (grid.get(nx, ny) === FRUIT) {
      //make the tail more lava or poison or whatever
      score++;
      grid.set(EMPTY, nx, ny);
      setFood();
    }
    else if (grid.get(nx, ny) === ENEMY) {
      //make the tail more lava or poison or whatever
      score--;
      init();
    }

    else {
      // take out the first item from the snake queue i.e
      // the tail and remove id from grid - skipping this will result in 
      // the snake growing
      var tail = snake.remove();
      
      grid.set(EMPTY, tail.x, tail.y);
    // add a snake id at the new position and append it to 
    // the snake queue
    grid.set(SNAKE, nx, ny);
    snake.insert(nx, ny);
  }
}

    var enx = enemy.last.x;
    var eny = enemy.last.y;



    // pop the last element from the snake queue i.e. the
    // head

    // updates the position depending on the snake direction
    // enemy.direction = get_random_direction
    
    switch (enemy.direction) {
      case LEFT:
        enx--;
        break;
      case UP:
        eny--;
        break;
      case RIGHT:
        enx++;
        break;
      case DOWN:
        eny++;
        break;
    
}
    // checks all gameover conditions
    // if (0 > nx || nx > grid.width-1  ||
    //   0 > ny || ny > grid.height-1 ||
    //   grid.get(nx, ny) === SNAKE
    // ) {
    //   return init();
    // }
if ((frames%45===0)&&(1 <= enx)&&(enx <= grid.width-2)&&(1 <= eny)&&(eny <= grid.height-2)){
    enemy.direction = get_random_direction();
  }
  
  // each five frames update the game state.
    if (frames%5 === 0) {

    // bounces off walls
    if (2 > enx) {
      enemy.direction = RIGHT;
    }

    if (enx > grid.width-3) {
      enemy.direction = LEFT;
    }

    if (2 > eny) {
      enemy.direction = DOWN;
    }

    if (eny > grid.height-3)  {
      enemy.direction = UP;
    }
    if (grid.get(enx, eny)===OBSTACLE) {
      reverse_direction(enemy);
      grid.set(ENEMY, enx, eny);
    }
    else if (grid.get(enx, eny)===WATER) {
      reverse_direction(enemy);
      grid.set(ENEMY, enx, eny);
    }
    else if (grid.get(enx, eny) === LAVA) {
      reverse_direction(enemy);
      grid.set(ENEMY, enx, eny);
    }
    else if (grid.get(enx, eny) === FRUIT) {
      reverse_direction(enemy);
      grid.set(EMPTY, enx, eny);
      setFood();
      score--;
    }
   
   else {
    
    // check wheter the new position are on the fruit item
    // if (grid.get(enx, eny) === FRUIT || grid.get(enx, eny) === ENEMY) {
      // increment the score and sets a new fruit position
      // score++;
      // setFood();
    // } else {   }
      // take out the first item from the snake queue i.e
      // the tail and remove id from grid - skipping this will result in 
      // the snake growing
      var e_tail = enemy.remove();
      grid.set(EMPTY, e_tail.x, e_tail.y);
    // add a snake id at the new position and append it to 
    // the snake queue
    grid.set(ENEMY, enx, eny);
    enemy.insert(enx, eny);
  }
}

}
/**
 * Render the grid to the canvas.
 */
function draw() {
  // calculate tile-width and -height
  var tw = canvas.width/grid.width;
  var th = canvas.height/grid.height;
  // iterate through the grid and draw all cells
  for (var x=0; x < grid.width; x++) {
    for (var y=0; y < grid.height; y++) {
      // sets the fillstyle depending on the id of
      // each cell
      switch (grid.get(x, y)) {
        case EMPTY:
          ctx.fillStyle = "#fff";
          break;
        case SNAKE:
          ctx.fillStyle = "#0ff";
          break;
        case FRUIT:
          ctx.fillStyle = "#7f7";
          break;
        case LAVA:
          ctx.fillStyle = "#f00";
          break;
        case WATER:
          ctx.fillStyle = "#128";
          break;
        case OBSTACLE:
          ctx.fillStyle = "#666";
          break;
        case ENEMY:
          ctx.fillStyle = "#000";
          break;
      }
      ctx.fillRect(x*tw, y*th, tw, th);
    }
  }
  // changes the fillstyle once more and draws the score
  // message to the canvas
  ctx.fillStyle = "#000";
  ctx.fillText("SCORE: " + score, 10, canvas.height-6);

}
// start and run the game
main();
</script>
</div>
</body>
</div>

<?php
  require_once('footer.php');
?>
