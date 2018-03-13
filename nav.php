<div id="nav">   
<div class="navigation_bar">
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li <?php if($thisPage == "home") { echo 'id="currentpage"'; } ?>><a href="http://www.danielhampikian.com/index.php">Home</a></li>
			  
			  
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">GIMM 300 <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li <?php if($thisPage == "gimm_home") { echo 'id="currentpage"'; } ?>> <a href="http://www.danielhampikian.com/gimm_class_prep/index.php" > GIMM Home </a> </li>
				<li <?php if($thisPage == "command_line") { echo 'id="currentpage"'; } ?>> <a href="http://danielhampikian.com/gimm/coding_resources/command_line.php" > SCP</a> </li>
 
              </ul>
            </li> <!--dropdown -->
			  
			  
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Websites<span class="caret"></span></a>
              <ul class="dropdown-menu">
                 <li <?php if($thisPage == "wp") { echo 'id="currentpage"'; } ?>><a href="http://www.danielhampikian.com/wordpress">Wordpress</a></li>
				  <li <?php if($thisPage == "exp") { echo 'id="currentpage"'; } ?>><a href="http://www.danielhampikian.com/experimental">Template Website</a></li>
             <li <?php if($thisPage == "old") { echo 'id="currentpage"'; } ?>><a href="http://www.danielhampikian.com/daniel_oldweb/">Sandox Website</a></li>
             <li <?php if($thisPage == "phil") { echo 'id="currentpage"'; } ?>> <a href="https://sites.google.com/site/danielhampikian/">GoogleSite Website</a></li>
 
              </ul>
            </li> <!--dropdown -->
            
            
			  
			 <li <?php if($thisPage == "games") { echo 'id="currentpage"'; } ?>><a href="http://www.danielhampikian.com/games">Games</a></li>
			  
			  <li <?php if($thisPage == "games") { echo 'id="currentpage"'; } ?>><a href="http://www.danielhampikian.com/songs">Songs</a></li>
			  
             
            
        </div><!--/.nav-collapse -->
      </div>
    </nav>    
  </div>
</div>
