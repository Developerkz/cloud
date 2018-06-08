<?php
class Packages{
	public static function getPackages(){
		$db = DB::getConnection();
		$get = array();

		$sql = "SELECT * FROM packages";

		$result = $db->prepare($sql);
		$result->execute();

		$i = 0;
		while($row = $result->fetch()){
			$get[$i]["id"] = $row["id"];
			$get[$i]["title"] = $row["title"];
			$get[$i]["k"] = $row["k"];
			$get[$i]["price"] = $row["price"];
			$i++;
		}

		return $get;
	}
}	
?>