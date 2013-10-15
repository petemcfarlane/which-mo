<?php 
namespace Models;
use Models\Basemodel;

class User extends BaseModel {
	
	private $_id;
	private $name;
	private $email;
	private $password;
	
	public function __construct($_id=null) {
		if ($_id!==null) {
			$this->set_id($_id);
			$mongoClient = new \MongoClient();
			$db = $mongoClient->movember;
			$user = $db->users->findOne( array("_id"=> new \MongoId($_id) ) );
			if ( !$user ) throw new \Exception("User with that id does not exist.");
			$this->setName($user['name']);
			$this->setEmail($user['email']);
		}
	}
	
	public function set_id($_id) {
		$this->_id = $_id;
	}
	
	public function get_id() {
		return $this->_id;
	}

	public function setName($name) {
		$this->name = $name;
	}

	public function getName() {
		return $this->name;
	}

	public function setEmail($email) {
		$this->email = $email;
	}
	
	public function getEmail() {
		return $this->email;
	}

	public function setPassword($password) {
		$this->password = $password;
	}
	
	public function getPassword() {
		return $this->password;
	}
	
}