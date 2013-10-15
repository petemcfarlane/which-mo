<?php
namespace Handlers;

use \Views\BaseView;

class SeshHandler {

	function post() {
		if ($_SESSION['token'] !== ($_POST['token'])) throw new Exception('Error, tokens do not match, possible CSRF attack.');
		$mongoClient = new \MongoClient();
		$db = $mongoClient->movember;
		$cursor = $db->users->find(array("email"=>$_POST['email'], "password"=>$_POST['password']));
		if (count($cursor) !== 1) throw new Exception("User with email and password does not exist.");
		
		foreach ($cursor as $user) {
			$_SESSION['token'] = \generateToken();
			$_SESSION['user']['_id'] = (string)$user['_id'];
		}
		$redirectURL =  isset($_POST['redirectURL']) ? $_POST['redirectURL'] : '/';
		$view = new BaseView;
		$view->redirect($redirectURL);	
	}

	function delete() {
		$_SESSION = array();
		if (ini_get("session.use_cookies")) {
			$params = session_get_cookie_params();
			setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
		}
		session_destroy();
		$view = new BaseView;
		$view->redirect("/");
	}

}
