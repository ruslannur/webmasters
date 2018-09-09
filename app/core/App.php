<?php

class App 
{
	protected $controller = 'login';	
	protected $method = 'index';	
	protected $params = array();
	
	public function __construct()
	{
		$url = $this->parseUrl();

		//print_r($url);
		
		if (file_exists('app/controllers/'.$url[0].'.php')) {
			$this->controller =  $url[0];
			unset($url[0]);
		}		
		require_once 'app/controllers/'.$this->controller.'.php';		
		$this->controller =  new $this->controller;
		
		if (isset($url[1]))	{
			if (method_exists($this->controller, $url[1])) {
				$this->method = $url[1];
				unset($url[1]);
			} else {
			    die("Oops!!!");
		    }
		}
		
		$this->params =  $url ?  array_values($url) : array();
		call_user_func_array(array($this->controller, $this->method), $this->params);		
	}
	
	public function parseUrl()
	{
		Utils::sessionSet('site_lang', LANGUAGE_DEFAULT);
		if (isset($_GET['lang']) && !empty($_GET['lang'])) {
			if (in_array($_GET['lang'], explode(',', LANGUAGES))) {
				if ($_GET['lang'] !== $_SESSION[site_lang]) {
					Utils::sessionSet('site_lang', $_GET['lang']);
				}
			} else {
				Utils::sessionSet('site_lang', LANGUAGE_DEFAULT);
			}
		}
		if (isset($_GET['url'])) {			
			return explode('/', rtrim($_GET['url'], '/'));
		}	
	}
	
}