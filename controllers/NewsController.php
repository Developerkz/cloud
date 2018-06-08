<?php
class NewsController{
	public function methodList(){

		$news = array();
		$news = News::getNewsList();

		include_once(D.'front_end/news-list.php');
		return true;
	}
	public function methodView( $id ){

		$news = News::getNewsByID($id);

		if(!$news){
			page404();
		}

		include_once(D.'front_end/news-view.php');
		return true;
	}
}
?>