<?php
class Admin{
	public static function checkLoginExists($login)
    { 
        $db = Db::getConnection();

        $sql = "SELECT * FROM admin WHERE login = :login";

        $result = $db->prepare($sql);

        $result->bindParam(':login',$login,PDO::PARAM_INT);

        $result->execute();

        if ($result->fetch()){
            return true;
        }

        return false;
    }
    public static function auth($adminId)
    {
        $_SESSION['admin'] = $adminId;
    }
    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }
    public static function checkLogin($login)
    {
        if (strlen($login) > 3) {
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
    public static function checkAdminData($login, $password){

		$db = DB::getConnection();

        //$password = password($password);

		$sql = "SELECT * FROM admin WHERE login=:login AND password=:pass";

        $result = $db->prepare($sql);

        $result->bindParam(':login',$login,PDO::PARAM_STR);
        $result->bindParam(':pass',$password,PDO::PARAM_STR);

        $result->execute();

		$get = $result->fetch();

		if($get){
			return $get[0];
		}
		return false;
	}
}
?>