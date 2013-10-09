<?php
require "./3rdparty/facebook-php-sdk/src/facebook.php";

$fb = new Facebook(array(
	"appId" => "560844070636312",
	"secret" => "fe13c1fe8314e0c6b5c8845d142f61a7" ));

$user = $fb->getUser();

print "<a href='" . $fb->getLoginUrl() ."'>Login</a>";

var_dump($user);

$user_profile = $fb->api('/me');
print_r($user_profile);

print '<img src="https://graph.facebook.com/' . $user . '/picture/large">';
