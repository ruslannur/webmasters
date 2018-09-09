<?php

class Utils 
{
	public static function checkUserPostData(array $fields)
	{
		$data =  self::checkEmptyUserFields($fields, AUTH_COLS_NAME_CHECK, AUTH_COLS_NAME_CHECK_ENGLISH);
		if ($data['result'] == -1) {
			return $data;
		}

		$data = self::checkUserExistByNamePassword($fields);
		return $data;

	}

	public static function checkPostData(array $fields, array $file)
	{
		$data =  self::checkEmptyUserFields($fields, USER_COLS_NAME_CHECK, USER_COLS_NAME_CHECK_ENGLISH);
		if ($data['result'] == -1) {
			return $data;
		}
		$data = self::checkEmailFormat($fields);
		if ($data['result'] == -1) {
			return $data;
		}
		$data = self::checkPasswordsFields($fields);
		if ($data['result'] == -1) {
			return $data;
		}
		
		$data = self::checkUserExist($fields);
		if ($data['result'] == -1) {
			return $data;
		}

		$data = self::checkFileUpload($file);
		if ($data['result'] == -1) {
			return $data;
		}
		return $data;

	}

	public static function checkUserExistByNamePassword($fileds)
	{
		$user = Model::getModel('User');
		$array_params = array('u_email' => trim($fileds['p_email']), 'u_pwd' => md5(trim($fileds['p_pwd'])));
		$data = $user->getUserByEmailAndPassword($array_params);
		if ($data['result'] == -1) {
			$data['error'][] = 'Authorization error';
		}
		return $data;
	}

	public static function checkUserExist($fields)
	{
		$user = Model::getModel('User');
		$data = $user->getUserByEmail(array('u_email'=>$fields['p_email']));
		if ($data['result'] == -1) {
			$data['error'][] = 'User with such Email exist';
		}
		return $data;
	}

	public static function checkEmailFormat($fields)
	{
		$result = array('result' => 1, 'error' => '');
		if (!filter_var(trim($fields['p_email']), FILTER_VALIDATE_EMAIL)) {
			$result['result'] = -1;
  			$result['error'][] = 'Field "Email" contains wrong data';
		}	

		return $result;
	}

	public static function checkPasswordsFields($fields)
	{
		$result = array('result' => 1, 'error' => '');
		if (strlen(trim($fields['p_pwd'])) < 8) {
			$result['result'] = -1;
  			$result['error'][] = 'Field "Password" must contain at least 8 characters';
  			return $result;
		}

		if (trim($fields['p_pwd']) != trim($fields['p_pwd_again'])) {
			$result['result'] = -1;
  			$result['error'][] = 'Passwords not equal';
  			return $result;
		}
		return $result;

	}	


	public static function checkEmptyUserFields(array $fields, $columns, $columnsRus) 
	{
		$result             = array('result' => 1, 'error' => '');
		$taskColsNameArr    = explode(',', $columns);
		$taskColsNameRusArr = explode(',', $columnsRus);

		foreach ($taskColsNameArr as $k=>$v) {
			if (empty($fields[$v])) {
				$result['result'] = -1;
      			$result['error'][] = 'Field "'.$taskColsNameRusArr[$k].'" is mandatory to fill';				
			}
		}		
		return $result;
	}

	public static function checkFileUpload(array $file) 
	{
		$result = array('result' => 1, 'error' => '', 'filename' => '');
		if (!empty($file["p_file"]["tmp_name"])) {
			$targetDir      = 'public/uploads/';
			$targetFile     = basename($file["p_file"]["name"]);			
			$imageFileType  = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
			$renamedFile    = time().'_'.rand(0, 99999).'.'.$imageFileType;
			$targetFile     = $targetDir.$renamedFile;
			$targetFileSave = 'uploads/'.$renamedFile;

			if (!in_array($imageFileType, array('jpg','png','jpeg','gif'))) {
				$result['result'] = -1;
      			$result['error'][] = 'Only following file types are supported: JPG, JPEG, PNG and GIF';
			    return $result;	
			}

			if ($file["p_file"]["size"] > 5100000) { 
			    $result['result'] = -1;
      			$result['error'][] = 'Image size must not be more than 5 MB';
			    return $result;			    
			}			

			self::resizeImage($file["p_file"]["tmp_name"], $targetFile, $imageFileType);
			$result['filename'] = $targetFileSave;			
		}

		return $result;
	}

	public static function resizeImage($image, $dest, $imageFileType, $width = 320, $height = 240)
	{
		$imageSize = getImageSize($image);
        $widthOld  = $imageSize[0];
        $heightOld = $imageSize[1];
        $height    = round(($width * $heightOld) / $widthOld);

		$thumb = imagecreatetruecolor($width, $height);
		$imageFileType = ($imageFileType == 'jpg') ? 'jpeg' : $imageFileType;
    	$source = call_user_func('imagecreatefrom'.$imageFileType, $image);
    	imagecopyresampled($thumb, $source, 0, 0, 0, 0, $width, $height, $widthOld, $heightOld);
    	imagejpeg($thumb, $dest);
	}

	public static function sessionSet($key, $val)
	{
		$_SESSION[$key] = $val;
	}

	public static function isLogged()
	{
		return (!empty($_SESSION['user'])) ? true : false;
	}

	public static function i18($key)
	{
	    $data = Lang::getInstance(self::siteLang());
	    $values = json_decode($data, true); 
	    return (!empty($values[$key])) ? $values[$key] : $key;	
	}

	public static function siteLang()
	{
		return $_SESSION['site_lang'];
	}

}