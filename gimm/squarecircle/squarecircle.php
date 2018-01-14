<!doctype html>
<html lang="en">
<?php
  $thisPage = "square_circle";
  require_once('../../header.php');
  require_once('../../nav.php');
?>
<script src="http://www.danielhampikian.com/js/squarecircle.js" type="text/javascript"></script>

<body id="breakB">
  

<h1> A Simple Graphics, Buttons, and Random Function JS Example </h1>
<div id="elementarea"></div>

<div>
  <button id="addS">Add Square</button>
   <button id="addC">Add Circle</button>
  <button id="colors">Change Colors</button>
<button id="clear">Clear Shapes</button>
<button id="break">Break Website</button>	
</div>
<div class="text-center"> 
<p>Click a square or Circle to move it to the front. Click again to delete it.</p>
<p>Play around with the integers that determine random values in squarecircle.js to change the size, dimensions, and number of squares and circles </p>
	</div>
<?php
	require_once('../../footer.php');
	?>
