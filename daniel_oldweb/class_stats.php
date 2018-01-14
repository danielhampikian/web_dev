<?php
session_start();

$errorClassid = "";
$classid = "";
  $thisPage = "Class Stats";
  require_once('header.php');
  require_once('nav.php');
  require_once('Dao.php');

$status = "";
if(isset($_SESSION['status']))
{
  $status = $_SESSION['status'];
  unset($_SESSION['status']);
}
try
{
  $dao = new Dao();

  if(isset($_POST['classid']))
  {
    $classid = filter_var($_POST['classid'], FILTER_SANITIZE_STRING);
    $users = $dao->filterByClass($classid);
  }
  else {
    $users = $dao->getUsers();
} 
}catch (PDOException $e) {
  echo "<p>Failed to retrieve users.</p>";
  # DO NOT PRINT EXCEPTION ERROR MESSAGE TO USER!!!! Why?
  die;
}
if(isset($_SESSION['class']))
{
  $users = $_SESSION['class'];
  unset($_SESSION['class']);
}
 
?>
<div class="content">
    <h1>Get Class Stats</h1>
    <div id="status"> <?= $status; ?></div>

  
  <form action="class_stats_handler.php" method="POST">
    <div>
      <label for="classid">Enter Class Name:</label>
      <input type="text" name="classid" id="classid" value="<?= $classid; ?>"/>
      <span class="error" id="errorClassid">
        <?= $errorClassid; ?>
      </span>
    </div>

    <div>
      <input type="submit" name="class_submit_button" id="class" value="Submit"/>
    </div>
  </form>

  <div class="content">
    <h1>All Rankings:</h1>

    <table>
    <thead>
      <tr><th> Ranking </th><th> User Name </th><th> Top Score </th></tr>
    </thead>
    <tbody>
      <?php 
      $i = 1;
      foreach($users as $user) { 
        ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><?= $user['user_name']; ?></td>
        <td><?= $user['high_score']; ?></td>
      </tr>
    <?php } ?>
    </tbody>
  </table>


  </div>
<?php
  require_once('footer.php');
?>