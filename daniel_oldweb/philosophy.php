
<?php
session_start();
require_once "Dao.php";

$dao = new Dao();
// $user = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : "";
// $score = $dao->getScore($user, "default");
$thisPage = "Play Philosophy";
$score = 0;

  require_once('header.php');
  require_once('nav.php');
?>
<div class="content">
  <body>
    <div>
      <p>
        <h2> Using the VIM keys help Rocky the Psychic dog to move the green block with the power of his mind to the other side of the screen before the Evil Computer Cat Pyschic moves the black box to your side. </h2>
        <h2> Just like in a VIM editer: "h" moves left, "j" moves down, "k" moves up, "l" moves left </h2>
        <h3> Be careful: blue squares teleport you and red squares bounce you!!!</h3>


</p>
</div>
<div>
<audio controls="controls"><source src="purity.mp3" type="audio/mpeg" /></audio>
</div>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<p>Score:</p>
<progress id ="exp_bar" value="0" max="100"></progress><br>
<button class="btn">+1</button> -->


<div #canvas>
<script>

//TODO: refactor, break into small functions and classes, come up with some test code, 
//      figure out bug where it crashes when enemy hits a wall sometimes,
//      set up scoring system and mini game make arrows not move (switch to different controls?)
var


/**
 * Constats
 */
COLS = 26,
ROWS = 26,
EMPTY = 0,
ROCKY = 1,
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
DIFFICULTY = 1,
/**
 * Game objects
 */
canvas,   /* HTMLCanvas */
ctx,    /* CanvasRenderingContext2d */
keystate, /* Object, used for keyboard inputs */
frames,   /* number, used for animation */
rockImage1, /*image of rocky */
score;    /* number, keep track of the player score */





/**
*
* Connect to database from within javascript so I can update the score
*
**/




// var connection = new ActiveXObject("ADODB.Connection") ;

// var connectionstring="Data Source=<server>;Initial Catalog=<catalog>;User ID=<user>;Password=<password>;Provider=SQLOLEDB";

// connection.Open(connectionstring);
// var rs = new ActiveXObject("ADODB.Recordset");

// rs.Open("SELECT * FROM table", connection);
// rs.MoveFirst
// while(!rs.eof)
// {
//    document.write(rs.fields(1));
//    rs.movenext;
// }

// rs.close;
// connection.close;

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
 * The rocky
 * 
 * @type {Object}
 */
rocky = {
  
 /*sets the start position and direction
   * 
   * @param  {number} d start direction
   * @param  {number} x start x-coordinate
   * @param  {number} y start y-coordinate
   */
  init: function(d, x, y) {
    this.direction = d;
    this.x = x;
    this.y = y;
  }
};


enemy = {
  init: function(d, x, y) {
    this.direction = d;
    this.x = x;
    this.y = y;
  }
};


get_random_direction = function() {
  var direction = Math.round(Math.random()*3);
   switch (direction) {
      case 1:
        return LEFT;
        break;
      case 2:
        return RIGHT;
        break;
      case 3:
        return UP;
        break;
}
}

reverse_direction = function(rocky_for_direction) {
  var rocky = rocky_for_direction;
  switch (rocky.direction) {
      case LEFT:
        rocky.direction = RIGHT;
        break;
      case UP:
        rocky.direction = DOWN;
        break;
      case RIGHT:
        rocky.direction = LEFT;
        break;
      case DOWN:
        rocky.direction = UP;
        break;
    
}

}

get_random_empty = function() {
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
return randpos;
}
/**
 * Set you at a random water
 */


 get_random_water = function() {
var water = [];
  // iterate through the grid and find all empty cells
  for (var x=0; x < grid.width; x++) {
    for (var y=0; y < grid.height; y++) {
      if (grid.get(x, y) === WATER) {
        water.push({x:x, y:y});
      }
    }
  }
  // chooses a random cell
  var randpos = water[Math.round(Math.random()*(water.length - 1))];
return randpos;
}


/**
 * Creates a random geometric object of food (for now)
 */
function setObstacles(DIFFICULTY, envo) {
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
  setObstacles();
}
}
}

    rockImage1 = new Image(); //load up the image
    rockImage1.onload = (function (){
    ctx.drawImage(rockImage1, rocky.x, rocky.y);
    }); 
    rockImage1.src = "images/rock.png";



  // intatiate game objects and starts the game loop
  //TO DO put some controls in here
 


function outlineGrid() {
  for (var y = 0; y<grid.height; y++) {
  for (var x= 0; x<grid.width; x++) {
  if (x === 0|| y === 0 || x === grid.width-1) {
    grid.set(OBSTACLE, x, y);
  }
  if (y === grid.height-1) {
    grid.set(FRUIT, x, y);
  }
}
}
}
/**
 * Resets and inits game objects
 */
