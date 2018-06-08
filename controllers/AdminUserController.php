<?php
class AdminUserController{
	public function methodList(){
		if(!isset($_SESSION["admin"])){
			header('Location:/admin');
		}
		$get = array();
		$get = User::getAllUsers();

		include_once(D.'backend/UsersList.php');
		return true;
	}
	public function methodView($id){
		if(!isset($_SESSION["admin"])){
			header('Location:/admin');
		}

		$id = intval($id);
		$user = User::getDataByID($id);
		
		include_once(D.'backend/UsersView.php');
		return true;
	}
	public function methodBan($id){
		if(!isset($_SESSION["admin"])){
			header('Location:/admin');
		}
		$id = intval($id);
		$user = User::toBanList($id);
		header("Location:/admin/user-list");
		return true;
	}
	public function methodDelete($id){
		if(!isset($_SESSION["admin"])){
			header('Location:/admin');
		}
		$id = intval($id);
		$user = User::deleteUserByID($id);
		header("Location:/admin/user-list");
		return true;
	}
	public function methodNormal($id){
		if(!isset($_SESSION["admin"])){
			header('Location:/admin');
		}
		$id = intval($id);
		$user = User::toNormalList($id);
		header("Location:/admin/user-list");
		return true;
	}
}
?>