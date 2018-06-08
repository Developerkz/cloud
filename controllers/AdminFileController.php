<?php
class AdminFileController{
	public function methodView($url){

		if(!isset($_SESSION["admin"])){
			header('Location:/admin');
		}

		$file = File::getFilesByURL($url);
		if(!$file){
			header("Location:/admin/panel");
		}
		$user = User::getDataByID($file["user_id"]);

		include_once(D.'backend/FileView.php');
		return true;
	}
	public function methodDelete($url){

		if(!isset($_SESSION["admin"])){
			header('Location:/admin');
		}
		
		$file = File::getFilesByURL($url);
		$filename = D.'files/files/'.$file["path"];
		@unlink($filename);
		$removed = File::deleteFileByUrl($url);
		header("Location:/admin/panel");
		return true;
	}
}
?>