<?php 
	$params = include('../config/db_parameters.php');
	$dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
	$db = new PDO($dsn,$params['user'],$params['pass']);

	$d = $_POST['d'];
	$ip = $_SERVER["REMOTE_ADDR"];

	$sql = "INSERT INTO downloads (file_id,date_time,user_ip) 
							VALUES(:id,NOW(),:ip)";
	$result = $db->prepare($sql);
	$result->bindParam(":id",$d,PDO::PARAM_INT);
	$result->bindParam(":ip",$ip,PDO::PARAM_STR);
	$result->execute();

?>