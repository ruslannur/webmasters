<?php

class Login extends Controller 
{
	public function index()
	{
		$data = array();
		if (Utils::isLogged()) {
			header("Location: ".DOMAIN.ROOT.'/'.Utils::siteLang()."/profile");
			exit;		
		}

		if (!empty($_POST) ) {
			$data = Utils::checkUserPostData($_POST); 
				
      		if ($data['result'] == 1) {
				Utils::sessionSet('user', $data['user']['u_name']);
				Utils::sessionSet('user_id', $data['user']['id']);
				header("Location: ".DOMAIN.ROOT.'/'.Utils::siteLang()."/profile");
				exit;											
			}				
		}
		$this->view('login/index',array('data' => $data,'title'=>'authorization', 'post'=>$_POST), 'layout');
	}	

	public function signout()
	{
		session_destroy();
		header("Location: ".DOMAIN.ROOT.'/'.Utils::siteLang()."/login");
		exit;		
	}
}