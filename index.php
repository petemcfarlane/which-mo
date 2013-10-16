<?php 
error_reporting(E_ALL);

session_name("movember");
session_start();

use \Models\User;
include "./3rdparty/facebook-php-sdk/src/facebook.php";

function __autoload($class_name) {
	$parts = explode('\\', strtolower($class_name));
	$path = "";
	while($parts) {
		$path .= "/" . array_shift($parts);
	}
	include ".$path.php";
}

function getUser($user_id=null) {
	if ($user_id === null) {
		if ( isset($_SESSION['user']['_id']) ) {
			$user_id = $_SESSION['user']['_id'];
		} else {
			$fb = new Facebook(array(
				"appId" => "560844070636312",
				"secret" => "fe13c1fe8314e0c6b5c8845d142f61a7" ));
			if ( $fb->getUser() ) {
				$mongoClient = new \MongoClient();
				$users = $mongoClient->movember->users;
				$fbapi = $fb->api('/me/');
				$user = $users->findOne( array( "email" => $fbapi['email'] ) );
				if ( !$user ) {
					$user = array(
						"name" => $fbapi['name'],
						"email" => $fbapi['email'] );
					$users->insert($user);
				}
				$user_id = (string)$user['_id'];
				$_SESSION['token'] = generateToken();
				$_SESSION['user']['_id'] = $user_id;
			}
		}
	}
	return $user_id ? new User($user_id) : null;
}

function generateToken() {
	return base64_encode( openssl_random_pseudo_bytes(32));
}

if ( !isset( $_SESSION['token'] ) ) $_SESSION['token'] = generateToken();

require 'router.php';