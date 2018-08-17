<?php
//require("../aut_session.inc.php");
//CODE FOR GETTING USERS THAT ARE NOT FRIEND AND NO REQUEST HAS BEEN SENT
try{
	
	//require("inc/db/config.php");
	$sql=$dbh->prepare("SELECT *FROM users WHERE REMOVED='NO'");
	$sql->execute();
	while($get_users=$sql->Fetch(PDO::FETCH_ASSOC)){
		$users=$get_users['USERNAME'];
		$first_name=$get_users['FIRST_NAME'];
		$other_names=$get_users['OTHER_NAME'];
		$user_id1=$get_users['USER_ID'];
			$idl=$get_users['ID'];		
		$profile_pic=$get_users['PROFILE_PIC'];	
		
		$encoded_id=$user_id1;
		//checking if username equalto user-login
	if($users==$user_login){
		//do nothing
	}
	else{
		$users1=$users;
	//checking if username already exist in the friend request table
			$check_friend_request=$dbh->prepare('SELECT *FROM friend_request WHERE REQUEST_FROM="'.$user_login.'" AND REQUEST_TO="'.$users1.'" AND ACCEPTED="NO" AND IGNORED="NO" AND CANCELLED="NO" OR REQUEST_FROM="'.$users1.'" AND REQUEST_TO="'.$user_login.'" AND ACCEPTED="NO" AND IGNORED="NO" AND CANCELLED="NO"');
			$check_friend_request->execute();
			//get the number of rows returned
			$get_f_request=$check_friend_request->rowCount();
			
						if($get_f_request>0){
				//do nothing
				$add='  <a href="friends.php?undo-fr='.$encoded_id.'"><span class="pull-right"><input type="submit" name="undo'.$encoded_id.'" value="Undo-" class="btn btn-link" id="add" " /></span></a>';
				
		      }
			else{
				$add='  <a href="friends.php?add-fr='.$encoded_id.'"><span class="pull-right"><input type="submit" name="add'.$encoded_id.'" value="Add+" class="btn btn-success" id="add" " /></span></a>';
				if(empty($users1)){
					//echo "request has been sent via all users";
				}
				else{
					$user_skipped=$users1;
					//CODE FOR CHECKING IF USER WAS SKIPPED
					$check_request='SELECT *FROM skip_add_friend WHERE USER_TO="'.$user_skipped.'" AND USER_FROM="'.$user_login.'" OR USER_FROM="'.$user_skipped.'" AND USER_TO="'.$user_login.'"';
	$result=$dbh->prepare($check_request);
	$result->execute();
	$num_row1=$result->rowCount();
	
	if($num_row1>0){
		//echo"cannot skip friend twice sorry";
	}
	else{
				
				$user_frn=$user_skipped;
				//checking if username already exist in the friend table
				$check_friend=$dbh->prepare('SELECT *FROM friends_tbl WHERE SENT_TO="'.$user_frn.'" AND SENT_FROM="'.$user_login.'" || SENT_FROM="'.$user_frn.'" AND SENT_TO="'.$user_login.'"');
				$check_friend->execute();
				//get the number of rows returned
				$get_friend=$check_friend->rowCount();
				if($get_friend>0){
				//do nothing
		      }
			else{
				
				
				
				$users2=$user_frn;
				
				
				$encoded_url=$idl;
				if(empty($profile_pic)){
			 	$profile_pic2="image/default-pic/images_012.jpg";
			 }
			 else{
			 	$profile_pic2='user_data/user_photo/'.$profile_pic.'';
			 }
			 $name=''.'add'.'$encoded_id';
				$get_friend='<div class="individual-user info-expand">
                              <div class="user-intro friend">
                                  <div class="user-thumb"><a href="profile.php?u='.$encoded_url.'"><img src="'.$profile_pic2.'" alt="user"></a></div>
                                  <div class="users-info">
                                      <ul>
                                          <li class="u-name"><a href="profile.php?u='.$encoded_url.'">'.$first_name.' '.$other_names.' </a></li>
                                   
                                      </ul>
                                  </div>
                                  <!-- this is for the toggle icon -->
                                 '.$add.'
                              </div>';
		
			echo $get_friend;
			
			
				}
				}
				}
					
			}		
	
	}	
	
	}	
}		
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}

?>

<?php
//CODE FOR WHEN THE ADD FRIEND BUTTON IS CLICKED

