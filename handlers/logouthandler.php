<?php
namespace Handlers;

use \Handlers\SeshHandler;

class LogoutHandler {
	
	function get() {
		$sesh = new SeshHandler;
		$sesh->delete();
	}

}