<?php 
namespace Handlers;

use \Views\BaseView;

class IndexHandler {
	
	private $user;
	private $fb;
	
	function __construct() {

		\ToroHook::add("before_handler", function() {
			$this->user = getUser();
		});

		$this->fb = new \Facebook(array(
									"appId" => "560844070636312",
									"secret" => "fe13c1fe8314e0c6b5c8845d142f61a7" ));
	}

	function get() {

		$view = new BaseView($this->user, $this->fb);
		$view->index();

	}

}
