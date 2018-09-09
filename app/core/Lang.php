<?php

class Lang
{	
	private static $instance;

	private function __construct() 
	{	
		
	}
	
	public static function getInstance($lang) 
	{	    
		if (empty(self::$instance)) {			
			try {
				$url = 'langs/'.$lang.'.json'; 
		 		self::$instance = file_get_contents($url);		    
	 		} catch(Exception $e) {
				die($e->getMessage());
			}			
		}
		return self::$instance;		
	}
		
}
