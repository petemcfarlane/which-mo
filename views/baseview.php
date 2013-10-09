<?php 
namespace Views;

class BaseView {

	public $db;
	
	function __construct() {
		$mongoClient = new \MongoClient();
		$this->db = $mongoClient->movember;
	}

	function render($template, $vars, $title=null) {

		foreach ($vars as $key => $value) {
			$$key = $value;
		}

		if (file_exists("./views/templates/$template.php")) {
			$title = $title ? $title : "Default title";
			$content = "./views/templates/$template.php";
			include "./views/templates/basetemplate.php";
		} else {
			throw new Exception("Error template: $template not found");
			
		}
			
	}
	
	function redirect($location=null, $status=303) {
		
		if ($location===null) throw new Exception("HTTP Location not set in redirect");

		header("Status: $status");
		header("Location: $location");

	}
	
	function index() {
		$vars = array('');
		$this->render('index', $vars, 'Home');	
	}
	
}