<?php
  $thisPage = "Account Info";
  require_once('header.php');
  require_once('nav.php');
?>
<div class="content">

<div>
	<p>Recover Password</p>
    <p>Email: <input type="text" name="new_name"> </p>
    <p><input type="submit" name="login_submit_button"></p>
 </div>

<form method="post" action="form_post_handler.php" >
  <div>
    <p>Current User Name: <input type="text" name="current_name"> </p>
    <p>New User Name: <input type="text" name="new_name"> </p>
    <p><input type="submit" name="login_submit_button"></p>

  </div>
</form>

<form method="post" action="form_post_handler.php" >
  <div>
    <p>Current Password: <input type="text" name="current_password"> </p>
    <p>New Password: <input type="text" name="new_password"> </p>
    <p><input type="submit" name="login_submit_button"></p>

  </div>
</form>

</div>



<?php
  require_once('footer.php');
?>