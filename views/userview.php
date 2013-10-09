<?php 
namespace Views;
use Views\BaseView;

class UserView extends BaseView {
	private $user;
	private $userController;
	private $users;
	
	public function __construct(\Controllers\UserController $userController, \Models\User $user) {
		parent::__construct();
		$this->user = $user;
		$this->userController = $userController;
		$this->users = $this->db->users;
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
		$cursor = $this->users->find();
		foreach ($cursor as $user ) {
			$users[] = $user;
		}
		$vars = array('users'=>$users);
		$this->render('user/index', $vars);
	}

}