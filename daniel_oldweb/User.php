<?php



class User {
	
	private $id;
	private $email;
	private $password;


	public function __construct($id =0, $email="", $password="") { //add default values in case they are not entered
		$this->$id;
		$this->$email;
		$this->$password;
	}

	public function __toString() {
		return "[id=$this->id, email=$this->email]";
	}

	echo "[$this->id]";

	public function validatePassword($password) {
		if($this->password===$password) {
			return true;
		}
		else {
			return false
		}
	}

}
?>