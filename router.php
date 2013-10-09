<?php
require '3rdparty/Toro.php';

use Models\User;
use Controllers\UserController;
use Views\UserView;
use Views\BaseView;

function __autoload($class_name) {
	$parts = explode('\\', strtolower($class_name));
	$path = "";
	while($parts) {
		$path .= "/" . array_shift($parts);
	}
	include ".$path.php";
}



ToroHook::add('404', function() {echo '404';} );

Toro::serve(array(
	"/" => "IndexHandler",
	"/users" => "UsersHandler",
	"/users/:alpha" => "UserHandler",
));

class IndexHandler {
	function get() {
		$view = new BaseView;
		$view->index();
	}
}


class UsersHandler {

	function get() {
		$user = new User;
		$controller = new UserController($user);
		$view = new UserView($controller, $user);
		$view->index();
	}

	function post() {
		$user = new User;
		$controller = new UserController($user);
		$controller->createUser();
		$view = new BaseView;
		$view->redirect("/users/" . $user->getName());
		// $view = new UserView($controller, $user);
		// $view->show();
	}

}

class UserHandler {

	function get($name) {
		$user = new User($name);
		$controller = new UserController($user);
		$view = new UserView($controller, $user);
		$view->show();
	}

	function put($user) {
		echo "Update User $user";
	}

	function delete($user) {
		echo "Delete User $user";
	}

}