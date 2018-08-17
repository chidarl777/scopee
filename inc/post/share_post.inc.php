

<?php


require_once("inc/check.php"); 
/**
 * @author
 * @copyright 2015
 */
//checking for dangerous html characters and strimming white spaces
$errors=$shareerr="";
//$share_with=$share_to="";
;
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
	try{
		
		$share1=$share;
		
if(isset($_POST['share_pos']) && !empty($share1)){
	
	if($share=='message'){
$share_with=$share1;
		//IF SHARE WITH IS EQUAL TO MESSAGE
if(is_array($_POST["checkbox_user"])){
	
		$violation_save=implode(',',$_POST["checkbox_user"]); 
	
	}
else {

   $violation_save=$_POST["$users_friends"];

	
	}
	

$share_to= $violation_save;

}
elseif($share1=='friend'){
	//IF SHARE_WITH IS EQUAL TO FRIENDS
	$share_with=$share1;

$share_to=$share_with;

}
else{
	echo "has no been completed yet";
}


$time=date('h:i:s a');
$date=date('Y-m-d');


 if (empty($errors)){

	$share_with=$share;
	
	$post_from=$posted_from;
	$id=$post_id;
      require("inc/db/config.php");//====================================================================
	//	CHECKING IF THE USER HAS ALREADY SHARED THAT POST
	//====================================================================
        $SQL='SELECT *FROM share_tbl WHERE SHARED_FROM="'.$user_login.'" AND POSTED_FROM="'.$post_from.'"AND POST_ID="'.$id.'"';
		$result=$dbh->prepare($SQL);
		$result->execute();
		$row_count=$result->rowCount();
		
		if ($row_count>0){
		$shareerr ='You have already shared this post with friend';
		}
		else{
		//insert data to database if value are not empty and sanitized
   $SQL="INSERT INTO share_tbl(SHARED_FROM,POSTED_FROM,POST_ID,SHARED_WITH,SHARED_TO,DATE_SHARED)
    VALUES(:shared_from,:posted_from,:post_id,:shared_with,:shared_to,:date)";
    
    
   $STM=$dbh->prepare($SQL);
    $STM->bindParam(":shared_from",$user_login);
	$STM->bindParam(":posted_from",$post_from);
	$STM->bindParam(":post_id",$id);
	$STM->bindParam(":shared_with",$share_with);
	$STM->bindParam(":shared_to",$share_to);
	$STM->bindParam(":date",$date);
	
	$STM->execute();
}

}
}
else{
	echo "you share field is empty";
}
}
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}



?>