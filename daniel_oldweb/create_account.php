<?php
  session_start();


$email = isset($_SESSION['email_preset']) ? $_SESSION['email_preset'] : "";

$errorEmail = $errorPassword = "";
$errorUsername = "";

if (isset($_SESSION['error_email']))
{
  $errorEmail = $_SESSION['error_email'];
  unset($_SESSION['error_email']);
}
if(isset($_SESSION['error_password']))
{
  $errorPassword = $_SESSION['error_password'];
  unset($_SESSION['error_password']);
}
if(isset($_SESSION['error_username']))
{
  $errorUsername = $_SESSION['error_username'];
  unset($_SESSION['error_username']);
}

# Get the status variable (if any).
$status = "";
if(isset($_SESSION['status']))
{
  $status = $_SESSION['status'];
  unset($_SESSION['status']);
}
?>


<html>
  <?php   
  $thisPage = "Create Account";
  require_once('header.php');
  require_once('nav.php'); ?>
  <body>
    <div class="content">
    <h1>User Login </h1>
    <div id="status"> <?= $status; ?></div>
  
  <form action="handler.php" method="POST">
    <div>
      <label for="email">Email</label>
      <input type="text" name="email" id="email" value="<?= $email; ?>"/>
      <span class="error" id="errorEmail">
      <?= $errorEmail; ?>
      </span>
    </div>
    <div>
      <label for="password">Password</label>
      <input type="password" name="password" id="password" value=""/>
      <span class="error" id="errorPassword">
        <?= $errorPassword; ?>
      </span>
    </div>
    <div>
      <label for="username">Username</label>
      <input type="text" name="username" id="username" value=""/>
      <span class="error" id="errorUsername">
        <?= $errorUsername; ?>
      </span>
    </div>

    <div>
      <input type="submit" name="login_submit_button" id="login" value="Submit"/>
    </div>
  </form>
  </div>
  </body>
  <?php
  require_once('footer.php');
?>
</html>