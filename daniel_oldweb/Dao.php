<?php
class Dao {

  private $dbname = "dhampiki";
  private $host ="localhost";
  private $database = "dhampiki";
  private $password = "xas2aFRa";

  private function getConnection()
  {
    $conn = new PDO("mysql:dbname={$this->dbname};host={$this->host};",
      "$this->database", "$this->password");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
  }

  public function createUser($email, $password, $username)
  {
    $conn = $this->getConnection();
    $stmt = $conn->prepare("INSERT INTO users (email, password, user_name) VALUES (:email, :password, :username)");
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $password);
    $stmt->bindParam(":username", $username);
    $stmt->execute();
  }

  public function validateUser($email, $password) {
    $conn = $this->getConnection();
    $stmt = $conn->prepare("SELECT password FROM users WHERE email = :email");
    $stmt->bindParam(":email", $email);
    //$stmt->bindParam(":password", $password);
    $stmt->execute();
    $result = $stmt->fetch();
    if($result && $this->verifyPassword($password, $result['password'])){
      return true;
    }
    else return false;
  }

  public function verifyPassword($password, $result_pass) {
    if ($password == false || $result_pass == false) {
      return false;
    }
    if ($password === $result_pass) {
      return true;
    }
    else return false;
  }

  public function getUsers () {
    $conn = $this->getConnection();
    return $conn->query("SELECT * FROM users ORDER BY high_score");
  }

  public function getScore ($user_name) {
    $conn = $this->getConnection();
    return $conn->query("SELECT high_score FROM users WHERE user_name =  :user_name");
  }

  public function updateScore($user_name, $high_score)
  {
    $conn = $this->getConnection();
    $stmt = $conn->prepare("UPDATE users SET high_score = :high_score WHERE user_name = :user_name");
    $stmt->bindParam(":high_score", $high_score);
    $stmt->bindParam(":user_name", $user_name);
    $stmt->execute();
  }


public function saveComment ($comment) {
    $conn = $this->getConnection();
    $saveQuery =
        "INSERT INTO comment
        (comment)
        VALUES
        (:comment)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":comment", $comment);
    $q->execute();
  }
  
  public function userExists($username)
  {
    $conn = $this->getConnection();
    $stmt = $conn->prepare("SELECT * FROM users WHERE user_name = :uname");
    $stmt->bindParam(":uname", $username);
    $stmt->execute();
    if($stmt->fetch()) {
      return true;
    } else {
      return false;
    }
  }

  public function addToClass($username, $classid)
  {
    $conn = $this->getConnection();
    $stmt = $conn->prepare("UPDATE users set class_id=:cid WHERE user_name = :uname");
    $stmt->bindParam(":uname", $username);
    $stmt->bindParam(":cid", $classid);
    $stmt->execute();
  }

  public function filterByClass($class)
  {
    $conn = $this->getConnection();
    $stmt = $conn->prepare("SELECT user_name, highscore
              FROM users
              WHERE $class = :cl");
    $stmt->bindParam(":cl", $class);
    $stmt->execute();
    return $stmt;
  }

  public function deletePostById($id)
  {
    $conn = $this->getConnection();
    $stmt = $conn->prepare("DELETE FROM posts WHERE id = :id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
  }

  public function updatePost($id, $message)
  {
    $conn = $this->getConnection();
    $stmt = $conn->prepare("UPDATE posts SET message = :message WHERE id = :id");
    $stmt->bindParam(":message", $message);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
  }
}

?>
