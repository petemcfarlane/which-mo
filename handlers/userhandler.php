<?php
namespace Handlers;

use Models\User;
use Controllers\UserController;
use Views\UserView;
use Views\BaseView;

class UserHandler {

	private $user;
	
	function __construct() {
		\ToroHook::add("before_handler", function() {
			$this->user = getUser();
		});
	}

	function get($_id=null) {
		if ($_id===null) {
			$user = new User;
			$controller = new UserController($user);
			$view = new UserView($controller, $user, $this->user);
			$view->index();
		} else {
			$user = new User($_id);
			$controller = new UserController($user);
			$view = new UserView($controller, $user, $this->user);
			$view->show();
		}
	}

	function post() {
		if ($_SESSION['token'] !== ($_POST['token'])) throw new Exception('Error, tokens do not match, possible CSRF attack.');
		$user = new User;
		$user->setName($_POST['name']);
		$user->setEmail($_POST['email']);
		$user->setPassword($_POST['password']);
		$controller = new UserController($user);
		$controller->createUser();
		$view = new BaseView;
		$view->redirect("/users/" . $user->getId());
	}

	function put($_id=null) {
		if ($_id === null) throw new Exception('Error, user id must be set');
		if ($_SESSION['token'] !== ($_POST['token'])) throw new Exception('Error, tokens do not match, possible CSRF attack.');
		if ($_SESSION['user']['_id'] !== $_id) throw new Exception('Error, must be logged in as user to update yourself.');
		$user = new User($_id);
		$controller = new UserController($user);
		$controller->updateUser();
		$view = new BaseView;
		$view->redirect("/users/" . $user->get_id());
	}

	function delete($_id=null) {
		if ($_id === null) throw new Exception('Error, user id must be set');
		if ($_SESSION['token'] !== ($_POST['token'])) throw new Exception('Error, tokens do not match, possible CSRF attack.');
		if ($_SESSION['user']['_id'] !== $_id) throw new Exception('Error, must be logged in as user to delete yourself.');
		$user = new User($_id);
		$controller = new UserController($user);
		$controller->deleteUser();
		$view = new BaseView;
		$view->redirect("/users");
	}

}