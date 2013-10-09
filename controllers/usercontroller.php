<?php 
namespace Controllers;
use Controllers\BaseController;

class UserController extends BaseController {
	
	// private $users;
	
	function __construct(\Models\User $user) {
		parent::__construct();
		$this->user = $user;
		$this->users = $this->db->users;
	}
	
	public function createUser() {
		$vars = array_merge($_GET, $_POST);
		
		foreach ($vars as $key => $value) {
			if ($key !== 'route') {
				try {
					$set = "set" . ucfirst($key);
					$this->user->$set($value);
				} catch (Exception $e) {
					Throw new Exception($e);
				}
			}
		}
		
		// var_dump($this->user);
		// var_dump($this->m);
		
		// var_dump($this);
		
		$user = array( "name" => $this->user->getName());
		$this->users->insert($user, array("safe" => true));
	}

}