<?php 
class File{
	public static function uploadFileToDB($upload_file,$size,$type,$tmp,$url,$format){

		$dirname = "files/files/";
		$file_in_server = $url.'.'.$format;
		move_uploaded_file($tmp, $dirname.$file_in_server);

		$db = DB::getConnection();

		$id = $_SESSION["user"];
		$status = 1;
	

		$sql = "INSERT INTO documents (file_name,path,format,size,user_id,status,file_url,date_time) 
								VALUES(:name,:fileserver,:format,:size,:id,:status,:url,NOW())";

		
		$result = $db->prepare($sql);

		$result->bindParam(":name",$upload_file,PDO::PARAM_STR);
		$result->bindParam(":fileserver",$file_in_server,PDO::PARAM_STR);
		$result->bindParam(":format",$type,PDO::PARAM_STR);
		$result->bindParam(":size",$size,PDO::PARAM_INT);
		$result->bindParam(":id",$id,PDO::PARAM_STR);
		$result->bindParam(":status",$status,PDO::PARAM_INT);
		$result->bindParam(":url",$url,PDO::PARAM_STR);

		$result->execute();

		return $url;
	}

	public static function checkURI(){
		$db = DB::getConnection();
		

		$uri = getUri(8,12);

		$result = $db->query("SELECT * FROM documents WHERE file_url = '$uri' ");

		$result->setFetchMode(PDO::FETCH_ASSOC);
		$get = $result->fetch();
		if(is_array($get)){
			$uri = getUri(15,16);
		}
		return $uri;

	}
	public static function getFilesByURL($url){
		$db = DB::getConnection();

		$sql = "SELECT * FROM documents WHERE file_url = :url";

		$result = $db->prepare($sql);
		$result->bindParam(":url",$url,PDO::PARAM_STR);
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$result->execute();

	

		return $result->fetch();
	}
	public static function deleteFileByUrl($url){
		$db = DB::getConnection();

		$sql = "DELETE FROM documents WHERE file_url = :url";

		$result = $db->prepare($sql);
		$result->bindParam(":url",$url,PDO::PARAM_STR);
		$result->setFetchMode(PDO::FETCH_ASSOC);
		return $result->execute();
	}

	public static function getMyFiles(){
		$db = DB::getConnection();

		$id = $_SESSION["user"];

		$myfiles = array();

		$sql = "SELECT * FROM documents WHERE user_id = :id";

		$result = $db->prepare($sql);
		$result->bindParam(":id",$id,PDO::PARAM_STR);
		$result->execute();

		$i = 0;
		while($row = $result->fetch()){
			$myfiles[$i]["file_id"] = $row["file_id"];
			$myfiles[$i]["file_name"] = $row["file_name"];
			$myfiles[$i]["size"] = $row["size"];
			$myfiles[$i]["path"] = $row["path"];
			$myfiles[$i]["date_time"] = $row["date_time"];
			$myfiles[$i]["file_url"] = $row["file_url"];
			$i++;
		}

		return $myfiles;
	}

	public static function getFileByID($id){
		$db = DB::getConnection();
		$id = intval($id);
		$myfiles = array();
		$sql = "SELECT * FROM documents WHERE user_id = :id";
		$result = $db->prepare($sql);
		$result->bindParam(":id",$id,PDO::PARAM_STR);
		$result->execute();
		$i = 0;
		while($row = $result->fetch()){
			$myfiles[$i]["file_id"] = $row["file_id"];
			$myfiles[$i]["file_name"] = $row["file_name"];
			$myfiles[$i]["size"] = $row["size"];
			$myfiles[$i]["path"] = $row["path"];
			$myfiles[$i]["date_time"] = $row["date_time"];
			$myfiles[$i]["file_url"] = $row["file_url"];
			$i++;
		}
		return $myfiles;
	}

	public static function getAllFiles(){
		$db = DB::getConnection();

		$myfiles = array();

		$sql = "SELECT * FROM documents ORDER BY date_time DESC";

		$result = $db->prepare($sql);
		$result->execute();

		$i = 0;
		while($row = $result->fetch()){
			$myfiles[$i]["file_id"] = $row["file_id"];
			$myfiles[$i]["file_name"] = $row["file_name"];
			$myfiles[$i]["size"] = $row["size"];
			$myfiles[$i]["date_time"] = $row["date_time"];
			$myfiles[$i]["file_url"] = $row["file_url"];
			$i++;
		}

		return $myfiles;
	}

	public static function getCount($id){
		$db = DB::getConnection();

		$sql = "SELECT count(id) FROM downloads WHERE file_id = :id";
		$result = $db->prepare($sql);
		$result->bindParam(":id",$id,PDO::PARAM_STR);
		$result->execute();

		$num = $result->fetch();
		return $num[0];
	}
	public static function getBounce(){
		$db = DB::getConnection();

		$score = 0;

		foreach (File::getMyFiles() as $file) {
			$result = $db->query("SELECT count(DISTINCT user_ip) FROM downloads WHERE file_id = ".$file["file_id"]);
			$get = $result->fetch();
			$count = intval($get[0]);
			$score = $score + $count;
		}
		
		return $score * 0.2;
	}
	public static function getBounceById($id){
		$db = DB::getConnection();

		$score = 0;

		foreach (File::getFileByID($id) as $file) {
			$result = $db->query("SELECT count(DISTINCT user_ip) FROM downloads WHERE file_id = ".$file["file_id"]);
			$get = $result->fetch();
			$count = intval($get[0]);
			$score = $score + $count;
		}
		
		return $score * 0.2;
	}
}
?>