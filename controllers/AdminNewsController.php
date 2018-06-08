<?php
class AdminNewsController{
	public function methodList(){

		if(!isset($_SESSION["admin"])){
			header('Location:/admin');
		}

		$get = array();
		$get = News::getNewsList();
		include_once(D.'backend/NewsList.php');
		return true;
	}
	public function methodAdd(){
		if(!isset($_SESSION["admin"])){
			header('Location:/admin');
		}

		$title = false;
		$description = false;
		$img = false;
		if(isset($_POST["add_news_button"])){
			$title = $_POST["add_news_name"];
			$description = $_POST["add_news_description"];
			$img = $_FILES["add_news_file"]["name"];

			@move_uploaded_file($_FILES["add_news_file"]["tmp_name"],D.'files/news/'.$_FILES["add_news_file"]["name"]);
			News::addNews($title,$description,$img);
			header("Location:/admin/news-list");
		}
		
		include_once(D.'backend/NewsAdd.php');
		return true;
	}
	public function methodUpdate($id){

		if(!isset($_SESSION["admin"])){
			header('Location:/admin');
		}
		$news = News::getNewsByID($id);
		$title = false;
		$description = false;
		$img = false;
		if(isset($_POST["update_news_button"])){
			$title = $_POST["update_news_name"];
			$description = $_POST["update_news_description"];

			$img = $_FILES["update_news_file"]["name"];
			if($img == ""){
				$img = $news["img"];
			}

			@move_uploaded_file($_FILES["update_news_file"]["tmp_name"],D.'files/news/'.$_FILES["update_news_file"]["name"]);
			News::UpdateNews($id,$title,$description,$img);
			header("Location:/admin/news-list");
		}
		
		include_once(D.'backend/NewsUpdate.php');
		return true;
	}
	public function methodDelete($id){

		if(!isset($_SESSION["admin"])){
			header('Location:/admin');
		}

		
		News::deleteNews($id);
		header("Location:/admin/news-list");
		return true;
	}
}