<?php
class UserController{

	public function methodLogin(){

		if(isset($_SESSION["user"])){
			header('Location:/account');
		}

		$email = false;
		$password  = false;

		if(isset($_POST["login_button"])){
			$email = $_POST["login_email"];
			$password  = $_POST["login_password"];

			$errors = false;

			if(!User::checkEmail($email)){
				$errors[] = 'Неправильный Email';
			}
			if(!User::checkPassword($password)){
				$errors[] = 'Введите пароль не короче 8-ми символов';
			}

			$userID = User::checkUserData($email, $password);

			if($userID == false ){
				$errors[] = 'Неправильный E-mail и(или) пароль';
			}
			else{
				if($errors == false){
					User::auth($userID);
					header('Location:/account');
				}
			}
		}
		
		include_once(D.'front_end/login.php');
		return true;
	}
	public function methodRegister(){

		if(isset($_SESSION["user"])){
			header('Location:/account');
		}

		$name = false;
		$email = false;
		$password = false;
		$password_r = false;

		if(isset($_POST["reg_button"])){
			$name = $_POST["reg_name"];
			$email = $_POST["reg_email"];
			$password = $_POST["reg_password"];
			$password_r = $_POST["reg_password_r"];

			$errors = false;

			
			if(!User::checkName($name)){
				$errors[] = 'Введите свое имя';
			}
			if(!User::checkEmail($email)){
				$errors[] = 'Неправильный Email';
			}
			if(!User::checkPassword($password)){
				$errors[] = 'Введите пароль не короче 8-ми символов';
			}
			if($password != $password_r){
				$errors[] = 'Пароли не совпадают';
			}
			if( User::checkEmailExists($email) ){
				$errors[] = 'Логин занят';
			}

			if($errors == false){
				$res = User::register($name,$email,$password);
				$userID = User::checkUserData($email, $password);
				User::auth($userID);
				header('Location:/account');
			}
		}
		
		include_once(D.'front_end/register.php');
		return true;
	}






	public function methodAccount(){
		if(!isset($_SESSION["user"])){
			header('Location:/login');
		}

		$page = "account";

		$upload_file = false;
		$size = false;
		$type = false;
		$tmp = false;

		if(isset($_POST["upload_button"])){

			$upload_file = $_FILES["upload_file"]["name"];
			$size = $_FILES["upload_file"]["size"];
			$type = $_FILES["upload_file"]["type"];
			$tmp = $_FILES["upload_file"]["tmp_name"];
			$format = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $_FILES['upload_file']['name']));

			$url = false;

			$check = File::checkURI();
			$result = File::uploadFileToDB($upload_file,$size,$type,$tmp,$check,$format);

			if($result){
				$url = $result;
				$_POST["upload_button"] = false;
			}

		}

		$news = array();
		$news = News::getNewsList();

		$data = User::getDataByID($_SESSION["user"]);

		include_once(D.'front_end/account.php');
		return true;
	}





	public function methodFiles(){
		if(!isset($_SESSION["user"])){
			header('Location:/login');
		}

		$page = "files";

		$myfiles = File::getMyFiles();


		include_once(D.'front_end/account/files.php');
		return true;
	}

	public function methodTraffic(){
		if(!isset($_SESSION["user"])){
			header('Location:/login');
		}
		$page = "traffic";

		$packages = array();
		$packages = Packages::getPackages();

		include_once(D.'front_end/account/traffic.php');
		return true;
	}

	public function methodDownloads(){
		if(!isset($_SESSION["user"])){
			header('Location:/login');
		}
		$page = "statistics";

		$downloads = array();
		$downloads = Downloads::getDownloadList();

		include_once(D.'front_end/account/statistics.php');
		return true;
	}

	public function methodScore(){
		if(!isset($_SESSION["user"])){
			header('Location:/login');
		}
		$page = "score";

		$username = false;
		$number = false;
		

		$score = File::getBounce();


		if(isset($_POST["payment_button"])){
			$username = $_POST["payment_name"];
			$number = $_POST["payment_number"];
		
			$errors = false;


			if($score <= 100){
				$errors[] = "Недостаточно средств для вывод";
			}
			if(strlen($username) < 6){
				$errors[] = "Введите номер кошелька";
			}
			

			if(!$errors){
				$order = Order::addOrderToDB($username,$number,$dm,$cvv);
				$get = User::getDataByID($_SESSION["user"]);
				send_mail('Cloud.kz',$get["email"],'Ваша заявка принята','Ваша заявка принята! Выплаты производятся каждую субботу');
				header('Location:/account');
			}
		}

		if(!$score){
			$score = 0;
		}

		include_once(D.'front_end/account/score.php');
		return true;
	}
	public function methodLogout(){
		unset($_SESSION['user']);

		header('Location:/');
		return true;
	}

	public function methodRemind(){
		if(isset($_SESSION["user"])){
			header('Location:/account');
		}	

		$email = false;

		if(isset($_POST["remind_button"])){

			$email = $_POST["remind_email"];
			$errors = false;
			if(!User::checkEmail($email)){
				$errors[] = 'Неправильный Email';
			}
			if(!User::checkEmailExists($email) ){
				$errors[] = 'Такой логин не зарегистрирован';
			}

			if(!$errors){
				$pass = random_pass();
				User::updatePass($email,$pass);
				send_mail('Cloud.kz',$email,'Новый пароль','Ваш новый пароль: '.$pass);
				header('Location:/login');
			}

		}


		include_once(D.'front_end/remind.php');
		return true;
	}
}
?>