<?php

class DB
{	
	private static $instance;
	private static $db_dsn  = DB_DSN;
	private static $db_user = DB_USER;
	private static $db_pwd  = DB_PWD;
	
	private function __construct() 
	{	
		
	}
	
	public static function getInstance() 
	{	    
		if (empty(self::$instance)) {			
			try {
				self::$instance = new PDO(self::$db_dsn, self::$db_user, self::$db_pwd);
			} catch(PDOException $e) {
				die($e->getMessage());
			}
		}
		return self::$instance;
	}
		
	public static function select($sql, array $data)
	{
		self::getInstance()->query('SET NAMES utf8');
		$stmt = self::getInstance()->prepare($sql);
		$stmt->execute($data);		
        return $stmt->fetch(); 
	}	

	public static function insert($sql, array $data)
	{
		self::getInstance()->query('SET NAMES utf8');
		$stmt = self::getInstance()->prepare($sql);
		$stmt->execute($data);		
        return self::getInstance()->lastInsertId(); 
	}	
	
}
