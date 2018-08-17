<?php

try{
$_GET['subdomain']=strtok($_SERVER['HTTP_HOST'],".");
$otherlinks=$post_id=$post_title="";
if(isset($_GET['subdomain'])) {
	
$subdomain = $_GET['subdomain'];
//strtok($_SERVER["HTTP_HOST"], ".");

//============================================================================
//CHECKING IF THE SUBDOMAIN OR WORLD EXIST OR HAS NOT BEEN REMOVED IN DATABASE
//============================================================================
require("inc/db/config.php");
$domain_check=$dbh->prepare('SELECT *FROM worlds_tbl WHERE WORLD_ADRESS="'.$subdomain.'" AND REMOVED="NO"');
$domain_check->execute();
$num_domain_check=$domain_check->rowCount();

if($num_domain_check>0){
	//======================================================================
	//CHECKING OTHER PARAMETERS IN THE LINK
	//======================================================================
	if(isset($_GET["pid"])){
	
	$check_u1=$_GET['pid'];
	$post_id="pid=$check_u1";
	
	if(isset($_GET["title"])){
	
	$check_title=$_GET['title'];
	$post_title="title=$check_title";
	
	}
	}
	$otherlinks="?".$post_id.'&'.$post_title;
	//=======================================================================
	//REDIRECT USER TO WORLD PAGE IS WORLD ADDRESS EXIST
	//=======================================================================
	
header('location:"'.$subdomain.'".scopee.com.ng."'.$otherlinks.'"');
	//create a code in your world to detect if it is a subdomain before displaying world.
}
else{
	//=======================================================================
	//ECHO ERROR AND ADD HOME PAGE LINK
	//=======================================================================
	
		$worlderr='<p style="color:#ff0000; margin-top:30px;">WORLD POST DOES NOT EXIST OR HAS BEEN REMOVED BY IT CREATOR</p>';
	 	echo'<script type="text/javascript">alert("WORLD POST DOES NOT EXIST OR HAS BEEN REMOVED BY IT CREATOR");</script>';
	 	echo $worlderr;
	 	echo "<p><u><a href='index.php'>Back to Homepage</a></u></p>"
	 	
	 	die();

}
}
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
}
?>