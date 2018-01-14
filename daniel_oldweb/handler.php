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
  $email = $_POST['email'];
  $password = $_POST['password'];
  $username = $_POST['username'];

  # Validate form input first. (Note: This could (and probably should)
  # be broken into functions).
  $validEmail = false;
  $validPassword = false;
  $validUsername = false;

  # Check email (required field)
  if(empty($email)) {
    $_SESSION["error_email"] = "Email cannot be empty.";
  } else if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    $_SESSION["error_email"] = "Please enter a valid email.";
  } else {
    $validEmail = true;
  }

  # Check password (required field)
  if(empty($password)) {
    $_SESSION["error_password"] = "Password cannot be empty.";
  } else {
    $validPassword = true;
  }

  if(empty($username)) {
    $_SESSION["error_username"] = "Username cannot be empty.";
  } else {
    $validUsername = true;
  }
  # If input is valid, check values against user info in database.
  if($validEmail && $validPassword && $validUsername) {
    # For simplification, let's pretend I got these login credentials
    # from an SQL table.
    # TODO: pull login credentials from email table, put them in place here for access granted

    $dao = new Dao();

# We only want to validate if they reached this page via a post.
if(isset($_POST['login_submit_button']))
{
  $email = $_POST['email'];
  $password = $_POST['password'];
  $username = $_POST['username'];

  # Validate form input first. (Note: This could (and probably should)
  # be broken into functions).
  $validEmail = false;
  $validPassword = false;


  # Check email (required field)
  if(empty($email)) {
    $_SESSION["error_email"] = "Email cannot be empty.";
  } else if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    $_SESSION["error_email"] = "Please enter a valid email.";
  } else {
    $validEmail = true;
  }
    try
    {
      $dao = new Dao();
      $dao->createUser($email, $password, $username);
    } catch (Exception $e) {
      echo "<p>Failed to create user. Please try a different username.</p>.";
      die; 
    }
  
}

 $_SESSION["status"] = $status;
  $_SESSION["email_preset"] = $email; # so user doesn't have to re-enter value.
   $_SESSION["username_preset"] = $username;
  header("Location: create_account.php");
  die; # Make sure this script terminates.
}
else 
   $_SESSION["status"] = $status;
  $_SESSION["email_preset"] = $email; # so user doesn't have to re-enter value.
   $_SESSION["username_preset"] = $username;
  header("Location: create_account.php");
  die;
} 
 
?>