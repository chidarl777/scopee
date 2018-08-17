	<?php 

//getting the world adress on the adress bar
if(isset($_GET["u"])){
	
	
	$edit_profile_btn="";
	try{
	$uid_pro=$_GET['u'];
	
	IF(ctype_alnum($uid_pro)){
	
	//CHECKING IF WORLD EXIST
	$SQL=$dbh->prepare('SELECT *FROM users WHERE ID="'.$uid_pro.'" AND REMOVED="NO"');
	$SQL->execute();
	
	//getting rows returned
	$num_sql1=$SQL->rowCount();
	
	 if($num_sql1==1){
	 	$get_data=$SQL->fetch(PDO::FETCH_ASSOC);
	 	$userlog=$get_data["USERNAME"];
	 	//$id=$get_data["WORLD_NAME"];
	 	$id=$get_data["ID"];
	 	$pro_firstname=$get_data['FIRST_NAME'];
	 	$pro_othername=$get_data['OTHER_NAME'];
	 	$profile_pic_u1=$get_data['PROFILE_PIC'];
	 	$profile_background_pic_ul=$get_data['PROFILE_BACKGROUND_PIC'];
	 					if(empty($profile_pic_u1)){
			 $profile_pic_user="image/default-pic/images_012.jpg";
			 }
			 else{
			 $profile_pic_user='user_data/user_photo/'.$profile_pic_u1.'';
			 }
			 if(empty($profile_background_pic_ul)){
	$p_background_pic2="img/k1.jpg";
}
else{
	$p_background_pic2="user_data/user_photo/$profile_background_pic_ul";
}

$p_background_pic="
.cover
{
  background-image: url('$p_background_pic2');
  background-size:cover;
    background-repeat: no-repeat;
    height: 250px;
    
}";
	 	//echo "success";
	if($userlog==$user_login){
		$edit_profile_btn='<a><input  type="button" id="edit-profile" value="Edit profile"/></a>';
	}
	else{
		
	}
	
	 }
	 else{
	// 	echo "user does not exist";
	 session_destroy();
	 	header("location:index.php");
	 
	 	
	}	
	 }
}
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
	
	}
?>