<?php 
namespace Controllers;
use Controllers\BaseController;

class UserController extends BaseController {
	
	function __construct(\Models\User $user) {
		$this->user = $user;
	}
	
	public function createUser() {
		$vars = $_REQUEST;
		
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
	}

}