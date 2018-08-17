<?php

try{
	require("../../aut_session.php");
require("../db/config.php");

$date=date('Y-m-d H:i:s');
//CODE FOR CHECKING IF THE USER HAS UPLOADED A PROFILE PICTURE OR NOT
            //GETTING A RANDOM NAME FOR FILE TO BE UPLOADED
      //      $get_rand_name=mt_rand(1000000000,1000000000000000000000000000000000000000000);
            
        //getting world info from session 
        $world_creator=$_SESSION['world_creator'];
        $world_id_w=$_SESSION['world_id'];   			
//CODE FOR CHECKING IF THE USER HAS UPLOADED A BACKGROUND PICTURE OR NOT FOR WORLD
$check_pic=$dbh->prepare('SELECT *FROM worlds_tbl WHERE CREATED_BY="'.$world_creator.'" AND ID="'.$world_id_w.'" AND REMOVED="NO"');
$check_pic->execute();
$get_pic_db=$check_pic->fetch(PDO::FETCH_ASSOC);
$get_pic=$get_pic_db['WORLD_BACKGROUND_PIC'];
$get_pic_id=$get_pic_db['ID'];


if(isset($_FILES["file1"])){

$target_dir1='';
$target_dir='';
$uploadOk = 1;
$error='';
$fileName =$target_dir1.basename(@$_FILES["file1"]["name"]); // The file name
$fileTmpLoc = $_FILES["file1"]["tmp_name"]; // File in the PHP tmp folder
$fileType_img = $_FILES["file1"]["type"]; // The type of file it is
$fileType=pathinfo($fileName,PATHINFO_EXTENSION);
$fileSize = $_FILES["file1"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["file1"]["error"]; // 0 for false... and 1 for true

if($fileSize > 100000000) {
    $error="Sorry, your file is too large.";
    $uploadOk = 0;
   
}
if (!$fileTmpLoc) { // if file not chosen
    $error= "ERROR: Please browse for a file before clicking the upload button.";
    
}

/// Allow certain file formats
if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"
&& $fileType != "gif" ) {
	$error="Sorry, file format not supported";
    $uploadOk = 0;
    
	 if($fileType != "mp4" && $fileType != "avi" && $fileType != "mkv" && $fileType != "ogg"){
	
	if($fileType != "mp3" && $fileType != "wav"){
	$error="Sorry, file format not supported";
    $uploadOk = 0;
    }{
		$target_dir="user_data/world_audio/";
 $type="audio";
	}
    
}
else{
	$target_dir="user_data/world_videos/";
 $type="video";
}
}
else{
	$target_dir="user_data/world_photos/";
 $type="image";
 

}
//echo $fileType;
//CHECKING IF UPLOADoK IS SET TO ZERO BY AN ERROR
if ($uploadOk == 0) {
   // $error="Sorry, your file was not uploaded.";
    echo $error;
// if everything is ok, try to upload file
}
else{
	//creating new file name
	$rand_name = round(microtime(true)).".";
	$newfilename=str_replace(".",$rand_name,$fileName);
if(move_uploaded_file($fileTmpLoc ,"../../".$target_dir.$newfilename)){
	$category="world_post";
        $category_id=$get_pic_id;
        $file="$newfilename";
        
       
		$post_tracker1= str_shuffle('1234567890');
		$encode1_username=str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
		$encode_username=substr($encode1_username,5,15);
		$post_tracker="worpostimg".round(microtime(true)).$encode_username.$post_tracker1;
		
		//INSERT DATA INTO UPLOAD_PIC_TABLE 
     $insert_file="INSERT INTO uploaded_pics_tbl (USER_UPLOADED,UPLOADED_FILE,DATE_UPLOADED,CATEGORY,CATEGORY_ID,TRACKER)
      VALUES(:user_uploaded,:uploaded_pic,:date_uploaded,:category,:category_id,:tracker)";
     $STM=$dbh->prepare($insert_file);
     //  $STM->bindParam(":user_id",$USER_ID);
	$STM->bindParam(":user_uploaded",$user_login);
	$STM->bindParam(":uploaded_pic",$file);
	$STM->bindParam(":category",$category);
	$STM->bindParam(":category_id",$category_id);
	$STM->bindParam(":tracker",$post_tracker);
	$STM->bindParam(":date_uploaded",$date);
	$STM->execute();
     
        
        $_SESSION['worpost-image']=$file;
     $_SESSION['worpostimg-tracker']=$post_tracker;
        //INSERT DATA INTO UPLOAD_PIC_TABLE 
	
    //echo "$fileName upload is complete";

//ECHOING UPLOADED FILE
	
	
	if($type=="video"){
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
	elseif($type=="audio"){
		echo'<audio controls="controls" >
  <source src="user_data/world_audio/'.$newfilename.'" type="audio/ogg">
  <source src="user_data/world_audio/'.$newfilename.'" type="audio/mpeg">
  <source src="user_data/world_audio/'.$newfilename.'" type="audio/mpeg">
Your browser does not support the audio element.
</audio> ';
	}
	elseif($type=="image"){
		echo'
		<div style="width:220px;height:220px;">
		
		<img style="width:220px;height:220px;" src="user_data/world_photos/'.$newfilename.'"/>
		</div>';
		
	}
	else{
		
	}
	echo '<span style="color:#ff0000">Note: '.$type.' will be  insert below your post</span><br />';
	echo'<div class="form-content" style="padding: 2%;">

                                        <!-- start widget buttons 50 -->
                                        <label>Do You Want These File To Be Insert In Post?</label>
                                       <label class="radio">
                                                      &nbsp;&nbsp;  <input type="radio" id="insert-file" name="insert-file"  value="Yes" >
                                                        <i></i>
                                                        Yes
                                                    </label>
                                                    <label class="radio">
                                                       &nbsp;&nbsp; <input type="radio" id="insert-file" name="insert-file"  value="No" checked="">
                                                        <i></i>
                                                        No
                                                    </label>
   
                                                    </div>
                                                    ';
	
} else {
    echo "move_uploaded_file function failed";
}
	
}
}
else{
	
}

}
	catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
?>