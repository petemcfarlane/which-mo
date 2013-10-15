<?php 
namespace Handlers;

use \Views\BaseView;

class IndexHandler {
	
	function get() {
		$view = new BaseView;
		$view->index();
	}

}
