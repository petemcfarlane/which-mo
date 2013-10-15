<?php 
namespace Views;
use Views\BaseView;
use \Models\User;

class UserView extends BaseView {
	private $show_user;
	private $userController;
	private $users;

	
	public function __construct(\Controllers\UserController $userController, \Models\User $show_user) {
		parent::__construct();
		$this->show_user = $show_user;
		$this->userController = $userController;
		$this->users = $this->db->users;
	}
	

	public function index() {
		$cursor = $this->users->find();
		foreach ($cursor as $user ) {
			$users[] = new User($user['_id']);
		}
		$this->vars['users'] = $users;
		$this->render('user/index', $this->vars);
	}


	public function show() {
		$this->vars['show_user'] = $this->show_user;
		$this->render('user/show', $this->vars, 'User Show');
	}
	

}