<?php
//equire("../aut_session.inc.php");
//CODE FOR INSERTING WORLDS POST
require_once("inc/check.php");

$occupation=$marital_status=$education=$country=$country_of_origin=$about_user=$city=$state_of_origin=$state=$professional_skill=$contacts=$hobby="";
$error=$occupationerr=$marital_statuserr=$educationerr=$countryerr=$country_of_originerr=$about_usererr=$cityerr=$state_of_originerr=$stateerr=$professional_skillerr=$contactserr=$hobbyerr="";

		if(isset($_POST["send-data"])){
	if(!empty($_POST['about-user'])){
		$about_user1=test_input($_POST["about-user"]);
		$about_user=ucwords($about_user1);
	}
	else{
		$about_usererr="empty";
	}
	if(!empty($_POST["city"])){
		$city1=test_input($_POST["city"]);
		$city=ucwords($city1);
	}
	else{
		$cityerr="empty";
	}
if(!empty($_POST["marital-status"])){
		$marital_status1=test_input($_POST["marital-status"]);
		$marital_status=ucwords($marital_status1);
	}
	else{
		$marital_statuserr="empty";
	}
	if(!empty($_POST["state"])){
		$state1=test_input($_POST["state"]);
		$state=ucwords($state1);
	}
	else{
	$stateerr="empty";
	}
	if(!empty($_POST["country"])){
		$country1=test_input($_POST["country"]);
		$country=ucwords($country1);
	}
	else{
		$countryerr="empty";
	}
	if(!empty($_POST["state-of-origin"])){
		$state_of_origin1=test_input($_POST["state-of-origin"]);
		$state_of_origin=ucwords($state_of_origin1);
	}
	else{
		$state_of_originerr="empty";
	}
	if(!empty($_POST["country-of-origin"])){
		$country_of_origin1=test_input($_POST["country-of-origin"]);
		$country_of_origin=ucwords($country_of_origin1);
	}
	else{
		$country_of_originerr="empty";
	}
	if(!empty($_POST["occupation"])){
		$occupation1=test_input($_POST["occupation"]);
		$occupation=ucwords($occupation1);
	}
	else{
		$occupationerr="empty";
	}
	if(!empty($_POST["education"])){
		$education1=test_input($_POST["education"]);
		$education=ucwords($education1);
	}
	else{
		$educationerr="empty";
	}
	if(!empty($_POST["hobby"])){
		$hobby1=test_input($_POST["hobby"]);
		$hobby=ucwords($hobby1);
	}
	else{
		$hobbyerr="empty";
	}
	if(!empty($_POST["professional-skill"])){
		$professional_skill1=test_input($_POST["professional-skill"]);
		$professional_skill=ucwords($professional_skill1);
	}
	else{
		$professional_skillerr="empty";
	}
	if(!empty($_POST["contacts"])){
		$contacts1=test_input($_POST["contacts"]);
		$contacts=strtolower($contacts1);
	}
	else{
		$contactserr="empty";
	}
	
	
//$time=date('h:i:s a');
$date=date('Y-m-d h:i:s a');
try{
	require("inc/db/config.php");
	if(empty($error)){
		$complete_profile="YES";
		$update_profile=$dbh->prepare('UPDATE users SET ABOUT_USER="'.$about_user.'",COUNTRY_OF_RESIDENCE="'.$country.'",STATE_OF_RESIDENCE="'.$state.'",CITY="'.$city.'",COUNTRY_OF_ORIGIN="'.$country_of_origin.'",STATE_OF_ORIGIN="'.$state_of_origin.'",PROFESSIONAL_SKILLS="'.$professional_skill.'",EDUCATION="'.$education.'",OCCUPATION="'.$occupation.'",CONTACTS="'.$contacts.'",MARITAL_STATUS="'.$marital_status.'",HOBBY="'.$hobby.'",COMPLETE="'.$complete_profile.'",DATE_UPDATED="'.$date.'" WHERE USERNAME="'.$user_login.'" AND REMOVED="NO"');
		$update_profile->execute();
	}
	
		
		
		}
		
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
}
?>