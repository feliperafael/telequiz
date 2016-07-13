<?php

class conexao{
	public static $instance;
	
	
	public function __construct(){
	}
	
	public static function getInstance() {
		
			if (!isset(self::$instance)) {
			self::$instance = new PDO("mysql:host=localhost;dbname=telequiz_database", 'root', 'root', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")) or die('morreu');
			self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
			self::$instance->exec('SET character_set_connection=utf8');			
			self::$instance->exec('SET character_set_client=utf8');
			self::$instance->exec('SET character_set_results=utf8');
		} 
		
		return self::$instance;
	}
	
}

//$conn = new conexao();
/*
mysql_query("SET NAMES 'utf8'");

*/
?>
