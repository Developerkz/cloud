<?php
function find(){
	$file_controllers = glob("controllers/*.php", GLOB_BRACE);
	$file_components = glob("components/*.php", GLOB_BRACE);
	$file_model = glob("model/*.php", GLOB_BRACE);

	foreach ($file_controllers as $file1) {
		require_once(D.$file1);
	}
	foreach ($file_components as $file2) {
		require_once(D.$file2);
	}
	foreach ($file_model as $file3) {
		require_once(D.$file3);
	}
}
function uri(){
	echo 'http://cloud.kz/';
}
function page404(){
	require_once(D.'front_end/page404.php');
	exit;
}

function getUri($start_number,$end_number){
	$number = rand($start_number,$end_number);
    $arr = array('a','b','c','d','e','f',

                 'g','h','i','j','k','l',

                 'm','n','o','p','r','s',

                 't','u','v','x','y','z',

                 'A','B','C','D','E','F',

                 'G','H','I','J','K','L',

                 'M','N','O','P','R','S',

                 'T','U','V','X','Y','Z',

                 '1','2','3','4','5','6',

                 '7','8','9','0');



    $uri = "";

    for($i = 0; $i < $number; $i++)

    {

      $index = rand(0, count($arr) - 1);
      $uri .= $arr[$index];

    }


 
  return $uri;
}


function toKBSize( $size ){
    $fileSize = 0;                   
                
    if ($size > 1024 * 1024) {
        $fileSize = round($size * 100 / (1024 * 1024) / 100).'MB';
    }else {
        $fileSize = round(($size * 100 / 1024) / 100).'KB';
    }

    return $fileSize;
}

function password($p){
    $p = md5(strrev($p.md5($p)));
    return $p;
}

function dbProcedure(){
        $params = include(D.'config/db_parameters.php');
        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new PDO($dsn,$params['user'],$params['pass']);
        return $db;
    }


function send_mail($from,$to,$subject,$body)
{
    $charset = 'utf-8';
    mb_language("ru");
    $headers  = "MIME-Version: 1.0 \n" ;
    $headers .= "From: <".$from."> \n";
    $headers .= "Reply-To: <".$from."> \n";
    $headers .= "Content-Type: text/html; charset=$charset \n";
    
    $subject = '=?'.$charset.'?B?'.base64_encode($subject).'?=';

    mail($to,$subject,$body,$headers);
}
function random_pass(){
     $number = 10;

    $arr = array('a','b','c','d','e','f',

                 'g','h','i','j','k','l',

                 'm','n','o','p','r','s',

                 't','u','v','x','y','z',

                 'A','B','C','D','E','F',

                 'G','H','I','J','K','L',

                 'M','N','O','P','R','S',

                 'T','U','V','X','Y','Z',

                 '1','2','3','4','5','6',

                 '7','8','9','0','+','*',

                 '-','_','/','#','!','&');



    $pass = "";

    for($i = 0; $i < $number; $i++)

    {

      $index = rand(0, count($arr) - 1);
      $pass .= $arr[$index];

    }


  return $pass;
}
?>