<?php 
namespace Models;
use Models\Basemodel;

class User extends BaseModel {
	
	private $name;
	
	public function __construct($user=null) {
		if ($user!==null) $this->setName($user);
	}
	
	public function setName($name) {
		$this->name = $name;
	}

	public function getName() {
		return $this->name;
	}
}