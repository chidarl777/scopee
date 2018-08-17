<?php
//config connection!
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "scopee";

try{
  
$dbh=new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	
error_reporting(E_ALL);
ini_set('display_errors','on');
ini_set('display_startup_errors','on');
ini_set('memory_limit','1024M');
ini_set('post_max_size', '64M');
ini_set('upload_max_filesize', '64M');

$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $errors){
	echo ("error".$errors->getMessage());
}	
?>
