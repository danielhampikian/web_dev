<?php
session_start();

# make sure access_granted session is set and is true
# if access not granted, update status and direct back to log in page.
if (!isset($_SESSION["access_granted"]) || (isset($_SESSION["access_granted"]) && !$_SESSION["access_granted"]))
{
  $_SESSION["status"] = "You need to log in first";
  header("Location:login.php"); # redirect to login.php
  die;
}
?>

<html>
  <?php   
  $thisPage = "Granted";



  require_once('header.php');
  require_once('nav.php'); ?>




    <div class="content">
     <body>      
<a href="logout.php">Logout</a>
               

            <h1>Play games that teach you about logic and programing simultaneously</h1>  
            <h2>Instructors: login or create an account for your class</h2>
            <h2>Everyone else, enjoy the games!!!</h2>

            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="http://code.jquery.com/jquery-latest.js"></script>
            <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
            <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

  
  <!-- Simple click handler that accesses the elements via the button IDs and the div ID. -->
  <script>
    $(document).ready(function()
    {
      $("#hide").click(function()
      {
        $("#yoda").hide();
      });
      $("#show").click(function()
      {
        $("#yoda").show();
      });
    });
    
  </script>
</head>
<body>
<div id="yoda">
  <a href="random.php">
  <img src="profound2.jpg" alt="profound" title="To learn more of the Secrets of the Universe, click this picture" /></a>
</div>
<script> $("#yoda").hide(); 

function set_body_height()
{
    var wh = $(window).height();
    $('body').attr('style', 'height:' + wh + 'px;');
}
$(document).ready(function() {
    set_body_height();
    $(window).bind('resize', function() { set_body_height(); });
});

</script>

<button id="hide">Hide the Truth</button>
<button id="show">Show the Truth</button>

<!-- If the user's web browser is not JavaScript-enabled, then print a warning -->
<noscript>
<p class="error">Warning: This page requires JavaScript! Please visit this page with a JavaScript-enabled web browser. </p>
</noscript>

            



            
            
            <h3>And now, for something more academic:</h3>
            <a href="https://sites.google.com/site/danielhampikian/">
  <img  height: 1024 width: 768 src="academic_icon.jpeg" alt="Academic icon" title="Click the icon below if you're curious about me, or the meaning of life,
              or the nature of nonhuman minds. " /></a>
</div>
            
              
        </body>
  </div>
<?php
  require_once('footer.php');
?>