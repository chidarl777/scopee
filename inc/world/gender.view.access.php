<?php
//CHECKING IF THERE IS ANY GENDER RESTRICTION

try{
//GETTING USERS INFO
$get_user=$dbh->prepare('SELECT GENDER FROM users WHERE USERNAME="'.$user_login.'"');
$num_gender=$get_user->rowCount();
if($num_gender>0){
	$get_gender=$get_user->fetch(PDO::FETCH_ASSOC);
	$gender=$get_gender['GENDER'];
	

//CHECKING USERS GENDER
if($user_login != $world_creator){
	if($gender_view != $gender OR $gender_view !="Both"){
		header("location:home.php");
	}
}
}
		}
		catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
		
?>