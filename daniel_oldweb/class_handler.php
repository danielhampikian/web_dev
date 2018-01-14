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



if($_POST)
{
  $username= $_POST['username'];
  $classid = $_POST['classid'];


  # Check email (required field)
  if(empty($username)) {
    $_SESSION["error_username"] = "User name cannot be empty.";
  } 

  # Check password (required field)
  else if(empty($classid)) {
    $_SESSION["error_classid"] = "Class name cannot be empty.";
  } 


# We only want to validate if they reached this page via a post.
if(isset($_POST['class_submit_button']))
{
  $username = $_POST['username'];
  $classid = $_POST['classid'];


    try
    {
      $dao = new Dao();
      $dao->addToClass($username, $classid);
    } catch (Exception $e) {
      echo "<p>Failed to add user or create class. Please try a different user name or class name.</p>.";
      die; 
    }  


 $_SESSION["status"] = $status;
 $_SESSION["email_preset"] = $email; # so user doesn't have to re-enter value.
 $_SESSION["username_preset"] = $username;
  header("Location: edit_class.php");
  die; # Make sure this script terminates.
}
else 
  $_SESSION["username"] = $username;
  $_SESSION["classid"] = $classid; # so user doesn't have to re-enter value.

  header("Location: edit_class.php");
  die;
} 
 
?>