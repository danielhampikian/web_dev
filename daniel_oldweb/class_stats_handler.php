<?php
#start the session. if session is already in progress, has no effect.

require_once('Dao.php');
session_start();


# We only want to validate if they reached this page via a post.
# Require doa here
# dao = new Dao();
# validate user, pass in email and password
# Write a function in Dao.php that gets connection, prepares stmt and does a SELECT paswwrod FROM users Where email = :email
# bind the parameters and execute the querry
# if you get a row back result, you can put in a boolean $result && you want to check that password equals the password you got back
# The verifyPassword method takes in given and user password, if they are empty return false, if they are equal return true, else return false
# call it password_verify, if these passwords match (the verify method returns a boolean, then return true
# back in login hnaderl, do a Session acess granted if validateUser returns true, do the header(location granted) thing
# 



 if(empty($classid)) {
    $_SESSION["error_classid"] = "Class name cannot be empty.";
  } 


# We only want to validate if they reached this page via a post.
if(isset($_POST['class_submit_button']))
{
  $classid = $_POST['classid'];


    try
    {
      $dao = new Dao();
      $_SESSION["class"] = $dao->filterByClass($classid);
    } catch (Exception $e) {
      echo "<p>Failed to find class.  Please enter a different class name.</p>.";
      die; 
    }  


 $_SESSION["status"] = $status;
  header("Location: class_stats.php");
  die; # Make sure this script terminates.
}
else {
  $_SESSION["classid"] = $classid; # so user doesn't have to re-enter value.

  header("Location: class_stats.php");
  die;
} 
 
?>