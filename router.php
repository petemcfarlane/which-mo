<?php
require '3rdparty/Toro.php';

ToroHook::add('404', function() {echo '404';} );

Toro::serve(array(
	"/" => "Handlers\IndexHandler",
	"/session" => "Handlers\SeshHandler",
	"/users" => "Handlers\UserHandler",
	"/users/:alpha" => "Handlers\UserHandler",
	"/logout" => "Handlers\LogoutHandler",
));