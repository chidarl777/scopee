<?php
try{
	

require("../db/config.php");

$date=date('Y-m-d h:i:s a');
//CODE FOR CHECKING IF THE USER HAS UPLOADED A PROFILE PICTURE OR NOT
            //GETTING A RANDOM NAME FOR FILE TO BE UPLOADED
      //      $get_rand_name=mt_rand(1000000000,1000000000000000000000000000000000000000000);
            
            			

            //creating a random directory	
		$chars="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTWXYZ0123456789";
		$rand_dir_name=substr(str_shuffle($chars), 0,15);
	
		//$make_dir=

// Check if image fiwle is a actual image or fake image
if(!empty($_FILES["file1"])) {
	$target_dir1 ="";
	$target_dir="";
$target_file = $target_dir1 . basename(@$_FILES["file1"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
   /*$check = getimagesize($_FILES["file1"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }*/

// Check if file already exists
if (file_exists($target_file)) {
   $error1="Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if (@$_FILES["file1"]["size"] > 100000000) {
    $error2="Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
	$target_dir="user_data/world_photos/";
 $type="image";
}
else{
	
    
    if($imageFileType != "mp4" && $imageFileType != "avi" && $imageFileType != "mkv"
&& $imageFileType != "wmkv"){
	$error3="Sorry, file format not supported";
    $uploadOk = 0;
}
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $error4="Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
	$filename = round(microtime(true)).".";
	$newfilename=str_replace(".",$filename,$target_file);
	
    if (move_uploaded_file(@$_FILES["file1"] ["tmp_name"],$target_dir.$newfilename)) {
        //echo "The file ". basename( $_FILES["file1"]["name"]). " has been uploaded.";
        $background_pic_name=@$_FILES["file1"] ["name"];
        $category="world_tbl";
        $category_id=$get_pic_id;
        $file="$rand_dir_name/$newfilename";
        //INSERT DATA INTO UPLOAD_PIC_TABLE 
     $insert_file="INSERT INTO uploaded_pics_tbl (USER_UPLOADED,UPLOADED_FILE,DATE_UPLOADED,CATEGORY,CATEGORY_ID,UPLOADED_TYPE)
      VALUES(:user_uploaded,:uploaded_pic,:date_uploaded,:category,:category_id,:uploaded_type)";
     $STM=$dbh->prepare($insert_file);
     //  $STM->bindParam(":user_id",$USER_ID);
	$STM->bindParam(":user_uploaded",$world_creator);
	$STM->bindParam(":uploaded_pic",$file);
	$STM->bindParam(":category",$category);
	$STM->bindParam(":category_id",$category_id);
	$STM->bindParam(":uploaded_type",$type);
	$STM->bindParam(":date_uploaded",$date);
	$STM->execute();
	
	//ECHOING UPLOADED FILE
	if($file_type="Video"){
		echo'<video width="320" height="240" controls="controls">
  <source src="test_uploads/'.$newfilename.'" type="video/mkv"><source src="movie.mp4" type="video/mp4">
  <source src="Pizza Without Oven Recipe By Food Fusion - YouTube" type="video/mkv">
  <source src="movie.webm" type="video/webm">
<object data="movie.mp4" width="320" height="240">
  <embed src="movie.swf" width="320" height="240">
</object> 
Your browser does not support the video tag.
</video>';
	}
	elseif($file_type="Audio"){
		
	}
	elseif($file_type="Image"){
		echo'<img src="user_data/world_photos/'.$newfilename.'"/>';
	}
	else{
		
	}

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}

	}
	catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
?>