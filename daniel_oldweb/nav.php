<body>
  <div id="header">
    <div class="text">
      <h1>The Games Of Philosophy </h1>
    </div>
  </div>
  <div id="navigation">
    <ul>
      <li <?php if($thisPage == "Home") { echo 'id="currentpage"'; } ?>><a href="index.php">Home</a></li>
      <li <?php if($thisPage == "Play Game") { echo 'id="currentpage"'; } ?>><a href="game.php">Games</a></li>
      <li <?php if($thisPage == "Stats") { echo 'id="currentpage"'; } ?>><a href="stats.php">Stats</a></li>
      <li <?php if($thisPage == "Class Stats") { echo 'id="currentpage"'; } ?>><a href="class_stats.php">Class Stats</a></li>
      <li <?php if($thisPage == "Edit Classes") { echo 'id="currentpage"'; } ?>><a href="edit_class.php">Edit Class</a></li>
      <li <?php if($thisPage == "Account Info") { echo 'id="currentpage"'; } ?>><a href="account_info.php">Account Info</a></li>
      <li <?php if($thisPage == "Create Account") { echo 'id="currentpage"'; } ?>><a href="create_account.php">Create Account</a></li>
      <li <?php if($thisPage == "Login") { echo 'id="currentpage"'; } ?>><a href="login.php">Login</a></li>
      <li <?php if($thisPage == "Granted") { echo 'id="currentpage"'; } ?>><a href="granted.php">Logged In</a></li>
      <li <?php if($thisPage == "BensPresent") { echo 'id="currentpage"'; } ?>><a href="bens_present.php">Home</a></li>
      <li <?php if($thisPage == "circleArray") { echo 'id="currentpage"'; } ?>><a href="circleArray.php">Home</a></li>
      <li <?php if($thisPage == "circleArray") { echo 'id="currentpage"'; } ?>><a href="video_webcam/index.html">Home</a></li>


    </ul>
  </div>

