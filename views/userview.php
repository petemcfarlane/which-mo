<?php 
namespace Views;
use Views\BaseView;

class UserView extends BaseView {
	private $user;
	private $userController;
	
	public function __construct(\Controllers\UserController $userController, \Models\User $user) {
		$this->user = $user;
		$this->userController = $userController;
	}
	
	public function show() {
		$vars = array('user' => 
			array(
				'name'=>$this->user->getName()
			)
		);
		$this->render('user/show', $vars, 'User Show');
	}
	
	public function index() {
		$vars = array('');
		$this->render('user/index', $vars);
	}

}