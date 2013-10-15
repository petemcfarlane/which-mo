<?php 
error_reporting(E_ALL);

session_name("movember");
session_start();
use Models\User;
include "./3rdparty/facebook-php-sdk/src/facebook.php";

$fb = new Facebook(array(
	"appId" => "560844070636312",
	"secret" => "fe13c1fe8314e0c6b5c8845d142f61a7" ));

$fbUser = $fb->getUser();

print "<a href='" . $fb->getLoginUrl() ."'>Login with Facebook</a>";

var_dump($fbUser);

// $user_profile = $fb->api('/me');
// print_r($user_profile);
// 
// print '<img src="https://graph.facebook.com/' . $user . '/picture/large">';

function generateToken() {
	return base64_encode( openssl_random_pseudo_bytes(32));
}

function getUser($user_id=null) {
	$user_id = ($user_id === null) ? $_SESSION['user']['_id'] : $user_id;
	return new User($user_id);
}
// function getUserName($user=null) {
	// $mongoClient = new \MongoClient();
	// $db = $mongoClient->movember;
	// $cursor = $db->users->find( array("_id"=>$user) );
	// if (count($cursor) !== 1) throw new Exception("User with that id does not exist.");
	// foreach ($cursor as $user) {
		// return $user;
	// }
// }

if ( !isset( $_SESSION['token'] ) ) $_SESSION['token'] = generateToken();

require 'router.php';