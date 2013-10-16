<?php 
namespace Controllers;
use Controllers\BaseController;

class UserController extends BaseController {
	
	private $users;
	
	function __construct(\Models\User $user) {
		parent::__construct();
		$this->user = $user;
		$this->users = $this->db->users;
	}
	

	public function createUser() {

		$user = array(
			"name" => $this->user->getName(),
			"email" => $this->user->getEmail(),
			"password" => $this->user->getPassword()
		);

		$this->users->insert($user);

		$this->user->set_id( (string)$user['_id'] );
	}
	

	public function updateUser() {

		if ($_POST['name']) $this->user->setName($_POST['name']);
		if ($_POST['email']) $this->user->setEmail($_POST['email']);
		if ($_POST['password']) $this->user->setPassword($_POST['password']);
		
		$this->db->users->update( 
			array(
				"_id" => new \MongoId($this->user->get_id()) ),
			array(
				"name" => $this->user->getName(),
				"email" => $this->user->getEmail(),
				"password" => $this->user->getPassword())
		);		
	}
	

	public function deleteUser() {
		
		$this->db->users->remove(
			array(
				"_id" => new \MongoId($this->user->get_id()) )
		);
	}

}