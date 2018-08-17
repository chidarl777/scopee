<?php
//CODING FOR THEY ADD USER BUTTON TO CHAT
//$friend_id="unchecked";

  if(isset($_POST['add_users'])){
// if user has check on the user with a specific userid	
// if a specific friend id is checked
if(isset($_POST["$friend_id"])){
	$friend_id=$_POST['FRIEND_ID'];
}

try{
	require("inc/db/config.php");
	$check_id=$dbh->prepare("SELECT FROM friends_tbl WHERE FRIEND_ID=$friend_id AND REMOVED='NO'");
 	$check_id->execute();
	$user=$check_id->fetch(PDO::FETCH_ASSOC);
	$user_to=$users['USER_TO'];
	$user_from=$users['USER_FROM'];
	
	//CHECKING IF USER_TO OR USER_FROM IS USER_LOGGED iN
	if($user_to==$user_login){
		$friend_username=$user_from;
	}
	else{
		$friend_username=$user_to;
	}
	//SELECTING FROM USERS TO GET FRIEND INFO
	$get_info=$dbh->prepare("SELECT FROM users WHERE USERNAME =$friend_username");
	$get_info->execute();
	
	$first_name=$get_info["FIRST_NAME"];
	$other_name=$get_info["OTHER_NAME"];
	
	//PUTTING INFO INTO A DIV TAG TO BE ECHO
	$friend_add="<div>$other_name $first_name</div>";
	
	
}
catch(PDOException $error){
echo('connection error,because:'.$error->getMessage());

}
}

?>