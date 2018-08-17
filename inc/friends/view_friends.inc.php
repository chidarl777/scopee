
<?php
//CODE TO VIEW FRIENDS OF USER LOGGED IN
//require("../aut_session.inc.php");
try{
	require("inc/db/config.php");
$sql='SELECT *FROM friends_tbl WHERE SENT_FROM="'.$user_login.'" AND REMOVED="NO"  OR  SENT_TO="'.$user_login.'" AND REMOVED="NO"';
$stmt=$dbh->prepare($sql);
$stmt->execute();
$num_row=$stmt->rowCount();
if($num_row<1){
	echo"YOU HAVE NO FRIENDS AT THE MOMENT";
}
else{
	

while($get_result=$stmt->fetch(PDO::FETCH_ASSOC)){
$sent_id=$get_result['ID'];
$sent_to=$get_result['SENT_TO'];
$sent_from=$get_result['SENT_FROM'];
//CHECKING IF $USER LOGGED IN IS SENT TO OR SENT FROM IN THE FRIEND TABLE
if($sent_to==$user_login){
	$users_friends=$sent_from;
}
else{
	$users_friends=$sent_to;
}
//GETTING USERS INFO FROM THE USER TABLE
$sql1='SELECT *FROM users WHERE USERNAME="'.$users_friends.'"';
$stmt1=$dbh->prepare($sql1);
$stmt1->execute();
$get_info=$stmt1->fetch(PDO::FETCH_ASSOC);
$first_name=$get_info["FIRST_NAME"];
$other_name=$get_info["OTHER_NAME"];
$profile_pic=$get_info["PROFILE_PIC"];
$idf=$get_info["ID"];

	if(empty($profile_pic)){
			 	$profile_pic2="image/default-pic/images_012.jpg";
			 }
			 else{
			 	$profile_pic2="user_data/user_photo/$profile_pic";
			 }
			
			 $encoded_url=$idf;
				$get_friend='                          <div class="individual-user info-expand">
                              <div class="user-intro friend">
                                  <div class="user-thumb"><a href="profile.php?u='.$encoded_url.'"><img src="'.$profile_pic2.'" alt="user"></a></div>
                                  <div class="users-info">
                                      <ul>
                                          <li class="u-name"><a href="profile.php?u='.$encoded_url.'">'.$first_name.' '.$other_name.'</a></li>
                                         
                                      </ul>
                                  </div>
                                  <!-- this is for the toggle icon -->
                              
                              </div>
                            
                          </div>';
		
			echo $get_friend;
			
		}		
     }
	}	
catch(PDOException $error){
	echo("connection error1,because:".$error->getMessage());
	
	}

?>

<?php
//CODE TO REMOVE FRIENDS OF USER LOGGED IN
try{
//	$r_friend="unchecked";
//	$r_friends="";
//	$r_friendserr="";
	
	if(isset($_POST["remove_friend"])){
 /* if($_POST['friends']=='remove'){
		$r_friends=$_POST['friends'];
		$r_friend="checked";
	}
	else{
		$r_friend="unchecked";
		$r_friendserr= "You have not selected a friend to remove";
		
	}
	*/
	$time=date('h:i:s a');
    $date=date('Y-m-d');
    
	require("inc/db/config.php");
	if(empty($users_friends)){
			//echo "you have no friend request at the moment";
		}
		else{
	$remove_friend=$users_friends;
	
$sql='UPDATE friends_tbl SET REMOVED="YES",USER_REMOVED="'.$user_login.'", TIME_REMOVED="'.$time.'",DATE_REMOVED="'.$date.'" WHERE SENT_TO="'.$user_login.'" AND SENT_FROM="'.$remove_friend.'" OR SENT_FROM="'.$user_login.'" AND SENT_TO="'.$remove_friend.'"';
$stmt2=$dbh->prepare($sql);
$stmt2->execute();
$num_row=$stmt2->rowCount();
if($num_row<1){
	echo"YOU HAVE NO FRIENDS AT THE MOMENT";
}
else{
	//GETTING USERS INFO FROM THE USER TABLE
$sql1='SELECT *FROM users WHERE USERNAME="'.$remove_friend.'"';
$stmt3=$dbh->prepare($sql1);
$stmt3->execute();
$get_info=$stmt3->fetch(PDO::FETCH_ASSOC);
	
$first_name=$get_info["FIRST_NAME"];
$other_name=$get_info["OTHER_NAME"];
$profile_pic=$get_info["PROFILE_PIC"];

	if(empty($profile_pic)){
			 	$profile_pic2="images/default-pic/images_012.jpg";
			 }
			 else{
			 	$profile_pic2="user_data/profile_pic/".$profile_pic;
			 }
				/* $removed_friend="
	<div id='add_friends'>
	<img src='$profile_pic2'/>	
	<a href='profile.php'>$first_name $other_name</a>
	Have been removed from your friend list
	</div>";
		
			echo $removed_friend;
				*/
	}
	
}			
     }
	}	
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}

?>