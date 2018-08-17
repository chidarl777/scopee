<?php
try{
	

require("inc/db/config.php");
//CODE FOR CHECKING IF THE USER HAS UPLOADED A PROFILE PICTURE OR NOT
/*$check_pic=$dbh->prepare("SELECT PROFILE_PIC FROM users WHERE USERNAME=$user_login");
$check_pic->execute();
$get_pic_db=$check_pic->fetch(PDO::FETCH_ASSOC);
$get_pic=$get_pic_db['PROFILE_PIC'];
if(empty($get_pic)|| $get_pic=="NONE"){
	$profile_pic="../images/default-pic/images_012.jpg";
}
else{
	$profile_pic="../user_data/profile_pic".$get_pic;
}
*/
//CODE FOR UPLOADING PROFILE PIC
if(isset($_POST["submit"])){

	if(((@$_FILES["profile_pic"] ["type"]=="image/jpeg") ||( @$_FILES["profile_pic"] ["type"]=="image/png") || (@$_FILES["profile_pic"] ["type"]=="image/gif")) && (@$_FILES["profile_pic"] ["size"]>1048576 /*equal to 1 megabyte*/)){
		echo"ssssssssssssssssssssssssssssssssssssssssssss";
	die();
		$chars="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTWXYZ0123456789";
		$rand_dir_name=substr(shuffle($chars), 0,15);
		
		mkdir("user_data/profile_pic/$rand_dir_name");
		
		if(file_exists("../user_data/profile_pic/$rand_dir_name".@$_FILES["profile_pic"] ["name"])){
			echo @$_FILES["profile_pic"] ["name"]."Already Exist";
		}
		else{
			move_uploaded_file(@$_FILES["profile_pic"] ["tmp_name"]."../user_data/profile_pic/$rand_dir_name". @$_FILES["profile_pic"] ["name"]);
			//echo "uploaded and store in ". @$_FILES["profile_pic"] ["name"]
			$profile_pic_name=@$_FILES["profile_pic"] ["name"];
		     //INSERT DATA INTO UPLOAD_PIC_TABLE 
     $insert_file="INSERT INTO uploaded_pics_tbl (USER_UPLOADED,UPLOADED_PICS,DATE_UPLOADED,CATEGORY,CATEGORY_ID,UPLOADED_TYPE,TRACKER);
      VALUES(:user_uploaded,:uploaded_pic,:date_uploaded,:category,:category_id,:uploaded_type,:tracker)";
      $dbh->prepare($insert_file);
       $STM->bindParam(":user_id",$USER_ID);
	$STM->bindParam(":user_uploaded",$user_login);
	$STM->bindParam(":uploaded_pic",$uploaded_pic);
	$STM->bindParam(":category",$category);
	$STM->bindParam(":category_id",$category_id);
	$STM->bindParam("::uploaded_type",$type);
	$STM->bindParam(":date_uploaded",$date);
	$STM->bindParam(":tracker",$tracker);
	$STM->execute();
	echo "successful";
		}
	}
	else{
	echo("Invalid image! Image size to large");
	}
	
	}
	}
	catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
?>