<?php

//CODE FOR SEARCH FOR FRIENDS
require_once("inc/check.php");
if(isset($_POST['find-friend-btn'])){
	if(empty($_POST['find-friends'])){
	$get_search_friend="search field is empty";	
	}
	else{
		
		
  $check_field=test_input($_POST['find-friends']);
  $explode_search_str=explode(' ',$check_field);
for($i = 0; $i<count($explode_search_str); $i++){
	$chunks="";
	$chunks= $explode_search_str[$i];
	
	
	
}
  
}
 
 try{
 	require("inc/db/config.php");
 	$sql='SELECT *FROM users WHERE FIRST_NAME="'.$chunks.'" || OTHER_NAME="'.$chunks.'"';
 	
 	$get_result=$dbh->prepare($sql);
 	$get_result->execute();
 	$num_rows=$get_result->rowCount();
 	if($num_rows==0){
	 $input_err="no result found";
	 if($input_err >0){
	 	$get_friend="NO RESULT FOUND !!!";
	 }
	}
	else{
		//echo "successful";
		//GET THE USERNAMEIN THE FRIEND ARRAY
		//GET USERNAME OF PEOPLE THAT ARE NOT FRIEND BUT WITH THE SAME NAME
		
			
	while($search_r=$get_result->fetch(PDO::FETCH_ASSOC)){
		
	
		$search_result_f=$search_r['FIRST_NAME'];
		//$search_result_o=$search_r['OTHER_NAME'];
		$search_result_u=$search_r['USERNAME'];
		$profile_pic=$search_r['PROFILE_PIC'];
		
				
				
 		if(empty($profile_pic)){
			 	$profile_pic2="images/default-pic/images_012.jpg";
			 }
			 else{
			 	$profile_pic2="user_data/profile_pic/".$profile_pic;
			 }
		//CHECKING IF USERNAME ALREADY EXIST IN FRIEND ARRAY
		
	$sql='SELECT *FROM friend_request WHERE REQUEST_FROM="'.$search_result_u.'" AND REQUEST_TO="'.$user_login.'"AND ACCEPTED="NO" AND IGNORED="NO" || REQUEST_TO="'.$search_result_u.'" AND REQUEST_FROM="'.$user_login.'" AND ACCEPTED="NO" AND IGNORED="NO"';
 	
 	$get_result1=$dbh->prepare($sql);
 	$get_result1->execute();
 	$num_rows1=$get_result1->rowCount();
 	if($num_rows1>0){
 		
 		$search_result1=$a->fetch(PDO::FETCH_ASSOC);
 		$user_from=$search_result1["REQUEST_FROM"];
 		$user_to=$search_result1['REQUEST_TO'];
 		

 	//using if statement to check which field is user login and are they freinds with username
 	if($user_from==$user_login){
		$friend_uname=$user_to;
	}
	else{
		$friend_uname=$user_from;
	}
	
 		//getting the correct name of the user searched
 		$SQL='SELECT FIRST_NAME , OTHER_NAME ,PROFILE_PIC FROM users WHERE USERNAME="'.$friend_uname.'"';
 		$STM=$dbh->prepare($SQL);
 		$STM->execute();
 		$stmt=$STM->fetch(PDO::FETCH_ASSOC);
 		$first_name=$stmt['FIRST_NAME'];
 		$other_name=$stmt['OTHER_NAME'];
 		//$profile_pic_r=$stmt['PROFILE_PIC'];
 		//echo friends that has the name with the search input
 	   

                   
			 
 					 $encoded_id=$request_id;
					$get_friend_r='
					<div class="widget-container margin-top-0">
              <div class="widget-content">
                  <div class="recent-users">
                      <div class="recent-users-list" id="friendrequest-panel" onmousemove="geriendrequest()"> <form method="POST" action="">
					<div class="individual-user info-expand">
                              <div class="user-intro friend">
                                  <div class="user-thumb"><a href="profile.php?u='.$encoded_id.'><img src='.$profile_pic2.' alt="user"></a></div>
                                  <div class="users-info">
                                      <ul>
                                          <li class="u-name"><a href="profile.php">'.$first_name.' '.$other_names.' </a></li>
                                   
                                      </ul>
                                  </div>
                                  <!-- this is for the toggle icon -->
                                  <span class="pull-right"><input type="submit" name="ignore-request'.$encoded_id.'" value="Ignore" class="btn btn-warning" id="ign"  /></span>
                                    <span class="pull-right"><input type="submit" name="accept-request'.$encoded_id.'" value="accept" class="btn btn-success" id="acc" /></span>
                              </div>
                                <br><br><hr>
                  </form>
                      </div>
                  </div>
             
          <!-- friend request panel ends here -->
                  <!-- <p>All recent registered members</p> -->
              </div>
          </div>
                              ';
        
 	    //getting the num of requiest;    
 	    if($get_friend_r > 0){
			$request_header='           <!-- friend request panel -->
            <div class="widget-header block-header margin-bottom-0 clearfix">
              <div class="pull-left">
                  <h3>Friend Request</h3>
                  </div>
                  </div>';
                  echo $request_header;
		}
		echo $get_friend_r;
   
	}
	else{
		//I.E IF THE WORD THE USER SEARCH FOR HAS NOT SEND THE REQUEST
		
	
					 $encoded_id=$request_id;
					 
					$get_friend_r='         <div class="widget-container margin-top-0">
              <div class="widget-content">
                  <div class="recent-users">
                  <form method="POST" action="">
                      <div class="recent-users-list" id="addfriend-panel" onmousemove="gtusrntfriend()"><div class="individual-user info-expand">
                              <div class="user-intro friend">
                                  <div class="user-thumb"><a href="'.$encoded_url.'"><img src="'.$profile_pic2.'" alt="user"></a></div>
                                  <div class="users-info">
                                      <ul>
                                          <li class="u-name"><a href="'.$encoded_url.'">'.$first_name.' '.$other_names.' </a></li>
                                   
                                      </ul>
                                  </div>
                                  <!-- this is for the toggle icon -->
                                  <span class="pull-right"><input type="submit" name="add'.$encoded_id.'" value="Add+" class="btn btn-success" id="add"  /></span>
                              </div>
		
           
                      </div>
                      
                      </form>
                  </div>
              </div>
          </div>';
          
          $num_search_out=$get_friend_r;
		if($num_search_out > 0){
			$paddies_header='<div class="widget-header block-header margin-bottom-0 clearfix">
              <div class="pull-left">
                  <h3>Paddies you may know</h3>
                  <!-- <p>All recent registered members</p> -->
              </div>
          </div>';
          echo $paddies_header;
			}
		echo $get_friend_r;
   
	}
}
	}
	
 	}
 
 catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
}
else{
	//$get_users_not_friend=
	//$get_request_of_user=
	$add_friends='           <!-- friend request panel -->
            <div class="widget-header block-header margin-bottom-0 clearfix">
              <div class="pull-left">
                  <h3>Friend Request</h3>
                  </div>
                  </div>
	                   <div class="widget-container margin-top-0">
              <div class="widget-content">
                  <div class="recent-users">
                      <div class="recent-users-list" id="friendrequest-panel" onmousemove="geriendrequest()"> <form method="POST" action="">'.		$encoded_id="";
		
	//GETTING FRIEND REQUEST FOR A USER LOGGED IN
	
	$SQL=$dbh->prepare('SELECT *FROM friend_request WHERE REQUEST_TO="'.$user_login.'" AND ACCEPTED="NO" AND IGNORED="NO"');
	$SQL->execute();
    $num_row=$SQL->rowCount();
    
    if($num_row<1){
		echo "You have no request at the moment";
	}
	else{
		while($get_request=$SQL->fetch(PDO::FETCH_ASSOC)){
		
			$user_from=$get_request['REQUEST_FROM'];
			$time_sent=$get_request['TIME_SENT'];
			$date_sent=$get_request['DATE_SENT'];
			$request_id=$get_request['ID'];
		$get_info='SELECT *FROM users WHERE USERNAME="'.$user_from.'"';
		$get_request_info=$dbh->prepare($get_info);
		$get_request_info->execute();
		
		$array_info=$get_request_info->fetch(PDO::FETCH_ASSOC);
		$first_name=$array_info['FIRST_NAME'];
		$other_names=$array_info['OTHER_NAME'];
		$profile_pic=$array_info['PROFILE_PIC'];
		if(empty($user_from)){
			//do nothing
		}
		else{
			$user_from1=$user_from;
		}
		
		if(empty($profile_pic)){
			 	$profile_pic2="images/default-pic/images_012.jpg";
			 }
			 else{
			 	$profile_pic2="user_data/profile_pic/$profile_pic";
			 }
			 $encoded_id=$request_id;
					$get_friend_r='<div class="individual-user info-expand">
                              <div class="user-intro friend">
                                  <div class="user-thumb"><a href="profile.php?u='.$encoded_id.'><img src='.$profile_pic2.' alt="user"></a></div>
                                  <div class="users-info">
                                      <ul>
                                          <li class="u-name"><a href="profile.php">'.$first_name.' '.$other_names.' </a></li>
                                   
                                      </ul>
                                  </div>
                                  <!-- this is for the toggle icon -->
                                  <span class="pull-right"><input type="submit" name="ignore-request'.$encoded_id.'" value="Ignore" class="btn btn-warning" id="ign"  /></span>
                                    <span class="pull-right"><input type="submit" name="accept-request'.$encoded_id.'" value="accept" class="btn btn-success" id="acc" /></span>
                              </div>';
		 $get_friend_r;
   
	}
		
		}
		.'
                     <br><br><hr>
                  </form>
                      </div>
                  </div>
             
          <!-- friend request panel ends here -->
                  <!-- <p>All recent registered members</p> -->
              </div>
          </div>
          <div class="widget-header block-header margin-bottom-0 clearfix">
              <div class="pull-left">
                  <h3>Paddies you may know</h3>
                  <!-- <p>All recent registered members</p> -->
              </div>
          </div>
          <div class="widget-container margin-top-0">
              <div class="widget-content">
                  <div class="recent-users">
                  <form method="POST" action="">
                      <div class="recent-users-list" id="addfriend-panel" onmousemove="gtusrntfriend()">'.
	$sql=$dbh->prepare("SELECT *FROM users");
	$sql->execute();
	while($get_users=$sql->Fetch(PDO::FETCH_ASSOC)){
		$users=$get_users['USERNAME'];
		$first_name=$get_users['FIRST_NAME'];
		$other_names=$get_users['OTHER_NAME'];
		$user_id1=$get_users['USER_ID'];	
		$profile_pic=$get_users['PROFILE_PIC'];	
		
		//checking if username equalto user-login
	if($users==$user_login){
		//do nothing
	}
	else{
		$users1=$users;
	//checking if username already exist in the friend request table
			$check_friend_request=$dbh->prepare('SELECT *FROM friend_request WHERE REQUEST_FROM="'.$user_login.'" AND REQUEST_TO="'.$users1.'" AND ACCEPTED="YES" AND IGNORED="NO" AND CANCELLED="NO" || REQUEST_FROM="'.$users1.'" AND REQUEST_TO="'.$user_login.'" AND ACCEPTED="YES" AND IGNORED="NO" AND CANCELLED="NO"');
			$check_friend_request->execute();
			//get the number of rows returned
			$get_f_request=$check_friend_request->rowCount();
			
						if($get_f_request>0){
				//do nothing
				
		      }
			else{
				if(empty($users1)){
					echo "request has been sent via all users";
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
				$encoded_id=$user_id1;
				
				
				$users2=$user_frn;
				
				$d_url=base64_encode($users2);
				$encoded_url=str_replace("=","_2rtTz",$d_url);
				if(empty($profile_pic)){
			 	$profile_pic2="image/default-pic/images_012.jpg";
			 }
			 else{
			 	$profile_pic2='user_data/profile_pic/'.$profile_pic.'';
			 }
			 $name=''.'add'.'$encoded_id';
				$get_friend='<div class="individual-user info-expand">
                              <div class="user-intro friend">
                                  <div class="user-thumb"><a href="'.$encoded_url.'"><img src="'.$profile_pic2.'" alt="user"></a></div>
                                  <div class="users-info">
                                      <ul>
                                          <li class="u-name"><a href="'.$encoded_url.'">'.$first_name.' '.$other_names.' </a></li>
                                   
                                      </ul>
                                  </div>
                                  <!-- this is for the toggle icon -->
                                  <span class="pull-right"><input type="submit" name="add'.$encoded_id.'" value="Add+" class="btn btn-success" id="add" onclick="loaddfriend()" /></span>
                              </div>';
		
			$get_friend;
			
				}
				}
				}
					
			}		
	
	}	
	
	}	
.'
           
                      </div>
                      
                      </form>
                  </div>
              </div>
          </div>';
          echo $add_friends;
}


?>