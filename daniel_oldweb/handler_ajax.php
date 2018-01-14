<?php
  require_once('Dao.php');
  session_start();
  $data = array(); # What we will pass back.
  $user = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : "";

  # Validate (and sanitize) arguments before trying to save.
  # NOTE: You would want to validate and sanitize everything before
  # adding to the database. We don't show this here.
  # This is a simplified example and does not demonstrate good
  # data handling..
  if(isset($_POST['score'])) {
      $data['score'] = 'score';
  }
    // if data is validated, add comment to the database and to the data
    // array so we can display it on the page without refreshing.
    try
    {
      $dao = new Dao();
      $dao->udpateScore($user, $_POST['score']);
      $data['status'] = 'success';
    }
    catch (PDOException $e) {
      $data['status'] = 'error';
      $data['message'] = 'Please try again later. Something is not right.';
    }
  // specify that we are returning JSON
  header('Content-Type: application/json');
  echo json_encode($data);
?>
