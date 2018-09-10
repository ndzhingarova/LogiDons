<?php
require_once('../modeles/classes/1-config-interface.php');
class Database
{	
	private static $instance = null;
	
	private function __construct() {}
	
	public static function getInstance()//avoir la connection a la BDD et retourner cette connection
	{
		if(self::$instance == null)
			self::$instance = new PDO(
				"mysql:host=".Config::DB_HOST.";dbname=".Config::DB_NAME."", 
				Config::DB_USER, 
				Config::DB_PWD);
		return self::$instance;// retourner une connection specifique a cette BDD.
	}
	public static function close()
	{
		self::$instance = null;
	}
}
