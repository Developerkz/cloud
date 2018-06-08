<?php
class MainController{
	public function methodIndex(){

		if(isset($_SESSION["user"])){
			header('Location:/account');
		}


		$news = array();
		$news = News::getNewsList();

		include_once(D.'front_end/main.php');
		return true;
	}
}
?>