function init() {

  
  grid.init(EMPTY, COLS, ROWS);
  var sp = {x:Math.floor(COLS/2), y:ROWS-1};
  var randdir = get_random_direction();

  //setObstacles(DIFFICULTY, FRUIT);
  setObstacles(DIFFICULTY, LAVA);
  setObstacles(DIFFICULTY, WATER);
  setObstacles(DIFFICULTY, OBSTACLE);
  outlineGrid();

  rocky.init(randdir, grid.width/2, 1);
  grid.set(ROCKY, grid.width/2, 1);

  enemy.init(randdir, grid.width/2, grid.height-2);
  grid.set(ENEMY, grid.width/2, grid.height-2);




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
  // changing direction of the rocky depending on which keys
  // that are pressed
  if (keystate[KEY_LEFT]) {
    rocky.direction = LEFT;
  }
  if (keystate[KEY_UP]) {
    rocky.direction = UP;
  }
  if (keystate[KEY_RIGHT]) {
    rocky.direction = RIGHT;
  }
  if (keystate[KEY_DOWN]) {
    rocky.direction = DOWN;
  }
  // each five frames update the game state.
  if (frames%15 === 0) {
    var nx = rocky.x;
    var ny = rocky.y;
    // updates the position depending on the rocky direction
    switch (rocky.direction) {
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
    //REMEMBER, NOW NX or NY will have a value DIFFERENT
    //FROM rocky.x OR rocky.y.  No need for a queue anymore
    //checks you win gameover condition
    if (
      ny > grid.height-2
    ) {
      //give gameover play again canvas
      score++;
      return init();
    }


    // bounces off walls
    if (1 > nx) {
      rocky.x = 1;
      rocky.direction = RIGHT;
      return;
    }

    if (nx > grid.width-1) {
      rocky.direction = LEFT;
      return;
    }

    if ( 1 > ny) {
      rocky.y = 1;
      rocky.direction = DOWN;
      return;
    }
    
    if (grid.get(nx, ny)===OBSTACLE) {
      grid.set(OBSTACLE, nx, ny);
      rocky.direction=NONE;
      
    }
    else if (grid.get(nx, ny)===WATER) {
      var random_water = get_random_water();
      grid.set(EMPTY, rocky.x, rocky.y);
      rocky.x=random_water.x;
      rocky.y=random_water.y;
      grid.set(ROCKY, rocky.x, rocky.y);
      rocky.direction=get_random_direction();
      
    }
    else if (grid.get(nx, ny) === LAVA) {
      //make the tail more lava or poison or whatever
      
      reverse_direction(rocky);
    }
    else if (grid.get(nx, ny) === FRUIT) {
      //make the tail more lava or poison or whatever
      score++;
    }
    else if (grid.get(nx, ny) === ENEMY) {
      //if you run into the enemy you die
      score--;
      init();
    }

    else {
      // take out the first item from the rocky queue i.e
      // the tail and remove id from grid - skipping this will result in 
      // the rocky growing
  
    grid.set(EMPTY, rocky.x, rocky.y);
    // add a rocky id at the new position and append it to 
    // the rocky queue
    rocky.x = nx;
    rocky.y = ny;
    grid.set(ROCKY, nx, ny);

  }
}

    var enx = enemy.x;
    var eny = enemy.y;
    //sets the enemy direction randomly for now, this is the exent of the AI, checks all boundries conditions first
  // if ((frames%45===0)&&(enx > 2)&&(enx < grid.width-2)&&(eny>2)){
  //   enemy.direction = get_random_direction();
  // }
  
  // each five frames update the game state.
    if ((frames%45===0)&&(1 <= enx)&&(enx <= grid.width-2)&&(1 <= eny)&&(eny <= grid.height-2)){
    enemy.direction = get_random_direction();
  }
  
  // each five frames update the game state.
    if (frames%5 === 0) {

    // pop the last element from the rocky queue i.e. the
    // head

    // updates the position depending on the rocky direction
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
    //checks enemy wins gameover condition
    if (eny < 2 )
     {
      score--;
      return init();
    }


    // bounces off walls
    if (1 > enx) {
      enemy.direction = RIGHT;
    }

    if (enx > grid.width-2) {
      enemy.direction = LEFT;
    }

    if (eny > grid.height-2) {
      enemy.direction = UP;
    }

    if (grid.get(enx, eny)===OBSTACLE) {
    enemy.direction = get_random_direction;
    }
    else if (grid.get(enx, eny)===WATER) {
      enemy.direction = get_random_direction;
      grid.set(ENEMY, enx, eny);
    }
    else if (grid.get(enx, eny) === LAVA) {
      enemy.direction = get_random_direction;
      grid.set(ENEMY, enx, eny);
    }
   
   else {
    
    // check wheter the new position are on the fruit item
    // if (grid.get(enx, eny) === FRUIT || grid.get(enx, eny) === ENEMY) {
      // increment the score and sets a new fruit position
      // score++;
      // setFood();
    // } else {   }
      // take out the first item from the rocky queue i.e
      // the tail and remove id from grid - skipping this will result in 
      // the rocky growing
    // add a rocky id at the new position and append it to 
    // the rocky queue
    grid.set(EMPTY, enemy.x, enemy.y);
    enemy.x = enx;
    enemy.y = eny;
    grid.set(ENEMY, enx, eny);

   
  }
}

}

/**draw an image of rocky onto the canvas at the position of the obstacles
* TODO: Fix the tracking being slow so you don't have to approximate with the 19
**/

function drawRock() {
    x = rocky.x;
    y = rocky.y;
    ctx.drawImage(rockImage1, x, y);
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
        case ENEMY: 
        ctx.fillStyle = "#000";
          break;
        case EMPTY:
          ctx.fillStyle = "#fff";
          break;
        case ROCKY:
        ctx.fillStyle = "#090";
        drawRock();
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
      }
      ctx.fillRect(x*tw, y*th, tw, th);
    }
  }
  // loads an image and draws it
    
    
    


  // changes the fillstyle once more and draws the score
  // message to the canvas
  ctx.fillStyle = "#000";
  ctx.fillText("SCORE: " + score, 50, canvas.height-6);

}
    
  
    

/**
 * Dynamic gameplay start
 */
function main() {
  // create and initiate the canvas element
  score = 0;
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
  init();
  loop();
}
// start and run the game
main();
</script>
</div>
</body>
</div>

<div style="width:300px;height:300px;overflow:hidden;"align="middle">
   <img src="cat.jpeg" width="300px" height="auto"align="middle">
</div>

<?php
  require_once('footer.php');
?>
