<?php 
class FileController{
	public function methodView($url){

		$view = File::getFilesByURL($url);
		$size = toKBSize($view["size"]);
		$downloads = File::getCount($view["file_id"]);

		if(!$view){
			page404();
		}

		include_once(D.'front_end/view.php');
		return true;
	}
}
?>