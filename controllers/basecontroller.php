<?php 
namespace Controllers;

class BaseController {
	
	// function __construct(\Models\User $user) {
		// $this->user = $user;
	// }
	
	// public function createUser() {
		// var_dump($_REQUEST);
	// }
	
	public $db;

	function __construct() {
		$mongoClient = new \MongoClient();
		$this->db = $mongoClient->movember;
	}
}