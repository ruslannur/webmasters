<?php

class User
{
	public function getUser($login, $pwd) 
	{
		$user = array();
		if ($login == 'admin' && $pwd == '123')	{
			$user['name'] = 'admin';
			$user['result'] = 1;
			$user['error'] = 'Успешная авторизация';
		} else {
        	$user['result'] = -1;
        	$user['name'] = '';
        	$user['error'] = 'Ошибка авторизации';
		}
		return $user;		
	}

	public function addUser($params = array())
	{
		$user = array();
		$user['result'] = -1;        	
    	$user['error'] = 'Ошибка регистрации';

    	$row = DB::insert('INSERT INTO users_tbl (u_name, u_email, u_pwd, u_dsc, u_image, u_phone, u_city, u_status, u_create_date) 
			VALUES (:u_name, :u_email, :u_pwd, :u_dsc, :u_image, :u_phone, :u_city, 0, now());', $params);
		
		if (!empty($row)) {
			$user['result'] = 1;        	
    		$user['error'] = 'Регистрация прошла успешна';
		}
		return $user;

	}

	public function getUserByEmail($email)
	{
		$user = array();
		$user['result'] = -1;        	
    	//$user['error'] = 'Ошибка регистрации';

    	$row = DB::select('SELECT * FROM users_tbl WHERE u_email = :u_email LIMIT 1;', $email);
		
		if (empty($row)) {
			$user['result'] = 1;        	
    		//$user['error'] = 'Регистрация прошла успешна';
		}
		return $user;
	}

	public function getUserById($id) 
	{
		$user = array();
		$user['result'] = -1;        	
    	$user['error'] = 'Ошибка получения данных';

    	$row = DB::select('SELECT * FROM users_tbl WHERE id = :id LIMIT 1;', $id);
		
		if (!empty($row)) {
			$user['result'] = 1;        	
    		$user['error'] = '';
    		$user['user'] = $row;
		}
		return $user;
	}

	public function getUserByEmailAndPassword($data)
	{
		$user = array();
		$user['result'] = -1;        	
    	//$user['error'] = 'Nodata';

    	$row = DB::select('SELECT * FROM users_tbl WHERE u_email = :u_email and u_pwd = :u_pwd LIMIT 1;', $data);
		
		if (!empty($row)) {
			$user['result'] = 1;        	
    		//$user['error'] = '';
    		$user['user'] = $row;
		}
		return $user;
	}
}