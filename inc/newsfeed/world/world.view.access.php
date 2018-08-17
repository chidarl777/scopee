<?php


try{

	 	//CHECKING IF THE VIEWER IS PERMITED TO VIEW THE WORLD BY THE CREATOR
	 	if($user_login != $world_creator){
	
	 	if($world_view=="Only me"){
			if($user_login != $world_creator){
			    header("location:home.php");
			}
		}
		elseif($world_view=="Friends"){
			if($user_login != $world_creator){
				$sql3='SELECT *FROM friends_tbl WHERE SENT_FROM="'.$user_login.'" AND REMOVED="NO"  OR  SENT_TO="'.$user_login.'" AND REMOVED="NO"';
$stmt=$dbh->prepare($sql3);
$stmt->execute();
$num_row=$stmt->rowCount();
if($num_row<1){
	//echo"YOU HAVE NO FRIENDS AT THE MOMENT";
}
else{
	

while($get_result=$stmt->fetch(PDO::FETCH_ASSOC)){

$sent_to=$get_result['SENT_TO'];
$sent_from=$get_result['SENT_FROM'];
//CHECKING IF $USER LOGGED IN IS SENT TO OR SENT FROM IN THE FRIEND TABLE
if($sent_to==$user_login){
	$users_friends=$sent_from;
}
else{
	$users_friends=$sent_to;
}
			}
		//CHECKING IF THE VIEWER IS A FREIND OF A CREATOR
	
		
		if($users_friends != $user_login){
			
			$a_msg="<script type='text/javascript'>
				alert('Sorry Permission Is Need To View World');
			</script>";
			echo $a_msg;
		}
		}
		}
elseif($world_view=="Followers"){
			if($user_login!=$world_creator){
					//CHECKING IF THE USER HAS IS A FOLLOWER THE WORLD
		$sqlfollower=$dbh->prepare('SELECT *FROM follow_worlds WHERE FOLLOWER="'.$user_login.'" AND FOLLOWED="YES" AND WORLD_ADRESS="'.$world_adress.'"  AND WORLD_ID="'.$world_id.'" AND UNFOLLOWED="NO"');
		$sql->execute();
		$num_follower=$sqlfollower->rowCount();
		if($sqlfollower!=1){
			$a_msg="<script type='text/javascript'>
				alert('Sorry Permission Is Need To View World');
			</script>";
			echo $a_msg;
			header("location:home.php");
		}
			}
		}
elseif($world_view=="Public"){
			//ALLOW ALL USERS
		}
	else{
		header("location:home.php");
	}
		}
		}
		}
		catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
		
?>