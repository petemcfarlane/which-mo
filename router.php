<?php
require '3rdparty/Toro.php';

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
	"/" => "Handlers\IndexHandler",
	"/session" => "Handlers\SeshHandler",
	"/users" => "Handlers\UserHandler",
	"/users/:alpha" => "Handlers\UserHandler",
	"/logout" => "Handlers\LogoutHandler",
));