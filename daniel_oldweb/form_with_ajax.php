<?php
session_start();
require_once "Dao.php";

$dao = new Dao();
$score = $dao->getScore();
?>

<html>
  <head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript"></script>
    <!-- JQuery validation plugin (http://plugins.jquery.com/validation/) included from Microsoft CDN -->
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js"></script>
    <script src="js/ajax.js" type="text/javascript"></script>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
  </head>
  <body>
  

    <table id="Score">
      <thead>
        <tr><th>Comment</th><th>Created</th></tr>
      </thead>
      <tbody>
      <tr>
        <td> Score </td>
        <td><?php echo $score["score"]; ?></td>
      </tr>
      </tbody>
    </table>
  </body>
</html>
