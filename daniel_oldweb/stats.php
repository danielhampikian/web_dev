<?php
  $thisPage = "Stats";
  require_once('header.php');
  require_once('nav.php');
  require_once('Dao.php');
  try
{
  $dao = new Dao();
    $users = $dao->getUsers();
} catch (PDOException $e) {
  echo "<p>Failed to retrieve posts.</p>";
  # DO NOT PRINT EXCEPTION ERROR MESSAGE TO USER!!!! Why?
  die;
}
?>
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
