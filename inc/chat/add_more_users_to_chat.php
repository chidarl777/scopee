<?php require_once("check.php"); ?>
<?php

//Adding more user to chat with you
if(isset($_POST("add_more_users"))){
	//select all that are friends with user_error
	//echo friend form with checkbox
	//add the number of friend checked and echo it in the sent to panel
	//and also add a remove button to remove a friend from the chat
	
	$time=Date('h:i:s a');
	$date=Date('Y-m-d');
	try{
		
	$SQL="SELECT *FROM friends_tbl WHERE USER_FROM=$user_login || USER_TO=$user_login";
	$get_friend=$dbh->prepare($SQL);
	$get_friend->execute();
	//get number of rows
	$num_rows=$get_friend->rowCount();
	if($num_rows==0){
		$get_frienderr="You have no friend at the moment";
	}
	else{
		$get_friend_array=$get_friend->fetch(PDO::FETCH_ASSOC);
		$user_from=$get_friend_array["USER_FROM"];
		$user_to=$get_friend_array["USER_TO"];
		
		//CHECKING IF USER_LOGGEDIN IS USER_FROM OR USER_TO IN THE FRIENDS TABLE
		//AND FETCHING USERS INFO IN THE USERS TABLE
		if($user_login=$user_from){
			$user_to=$get_friend_array["USER_TO"];
			//get friend INFO
			$SQL="SELECT FIRST_NAME,OTHER_NAME,PROFILE_PIC FROM users WHERE USERNAME=$user_to";
			$get_friends=$dbh->prepare($SQL);
			$get_friends->execute();
			$get_friends_info=$get_friends->fetch(PDO::FETCH_ASSOC);
			//putting info in an array
			$first_name=$get_friends_info['FIRST_NAME'];
			$other_name=$get_friends_info['OTHER_NAME'];
			$profile_pic=$get_friends_info['PROFILE_PIC'];
		}
		else{
			$user_from=$get_friend_array["USER_FROM"];
			//GET FRIEND INFO
			$SQL="SELECT FIRST_NAME,OTHER_NAME,PROFILE_PIC FROM users WHERE USERNAME=$user_from";
			$get_friends=$dbh->prepare($SQL);
			$get_friends->execute();
			$get_friends_info=$get_friends->fetch(PDO::FETCH_ASSOC);
			//putting info in an array
			$first_name=$get_friends_info['FIRST_NAME'];
			$other_name=$get_friends_info['OTHER_NAME'];
			$profile_pic=$get_friends_info['PROFILE_PIC'];
			$friends="<div>
	<img src='../userdata/profile_pic/$profile_pic'/><label>$first_name $other_name</label><input type='checkbox' id='add_users'/>
</div>";
		}
	}
	//GETTING THE USERS CHECK AND ADDING IT TO THE SENT TO PANEL 
}
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}

	

}
?>