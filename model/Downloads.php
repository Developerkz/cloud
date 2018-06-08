<?php
class Downloads{
	public static function getDownloadList(){
		$db = DB::getConnection();


		$get = array();

		$id = $_SESSION["user"];

		$result = $db->query("SELECT documents.file_name,downloads.date_time,downloads.user_ip FROM downloads JOIN documents on documents.file_id = downloads.file_id WHERE documents.user_id = $id");
		
		$i = 0;
		while($row = $result->fetch()){
			$get[$i]["file_name"] = $row["file_name"];
			$get[$i]["date_time"] = $row["date_time"];
			$get[$i]["user_ip"] = $row["user_ip"];
			$i++;
		}

		return $get;
	}
}
?>