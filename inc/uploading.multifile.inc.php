<?php
try{
	

require("inc/db/config.php");

//CODE FOR CHECKING IF THE USER HAS UPLOADED A BACKGROUND PICTURE OR NOT FOR WORLD
$check_pic=$dbh->prepare('SELECT WORLD_BACKGROUND_PIC FROM worlds_tbl WHERE CREATED_BY="'.$user_login.'"');
$check_pic->execute();
$get_pic_db=$check_pic->fetch(PDO::FETCH_ASSOC);
$get_pic=$get_pic_db['WORLD_BACKGROUND_PIC'];
if(empty($get_pic)){
	$world_background_pic="images/default-pic/images_012.jpg";
}
else{
	$world_default_pic="user_data/world_photos".$get_pic;
}

$date=date('Y-m-d h:i:s a');
//CODE FOR CHECKING IF THE USER HAS UPLOADED A PROFILE PICTURE OR NOT
            //GETTING A RANDOM NAME FOR FILE TO BE UPLOADED
      //      $get_rand_name=mt_rand(1000000000,1000000000000000000000000000000000000000000);
            
            //creating a random directory	
		$chars="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTWXYZ0123456789";
		$rand_dir_name=substr(str_shuffle($chars), 0,15);
	
		//$make_dir=

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
	$target_dir = mkdir("user_data/world_photos/$rand_dir_name");;
$target_file = $target_dir . basename(@$_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
   $check = getimagesize($target_file);
   if($check !== false) {
       echo "File is an image - " . $check["mime"] . ".";
       $uploadOk = 1;
   } else {
       echo "File is not an image.";
       $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
   $error1="Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if (@$_FILES["fileToUpload"]["size"] > 1000000) {
    $error2="Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
   $error3="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $error4="Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
	
	//GENERATING  A RANDOM FILE NAME BASE ON THE TIME 
	
	$file_explode=explode(" ",$target_file);
	
	$newfilename = round(microtime(true)) . '.' . end($target_file);
	
    if (move_uploaded_file($_FILES["fileToUpload"] ["tmp_name"], $newfilename)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $background_pic_name=@$_FILES["fileToUpload"] ["name"];
        $category="worlds_tbl";
        $category_id=$world_id;
        
        //INSERT DATA INTO UPLOAD_PIC_TABLE 
     $insert_file="INSERT INTO uploaded_pics_tbl (USER_UPLOADED,UPLOADED_PICS,DATE_UPLOADED,CATEGORY,CATEGORY_ID,UPLOADED_TYPE);
      VALUES(:user_uploaded,:uploaded_pic,:date_uploaded,:category,:category_id,:uploaded_type)";
      $dbh->prepare($insert_file);
       $STM->bindParam(":user_id",$USER_ID);
	$STM->bindParam(":user_uploaded",$user_login);
	$STM->bindParam(":uploaded_pic",$uploaded_pic);
	$STM->bindParam(":category",$category);
	$STM->bindParam(":category_id",$category_id);
	$STM->bindParam("::uploaded_type",$type);
	$STM->bindParam(":date_uploaded",$date);
	$STM->execute();
	echo "successful";
       
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

	}
	catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
?>