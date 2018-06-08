<?php 
Class Router{
	private $routes;
	public function __construct(){
		$this->routes = include(D.'config/routes.php');
	}
	private function getURI(){
		if(isset($_SERVER["REQUEST_URI"])){
			if($_SERVER["REQUEST_URI"] == '/'){
				$page = "main";
			}
			else{
				$page = substr($_SERVER["REQUEST_URI"], 1);
			    if(!preg_match("/^[A-Za-z0-9-\/]{2,100}/", $page)){page404();}
			}
			return $page;
		}
		else{page404();}
	}
	public function run(){
		$uri = $this->getURI();
		$page404 = true;

		foreach ($this->routes as $pages => $path) {
			if( preg_match("~$pages~", $uri) ){
				$route      =  preg_replace("~$pages~", $path , $uri);
				$segments   =  explode('/',$route);
				$contName   =  ucfirst(array_shift($segments)).'Controller';
				$actionName =  'method'.ucfirst(array_shift($segments));
				$parameters =  $segments;
				$contFile   =  D.'controllers/'.$contName.'.php';
				if(file_exists($contFile)){require_once($contFile);}
				$obj = new $contName;
				$result = call_user_func_array(array($obj,$actionName), $parameters);
				if($result){$page404 = false;break;}
			}
		}

		if($page404){ page404(); }
	}
}
?>