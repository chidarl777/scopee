<?php
$get_result_friend="";
$status="offline";
$active_symbol="";
$date_active="";
$date=Date('Y-m-d h:i:s a');
//CODE TO VIEW FRIENDS OF USER LOGGED IN
try{
	//require('inc/datetimediff.inc.php');
	require("inc/db/config.php");
$sql='SELECT *FROM friends_tbl WHERE SENT_FROM="'.$user_login.'" AND REMOVED="NO" OR SENT_TO="'.$user_login.'" AND REMOVED="NO"';
$stmt=$dbh->prepare($sql);
$stmt->execute();
$num_row=$stmt->rowCount();
if($num_row<1){
	
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

$user_friends1=$users_friends;
//CHECKING IF FRIEND CURRENTLY LOGGED IN ;
$check_user=$dbh->prepare('SELECT *FROM active_log WHERE USERNAME="'.$user_friends1.'" AND ACTIVE="YES" AND INACTIVE="NO" AND TURNED_OFF="NO"');
	 $check_user->execute();
	 
	 //getting result from active log
	 $get_result_friend=$check_user->rowCount();
	
	 if($get_result_friend>0){
	 	$status="Online";
	 	$get_active_f=$check_user->fetch(PDO::FETCH_ASSOC);
	 	$time_log=$get_active_f['DATE_ACTIVE'];
	 $users_friends2=$user_friends1;
	 $users_friends_chat_info=$user_friends1;
     $_SESSION['chat-sent-to']=$users_friends2;
	
//GETTING USERS INFO FROM THE USER TABLE
$sql1='SELECT *FROM users WHERE USERNAME="'.$users_friends2.'"';
$stmt1=$dbh->prepare($sql1);
$stmt1->execute();
$get_info=$stmt1->fetch(PDO::FETCH_ASSOC);
$first_name=$get_info["FIRST_NAME"];
$other_name=$get_info["OTHER_NAME"];
$profile_pic=$get_info["PROFILE_PIC"];


	if(empty($profile_pic)){
			 	$profile_pic5="image/default-pic/images_012.jpg";
			 }
			 else{
			 	$profile_pic5="user_data/user_photo/".$profile_pic;
			 }
			
			 $ul="user";
			 
			 $get_time=datetimediff(date('Y-m-d H:i:s'),$_SESSION['date_active']);
			// $active_symbol='.';
				$get_friend= '<div data-trigger="hover" title="'.$first_name.' '.$other_name.'" data-content="<div class=`chat-user-info`>
                                      <div class=`chat-user-avatar` >
                                      <!==<img  src='.$profile_pic5.' alt='.$ul.'/>-->
                                      </div>
                                      <div class=`chat-user-details`>
                                      <ul>
                                      <li>Status: <span>'.$status.'</span></li>
                                      
                                    <li>Last Login: <span>'.$get_time.'</span></li>
                                      
                                      </ul>
                                      </div>
                                      </div>
                                      " data-placement="left"><span class="chat-avatar"><img src="'.$profile_pic5.'" alt="user"></span><span class="chat-u-info">'.$first_name.' '.$other_name.'<cite><!--city--></cite></span>
              </div>
              
              <span class="chat-u-status"><i class="fa fa-circle"></i></span>';
		
			echo $get_friend;
		
		 }
		 else{
		 	
		 //	echo "no friend is logged in";
		 }
		}		
     }
	}	
catch(PDOException $error){
	echo("An error occurred");
	
	}

?>
