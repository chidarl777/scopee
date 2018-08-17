<?php 
require_once("inc/check.php");
//getting the world adress on the adress bar


//$url_mat=base64_encode($user_login.$uid);
//$remove_str=str_replace("zy", "=", $url_mat);
//$url_decode=base64_decode($remove_str);
if(isset($_GET["u"])){
	
	try{
	$check_u=test_input($_GET['u']);
	IF(ctype_alnum($user_login) ){
	require("inc/db/config.php");
	//CHECKING IF WORLD EXIST
	$SQL=$dbh->prepare('SELECT *FROM users WHERE USERNAME="'.$user_login.'" AND ID="'.$user_login_id.'"');
	$SQL->execute();
	//getting rows returned
	$num_sql=$SQL->rowCount();
	
	 if($num_sql>1){
	 	$get_data=$SQL->fetch(PDO::FETCH_ASSOC);
	 	$userlog=$get_data["USERNAME"];
	 	//$id=$get_data["WORLD_NAME"];
	 	$uid=$get_data["ID"];
	 	$i=1;
	 	$url_mat=base64_encode($userlog.$uid);
$url_encode=str_replace("=", "zy", $url_mat);
	 	 
	
	 }
	 else{
	 
	}	
	 }
}
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
	
	}
?>