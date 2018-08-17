
<?php
//require("inc/aut_session.inc.php");

//$chat_info="";
///$profile_picz=$get_info["PROFILE_PIC"];

$chat_info="";
$active_symbol="";
//CODE TO VIEW FRIENDS OF USER LOGGED IN
try{
	require("inc/db/config.php");

		//GETTING USERS INFO FROM THE USER TABLE
		if(isset($_SESSION['chat-sent-to']) && !(empty($_SESSION['chat-sent-to']))){
			
		$sent_to=$_SESSION['chat-sent-to'];
$sql1='SELECT *FROM users WHERE USERNAME="'.$sent_to.'" AND REMOVED="NO"';
$stmt1=$dbh->prepare($sql1);
$stmt1->execute();
$get_info=$stmt1->fetch(PDO::FETCH_ASSOC);
$first_name_chat=$get_info["FIRST_NAME"];
$other_name_chat=$get_info["OTHER_NAME"];
$profile_pic=$get_info["PROFILE_PIC"];
$chat_info="Chatting with $first_name_chat $other_name_chat";

	if(empty($profile_pic)){
			 	$profile_pic7="image/default-pic/images_012.jpg";
			 }
			 else{
			 	$profile_pic7="user_data/profile_pic/$profile_pic";
			 }
			
	}
	else{
		$chat_info="";
	}
	}
	
		//}
		//else{
		//$get_logged_friends="No Friend";
	//}		
    
catch(PDOException $error){
	echo("An error occurred");
	
	}

?>
