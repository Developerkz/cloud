<?php
class AdminController{
	public function methodAuth(){

		if(isset($_SESSION["admin"])){
			header('Location:/admin/panel');
		}

		$login = false;
		$pass = false;

		if(isset($_POST["admin-button"])){
			$login = $_POST["admin_login"];
			$pass = $_POST["admin_password"];

			$errors = false;

			if(!Admin::checkLogin($login)){
				$errors[] = 'Неправильный логин';
			}
			if(!Admin::checkPassword($pass)){
				$errors[] = 'Введите пароль не короче 8-ми символов';
			}

			$adminID = Admin::checkAdminData($login, $pass);

			if($adminID == false ){
				$errors[] = 'Неправильный E-mail и(или) пароль';
			}
			else{
				if($errors == false){
					Admin::auth($adminID);
					header('Location:/admin/panel');
				}
			}
		}

		include_once(D.'backend/Auth.php');
		return true;
	}
	public function methodPanel(){

		if(!isset($_SESSION["admin"])){
			header('Location:/admin');
		}

		$files = array();
		$files = File::getAllFiles();

		include_once(D.'backend/Panel.php');
		return true;
	}
	public function methodLogout(){
		unset($_SESSION["admin"]);
		header("Location:/admin");
		return true;
	}
}
?>