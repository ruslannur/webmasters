<?php

class Registration extends Controller 
{
	public function index()
	{
		$data = array();
		$view_page = 'registration/index';

		if (Utils::isLogged()) {
			header("Location: ".DOMAIN.ROOT."/".Utils::siteLang()."/profile");
			exit;		
		}

		if (!empty($_POST) ) {
			//$data_empty = Utils::checkEmptyUserFields($_POST, USER_COLS_NAME_CHECK, USER_COLS_NAME_CHECK_RUSSIAN); 
			$data = Utils::checkPostData($_POST, $_FILES); 
				
      		if ($data['result'] == 1) {
				$insert_data = array(
					'u_name' => htmlspecialchars(trim($_POST['p_name'])),
					'u_email' => trim($_POST['p_email']),
					'u_pwd'   => md5(trim($_POST['p_pwd'])),
					'u_dsc' => htmlspecialchars(trim($_POST['p_description'])),
					'u_phone' => htmlspecialchars(trim($_POST['p_phone'])),
					'u_city' => htmlspecialchars(trim($_POST['p_city'])),
					'u_image' => $data['filename']
			    );
			    //u_name, u_email, u_pwd, u_dsc, u_image

				$user = $this->model('User');
				$data = $user->addUser($insert_data);

				if ($data['result'] == 1) {
					$view_page = 'registration/success';
				}							
			}				
		}
		$this->view($view_page,array('data' => $data,'title'=>Utils::i18('Registration'), 'post'=>$_POST), 'layout');
	}

	
}