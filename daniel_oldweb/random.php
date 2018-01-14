<?php
  $thisPage = "Random";
  require_once('header.php');
  require_once('nav.php');
?>
  <div class="content">
     <body>  
      <div>
<h2> Keep clicking on the button for another random profound truth.  Multiple clicks may be rewarded... </h2>
</div>
      



<div>
<form>

<p>

<!-- the onClick calls our function newImage()-->

<input type="button" value="Click here for a random quote of ultimate enlightenment" onclick="newImage()" />

</p>

<div>
   <img src="profound.jpg" name="theImage" id="theImage" alt="Slide Show" width="50%" height="99%"align="center" float="left">
</div>

</form>
</div>
<script>

            currentIndx=0;

            MyImages=new Array();

            MyImages[0]='profound.jpg';

            MyImages[1]='profound2.jpg';

            MyImages[2]='profound3.jpg';

            MyImages[3]='profound4.jpg';

            MyImages[4]='profound5.jpg';

            MyImages[5]='profound6.jpg';




            imagesPreloaded = new Array(6)

            for (var i = 0; i < MyImages.length ; i++)

            {

            imagesPreloaded[i] = new Image(200,230)

            imagesPreloaded[i].src=MyImages[i]

            }

            function newImage() {

// Makes a random, whole number between 0 and 3

currentIndx=Math.round(Math.random()*6) //NOTE we'll have to change this soon

document.theImage.src=imagesPreloaded[currentIndx].src

}

//<body onload="newImage()">

            </script>




        </body>
  </div>
<?php
  require_once('footer.php');
?>