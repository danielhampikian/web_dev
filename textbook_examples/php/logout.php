<?php
session_start();

//we need to handle the case where a user logs out and a new user logs in from the same browser within 5 seconds, rare but the old players score will still be in cookie array
// 86400 = 1 day
// $cookie_name = 'score';
// $cookie_value = 0; //default score before login
// if(!isset($_COOKIE[$cookie_name])) {
//     echo "Cookie named '" . $cookie_name . "' is not set!";
//   } else {
//     echo "Cookie '" . $cookie_name . "' is set!<br>";
//     echo "Value is: " . $_COOKIE[$cookie_name];
//     // set the expiration date to one hour ago
//     setcookie($cookie_name, $cookie_value, time() - 3600);
//     echo"anything";
//     echo "New value is: " . $_COOKIE[$cookie_name];
//   }
  if(isset($_SESSION['username'])) {
    unset($_SESSION["validlogin"]);
    unset($_SESSION["username"]);
    unset($_SESSION["score"]);
    header("Location: game.php");
    exit;
}
?>