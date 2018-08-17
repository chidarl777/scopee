<?php
$search_result2="";
$search_err="";
//CODE FOR SEARCH FOR FRIENDS
require_once("inc/check.php");
if(isset($_POST['search-friend-btn'])){
	if(empty($_POST['search-friends'])){
	$get_search_friend="search field is empty";	
	}
	else{
		
		
  $check_field=test_input($_POST['search-friends']);
  $explode_search_str=explode(' ',$check_field);
for($i = 0; $i<count($explode_search_str); $i++){
	$chunks="";
	$chunks= $explode_search_str[$i];
	
	
	
}
  
}
 
 try{
 	require("inc/db/config.php");
 	$sql='SELECT *FROM users WHERE FIRST_NAME="'.$chunks.'" AND REMOVED="NO"|| OTHER_NAME="'.$chunks.'" AND  REMOVED="NO"';
 	
 	$get_result=$dbh->prepare($sql);
 	$get_result->execute();
 	$num_rows=$get_result->rowCount();
 	if($num_rows==0){
	 echo "no result found";
	}
	else{
		//echo "successful";
		//GET THE USERNAMEIN THE FRIEND ARRAY
		//GET USERNAME OF PEOPLE THAT ARE NOT FRIEND BUT WITH THE SAME NAME
		
			
	while($search_r=$get_result->fetch(PDO::FETCH_ASSOC)){
		
	
		//$search_result_f=$search_r['FIRST_NAME'];
		//$search_result_o=$search_r['OTHER_NAME'];
		$search_result_u=$search_r['USERNAME'];
		//$profile_pic=$search_r['PROFILE_PIC'];
		
		//CHECKING IF USERNAME ALREADY EXIST IN FRIEND ARRAY
		
	$sql='SELECT *FROM friends_tbl WHERE SENT_FROM="'.$search_result_u.'" AND SENT_TO="'.$user_login.'" || SENT_TO="'.$search_result_u.'" AND SENT_FROM="'.$user_login.'"';
 	
 	$get_result1=$dbh->prepare($sql);
 	$get_result1->execute();
 	$num_rows1=$get_result1->rowCount();
 	if($num_rows1>0){
 		
 		$search_result1=$get_result1->fetch(PDO::FETCH_ASSOC);
 		$user_from=$search_result1["SENT_FROM"];
 		$user_to=$search_result1['SENT_TO'];
 		

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
 		$firstname_s=$stmt['FIRST_NAME'];
 		$othernames_s=$stmt['OTHER_NAME'];
 		$profile_pic_sch=$stmt['PROFILE_PIC'];
 		//echo friends that has the name with the search input
 					if(empty($profile_pic_sch)){
			 	$profile_pic2="images/default-pic/images_012.jpg";
			 }
			 else{
			 	$profile_pic2="user_data/profile_pic/".$profile_pic;
			 }
 	 
			 $enurl=base64_encode($friend_uname);
			 $encoded_url=str_replace("=","_2rtTz",$enurl);
				$$search_result2='                          <div class="individual-user info-expand">
                              <div class="user-intro friend">
                                  <div class="user-thumb"><a href="'.$encoded_url.'"><img src="'.$profile_pic2.'" alt="user"></a></div>
                                  <div class="users-info">
                                      <ul>
                                          <li class="u-name"><a href="'.$encoded_url.'">'.$firstname_s.' '.$othernames_s.'</a></li>
                                         
                                      </ul>
                                  </div>
                                  <!-- this is for the toggle icon -->
                              
                              </div>
                            
                          </div>';
                          
echo $search_result2;


	}
	else{
		$search_err="no result";
		if($search_err>0){
			
		
 $search_result2="NO RESULT WAS FOUND!!!";
 echo $search_result2;
 
 }
	}
}
	}
	
 	}
 
 catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
}
else{
 require("inc/friends/view_friends.inc.php");
}


?>