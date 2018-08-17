<?php
try{
	

require("inc/db/config.php");

$date=date('Y-m-d H:i:s');
//CODE FOR CHECKING IF THE USER HAS UPLOADED A PROFILE PICTURE OR NOT
            //GETTING A RANDOM NAME FOR FILE TO BE UPLOADED
      //      $get_rand_name=mt_rand(1000000000,1000000000000000000000000000000000000000000);
            
            			
//CODE FOR CHECKING IF THE USER HAS UPLOADED A BACKGROUND PICTURE OR NOT FOR WORLD
$check_pic=$dbh->prepare('SELECT *FROM users WHERE USERNAME="'.$user_login.'"');
$check_pic->execute();
$get_pic_db=$check_pic->fetch(PDO::FETCH_ASSOC);
$get_background_pic=$get_pic_db['PROFILE_BACKGROUND_PIC'];
$get_profile_pic=$get_pic_db['PROFILE_PIC'];
$get_pic_id=$get_pic_db['ID'];

            //creating a random directory	
		$chars="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTWXYZ0123456789";
		$rand_dir_name=substr(str_shuffle($chars), 0,15);
	$target_file=$imageFileType="";
	
		//$make_dir=

// Check if image fiwle is a actual image or fake image
if(isset($_FILES["upload-file"])) {
	$texta='';
	//creating they session of the text typed
	if(empty($_POST['post-area'])){
		//do nothing
		}
		else{
			
		$_SESSION['post-area']=$_POST['post-area'];
	}
	if(!(empty($_FILES["upload-file"]))) {
	$target_dir="user_data/file/";
	$target_dir1 = "";
$target_file = $target_dir1. basename(@$_FILES["upload-file"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    $check = getimagesize($_FILES["upload-file"]["tmp_name"]);
    if($check !== false) {
       // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
       // echo "File is not an image.";
        $uploadOk = 0;
    }

// Check if file already exists
if (file_exists($target_file)) {
   $error1="Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if (@$_FILES["world-background-pic"]["size"] > 1000) {
   // $error2= "Sorry, your file is too large.";
  echo "<script type='text/javascript'>alert('Sorry, file size is too large.');</script>";
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
	
	//$file_explode=explode(".",$target_file);

	$filename = round(microtime(true)).".";
	$newfilename=str_replace(".",$filename,$target_file);
	
	

	
    if (move_uploaded_file($_FILES["upload-file"]["tmp_name"],$target_dir.$newfilename)) {
        //echo "The file ". basename( $_FILES["world-background-pic"]["name"]). " has been uploaded.";
        $profile_pic_name=@$newfilename;
        $category="post";
        $category_id=$get_pic_id;
        $file="$newfilename";
        $min=10000000000;
	$max=10000000000000000000;
		$post_tracker1= str_shuffle('12345678901982');
		$encode1_username=str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
		$encode_username=substr($encode1_username,5,15);
		$post_tracker="postimg".round(microtime(true)).$encode_username.$post_tracker1;
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
     
     $_SESSION['post-image']=$file;
     $_SESSION['postimg-tracker']=$post_tracker;
   //  echo $_SESSION['post-image'];
  // echo $_SESSION['post-image'];
     $sub_category='';
     $post_category_id='';
	//==========================================================
     //registering post to in they newsfeed tbl
     //===========================================================
     require('inc/newsfeed/insert_newfeed.inc.php');
		//	header("location:profile.php");
    } else {
        echo "<script type='text/javascript'>alert('Sorry, there was an error uploading your file.');</script>";
    }
}
}
}

	}
	catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
?>