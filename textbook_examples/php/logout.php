<?php
session_start();
if(isset($_SESSION['username'])) {
    unset($_SESSION["validlogin"]);
    unset($_SESSION["username"]);
    unset($_SESSION["score"]);
    header("Location: game.php");
    exit;
}
?>