/**
 * Creates a random geometric object of food (for now)
 */
function setFoodShape() {
  var randgeom = empty[]
  var empty = [];
  // iterate through the grid and find all empty cells
  for (var x=0; x < grid.width; x++) {
    for (var y=0; y < grid.height; y++) {
      if (grid.get(x, y) === EMPTY) {
        empty.push({x:x, y:y});
      }
    }
  }
  // go through stack
  for (var x= 0; x<grid.width; x++) {
  //get a random element
  if (DIFFICULTY>0) {
  var randpos = empty[Math.round(Math.random()*(empty.length - 1))];
  //set that element to FRUIT
  grid.set(FRUIT, randpos.x, randpos.y);
}
}
}