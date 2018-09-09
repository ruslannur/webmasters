<?php

class Profile extends Controller 
{
	public function index()
	{
		$data = array();
		
		if (!Utils::isLogged()) {
			header("Location: ".DOMAIN.ROOT.'/'.Utils::siteLang()."/login");
			exit;		
		}

		$view_page = 'profile/index';
		$user = $this->model('User');
		$array_params = array('id' => $_SESSION['user_id']);
		$data = $user->getUserById($array_params);

		if ($data['result'] == -1) {
			session_destroy();
			header("Location: ".DOMAIN.ROOT.'/'.Utils::siteLang()."/login");
			exit;
		}
		
		$data = $data['user'];
		$this->view($view_page,array('data' => $data,'title'=>'User profile'), 'layout');
	}

	
}