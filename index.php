<?php
ini_set('display_errors',0);
ini_set('upload_max_filesize','300M');

error_reporting(E_NOTICE);

define('D',dirname(__FILE__).'/');
session_start();

require_once(D.'functions/find.php');
find();

$router = new Router;
$router->run();
?>