//require("get_users_that_are_not_friends_and_no_request_has_been_sent.inc.php");
$encoded_id2="";
try{
	require_once("inc/check.php");
	//require("inc/db/config.php");
				if(isset($_GET['add-fr'])){
					
	
			$encoded_id2=test_input($_GET['add-fr']);		
			
	$time=date('h:i:s a');
    $date=date('Y-m-d');
    $check_id=$dbh->prepare("SELECT *FROM users WHERE USER_ID=$encoded_id2 AND REMOVED='NO'");
    $check_id->execute();
    $num_id=$check_id->rowCount();
    if($num_id==1){
		$get_id=$check_id->fetch(PDO::FETCH_ASSOC);
		$users2=$get_id['USERNAME'];

    /*
    1.THESE IS WHAT IS NEEDED FOR THE FRIEND REQUEST TABLE(ID,USER_FROM,USER_TO,ACCEPTED,IGNORED,TIME_SENT,DATE_SENT,TIME_ACCEPTED,DATE_ACCEPTED,TIME_IGNORED,DATE_IGNORED);
    *
	*/
	
	//CODE TO CHECK IF $USER2 IS EMPTY
	if(empty($users2)){
		echo "no more friends to add";
		
		
	}
	else{
	$users3=$users2;
	//checking if request has been sent before
	$check_request='SELECT *FROM friend_request WHERE REQUEST_TO="'.$users3.'" AND REQUEST_FROM="'.$user_login.'" AND IGNORED="NO" AND CANCELLED="NO" OR REQUEST_FROM="'.$users3.'" AND REQUEST_TO="'.$user_login.'" AND IGNORED="NO" AND CANCELLED="NO"';
	$result=$dbh->prepare($check_request);
	$result->execute();
	$num_row=$result->rowCount();
	
	if($num_row>0){
		echo"<div style='color:red;'><script type='text/javascript'>alert('An error has error');<script></div>";
	}
	else{
		//INSERTING FRIEND REQUEST INTO THE USER FROM
	$sql='INSERT INTO friend_request (REQUEST_FROM,REQUEST_TO,TIME_SENT,DATE_SENT) VALUES(:user_from,:user_to,:time_sent,:date_sent)';
	
	
    $STM=$dbh->prepare($sql);
     
	$STM->bindParam(":user_from",$user_login);
	$STM->bindParam(":user_to",$users3);
	$STM->bindParam(":time_sent",$time);
	$STM->bindParam(":date_sent",$date);
	$STM->execute();
	
	}
	}
	
	}
	}		
	}	
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}

?>
<?php
//CODE FOR GETTING USERS THAT ARE NOT FRIEND AND THE SKIP BUTTON WAS CLICKED
try{
	//require("inc/db/config.php");
				if(isset($_POST["skip_friend"])){
	
	$time=date('h:i:s a');
    $date=date('Y-m-d');
    /*
    1.THESE IS WHAT IS NEEDED FOR THE FRIEND REQUEST TABLE(ID,USER_FROM,USER_TO,ACCEPTED,IGNORED,TIME_SENT,DATE_SENT,TIME_ACCEPTED,DATE_ACCEPTED,TIME_IGNORED,DATE_IGNORED);
    *
	*/
	//$user_from=$user_login;		
	//CODE TO CHECK IF $USER2 IS EMPTY
	if(empty($users2)){
		echo "no more friends to skip";
		
	}
	else{
	$users4=$users2;
	//checking if request has been sent before
	$check_request='SELECT *FROM skip_add_friend WHERE USER_TO="'.$users4.'" AND USER_FROM="'.$user_login.'" OR USER_FROM="'.$users4.'" AND USER_TO="'.$user_login.'"';
	$result=$dbh->prepare($check_request);
	$result->execute();
	$num_row=$result->rowCount();
	
	if($num_row>0){
		//echo"cannot skip friend twice sorry";
	}
	else{
		//INSERTING FRIEND REQUEST INTO THE USER FROM
	$sql='INSERT INTO skip_add_friend (USER_FROM,USER_TO,TIME_SKIPPED,DATE_SKIPPED) VALUES(:user_from,:user_to,:time_sent,:date_sent)';
	
	
    $STM=$dbh->prepare($sql);
     
	$STM->bindParam(":user_from",$user_login);
	$STM->bindParam(":user_to",$users4);
	$STM->bindParam(":time_sent",$time);
	$STM->bindParam(":date_sent",$date);
	$STM->execute();
	
	}
	}
	}	
		
			
	}	
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}

?>