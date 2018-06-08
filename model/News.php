<?php 
class News{
	public static function getNewsList(){
		$db = DB::getConnection();

		$news = array();

		$sql = "SELECT * FROM news ORDER BY date DESC";

		$result = $db->prepare($sql);
		$result->execute();

		$i=0;
		while($row = $result->fetch()){
			$news[$i]["news_id"] = $row["news_id"];
			$news[$i]["title"] = $row["title"];
			$news[$i]["body"] = $row["body"];
			$news[$i]["date"] = $row["date"];
			$news[$i]["img"] = $row["img"];
			$i++;
		}

		return $news;
	}
	public static function getNewsByID($id){
		$db = DB::getConnection();


		$sql = "SELECT * FROM news WHERE news_id = :id";

		$result = $db->prepare($sql);
		$result->bindParam(":id",$id,PDO::PARAM_INT);
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$result->execute();

		return $result->fetch();
	}
	public static function addNews($title,$description,$img){
		$db = DB::getConnection();


		$sql = "INSERT INTO news (title,body,date,img) VALUES(:title,:body,NOW(),:img)";

		$result = $db->prepare($sql);
		$result->bindParam(":title",$title,PDO::PARAM_STR);
		$result->bindParam(":body",$description,PDO::PARAM_STR);
		$result->bindParam(":img",$img,PDO::PARAM_STR);
		return $result->execute();
	}
	public static function UpdateNews($id,$title,$description,$img){
		$db = DB::getConnection();


		$sql = "UPDATE news SET title = :title,body = :body,date = NOW(),img = :img WHERE news_id = :id";

		$result = $db->prepare($sql);
		$result->bindParam(":id",$id,PDO::PARAM_STR);
		$result->bindParam(":title",$title,PDO::PARAM_STR);
		$result->bindParam(":body",$description,PDO::PARAM_STR);
		$result->bindParam(":img",$img,PDO::PARAM_STR);
		return $result->execute();
	}
	public static function deleteNews($id){
		$db = DB::getConnection();


		$sql = "DELETE FROM news WHERE news_id = :id";

		$result = $db->prepare($sql);
		$result->bindParam(":id",$id,PDO::PARAM_INT);
		$result->setFetchMode(PDO::FETCH_ASSOC);
		

		return $result->execute();
	}
}
?>