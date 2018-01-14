<?php
session_start();

$errorClassid = $errorUsername = "";
$username = isset($_SESSION['username_preset']) ? $_SESSION['username_preset'] : "";
$classid = "";

# make sure access_granted session is set and is true
# if access not granted, update status and direct back to log in page.
if (!isset($_SESSION["access_granted"]) || (isset($_SESSION["access_granted"]) && !$_SESSION["access_granted"]))
{
  $_SESSION["status"] = "You need to log in first";
  header("Location:login.php"); # redirect to login.php
  die;
}
if(isset($_SESSION['error_username']))
{
  $errorUsername = $_SESSION['error_username'];
  unset($_SESSION['error_username']);
}
if(isset($_SESSION['error_classid']))
{
  $errorClassid = $_SESSION['error_classid'];
  unset($_SESSION['error_classid']);
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
  $thisPage = "Edit Class";
  require_once('header.php');
  require_once('nav.php'); ?>
  <body>

    <div class="content">
    <h1>Create Class</h1>
    <div id="status"> <?= $status; ?></div>

  
  <form action="class_handler.php" method="POST">
    <div>
      <label for="username">Your Username:</label>
      <input type="text" name="username" id="username" value="<?= $username; ?>"/>
      <span class="error" id="errorUsername">
      <?= $errorUsername; ?>
      </span>
    <div>
      <label for="classid">New Class Name:</label>
      <input type="text" name="classid" id="classid" value="<?= $classid; ?>"/>
      <span class="error" id="errorClassid">
        <?= $errorClassid; ?>
      </span>
    </div>

    <div>
      <input type="submit" name="class_submit_button" id="class" value="Submit"/>
    </div>
  </form>

<h1>Add Student To Class</h1>
  <form action="class_handler.php" method="POST">
    <div>
      <label for="username">Student User Name:</label>
      <input type="text" name="username" id="username" value="<?= $username; ?>"/>
      <span class="error" id="errorUsername">
      <?= $errorUsername; ?>
      </span>
    <div>
      <label for="classid">Class Name:</label>
      <input type="text" name="classid" id="classid" value="<?= $classid; ?>"/>
      <span class="error" id="errorClassid">
        <?= $errorClassid; ?>
      </span>
    </div>

    <div>
      <input type="submit" name="class_submit_button" id="class" value="Submit"/>
    </div>
  </form>
</div>
</div>
</body>

<?php
  require_once('footer.php');
?>
</html>