<?php 
class DB{
	public static function getConnection(){
		$params = include(D.'config/db_parameters.php');
		$dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
		$db = new PDO($dsn,$params['user'],$params['pass']);
		return $db;
	}
}