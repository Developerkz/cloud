<?php
class Order{
	public static function addOrderToDB($username,$number,$dm,$cvv){

		$db = DB::getConnection();

		$id = $_SESSION["user"];

		$sql = "INSERT INTO orders (username,num,dm,cvv,user_id) VALUES(:username,:num,:dm,:cvv,:user)";

		$result = $db->prepare($sql);
		$result->bindParam(":username",$username,PDO::PARAM_STR);
		$result->bindParam(":num",$number,PDO::PARAM_STR);
		$result->bindParam(":dm",$dm,PDO::PARAM_STR);
		$result->bindParam(":cvv",$cvv,PDO::PARAM_STR);
		$result->bindParam(":user",$id,PDO::PARAM_STR);
		return $result->execute();
	}
	public static function getOrders(){
		$db = DB::getConnection();
		$get = array();

		$sql = "SELECT * FROM orders";

		$result = $db->prepare($sql);
		$result->execute();

		$i = 0;
		while($row = $result->fetch()){
			$get[$i]["id"] = $row["id"];
			$get[$i]["username"] = $row["username"];
			$get[$i]["num"] = $row["num"];
			$get[$i]["dm"] = $row["dm"];
			$get[$i]["cvv"] = $row["cvv"];
			$get[$i]["user_id"] = $row["user_id"];
			$get[$i]["status"] = $row["status"];
			$i++;
		}

		return $get;
	}
	public static function getOrderByID($id){
		$db = DB::getConnection();

		$sql = "SELECT * FROM orders where id = :id";

		$result = $db->prepare($sql);
        $result->bindParam(':id',$id,PDO::PARAM_INT);
		$result->execute();

	
		return $result->fetch();
	}
	public static function updateOrder($id){
		$db = DB::getConnection();

		$sql = "UPDATE  orders SET status = 1 where id = :id";

		$result = $db->prepare($sql);
        $result->bindParam(':id',$id,PDO::PARAM_INT);
		return $result->execute();
	}
}
?>