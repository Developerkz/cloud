<?php
class User{
	public static function register($fname,$email,$pass){
        $db = DB::getConnection();

        $pass = password($pass);

        $max_file_size = 15728640;
        $package = 1;

        $sql = "INSERT INTO users (name,email,password,max_file_size,package) 
                          VALUES (:fname,:email,:pass,:max_file_size,:package)";

        $result = $db->prepare($sql);
        $result->bindParam(':fname', $fname, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':pass', $pass, PDO::PARAM_STR);
        $result->bindParam(':package', $package, PDO::PARAM_INT);
        $result->bindParam(':max_file_size', $max_file_size, PDO::PARAM_INT);

        return $result->execute();
    }

    public static function getDataByID($id){

        $db = DB::getConnection();

        $id = intval($id);

        $sql = "SELECT * FROM users WHERE users_id = :id ";

        $result = $db->prepare($sql);

        $result->bindParam(':id',$id,PDO::PARAM_INT);

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $result->execute();

        return $result->fetch();
    }
	public static function checkUserData($email, $password){

		$db = DB::getConnection();

        $password = password($password);

		$sql = "SELECT * FROM users WHERE email=:email AND password=:pass";

        $result = $db->prepare($sql);

        $result->bindParam(':email',$email,PDO::PARAM_STR);
        $result->bindParam(':pass',$password,PDO::PARAM_STR);

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

		$count = $result->fetch();

		if($count){
			return $count['users_id'];
		}
		return false;
	}
	public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }
    public static function checkPassword($password)
    {
        if (strlen($password) >= 8) {
            return true;
        }
        return false;
    }
    public static function checkName($name)
    {
        if (strlen($name) > 2) {
            return true;
        }
        return false;
    }

    public static function checkPhone($phone)
    {
        if (strlen($phone) > 10) {
            return true;
        }
        return false;
    }
    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }
    public static function checkEmailExists($email)
    { 
        $db = Db::getConnection();

        $sql = "SELECT * FROM users WHERE email = :email";

        $result = $db->prepare($sql);

        $result->bindParam(':email',$email,PDO::PARAM_INT);

        $result->execute();

        if ($result->fetch()){
            return true;
        }

        return false;
    }
 
    public static function updatePass($email,$pass){
        $db = Db::getConnection();

        $pass = password($pass);

        $sql = "UPDATE users SET password = :pass WHERE email = :email";

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':pass', $pass, PDO::PARAM_STR);
        return $result->execute();
    }

    public static function getAllUsers(){

        $db = DB::getConnection();

        $get = array();

        $sql = "SELECT * FROM users";

        $result = $db->prepare($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        $i = 0;
        while($row = $result->fetch()){
            $get[$i]["users_id"] = $row["users_id"];
            $get[$i]["email"] = $row["email"];
            $get[$i]["name"] = $row["name"];
            $get[$i]["package"] = $row["package"];
            $get[$i]["ban"] = $row["ban"];
            $i++;
        }


        return $get;
    }

    public static function deleteUserByID($id){
        $db = DB::getConnection();


        $sql = "DELETE FROM users WHERE users_id = :id ";

        $result = $db->prepare($sql);
        $result->bindParam(':id',$id,PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);

    
        return $result->execute();
    }

    public static function toBanList($id){
        $db = DB::getConnection();

        $sql = "UPDATE users SET ban = 1 WHERE users_id = :id ";

        $result = $db->prepare($sql);
        $result->bindParam(':id',$id,PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);

    
        return $result->execute();
    }
    public static function toNormalList($id){
        $db = DB::getConnection();

        $sql = "UPDATE users SET ban = 0 WHERE users_id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id',$id,PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result->execute();
    }

     public static function getPackage($id){
        $db = DB::getConnection();

        $sql = "SELECT p.title FROM users u JOIN packages p ON u.package = p.id WHERE u.users_id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id',$id,PDO::PARAM_INT);
        $result->execute();
        $get = $result->fetch();
        return  $get[0];
    }

}
?>