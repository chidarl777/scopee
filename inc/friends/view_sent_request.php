
<?php
//CODE FOR VIEWING SENT REQUEST
try{
	require("db/config.php");
$sql="SELECT *FROM friend_request WHERE REQUEST_FROM=$user_login";
$stmt=$dbh->prepare($sql);
$stmt->execute();
$num_row=$stmt->rowCount();
if($num_row<1){
	echo"YOU HAVE NO SENT REQUEST AT THE MOMENT";
}
else{
	

while($get_result=$stmt->fetch(PDO::FETCH_ASSOC)){

$request_to=$get_result['REQUEST_TO'];
//GETTING USERS INFO FROM THE USER TABLE
$sql1="SELECT *FROM users WHERE USERNAME=$request_to";
$stmt1=$dbh->prepare($sql1);
$stmt1->execute();
$get_info=$stmt1->fetch(PDO::FETCH_ASSOC);
$first_name=$get_info["FIRST_NAME"];
$other_name=$get_info["OTHER_NAME"];
$profile_pic=$get_info["PROFILE_PIC"];

	if(empty($profile_pic)){
			 	$profile_pic2="images/default-pic/images_012.jpg";
			 }
			 else{
			 	$profile_pic2="user_data/profile_pic/".$profile_pic;
			 }
			 
			 $e1=base64_encode($request_to);
			 $encoded1=str_replace("=","_2rtTz",$e1);
				$get_friend="
	<div id='add_friends'>
	<img src='$profile_pic2'/>	
	<a href=''.$encode1.''>$first_name $other_names</a>
	<input  type='submit' name='skip_friend' id='skip_friend' title='Skip' value='X'/>
	<input type='submit' id='add_friend' name='undo_request' title='Add Friend' value='ADD+'>
	</div>";
		
			echo $get_friend;
			
		}		
     }
	}	
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}

?>