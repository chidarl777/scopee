
<?php require_once("inc/check.php"); ?>

<?php
//coding for the send post script

$post_body="";
$post_bodyerr="";
 
if(isset ($_POST['send-post'])){
	
	if(!empty($_POST['post-area'])){
		$post_body1=test_input($_POST['post-area']);
		if(isset($_SESSION['post-image'])&& !empty($_SESSION['post-image'])){
			//$upload_img='<br /><div class="pro-pic"><center><img id="pro-pic" src="user_data/file/'.$_SESSION['post-image'].'"/></center></div>';
			$upload_img=$_SESSION['postimg-tracker'];
		}
		else{
			$upload_img='';
		}
		
		$post_body=$post_body1.' '.$upload_img;
		
	
	$time=Date('');
	$date=Date('Y-m-d h:i:s a');
	$posted_from="$user_login";
	
	try{
	//echo "ssdsdss";
	$encode1_username=str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
		$encode_username=substr($encode1_username,5,15);
		
		if(isset($_SESSION['postimg-tracker']) && !empty( $_SESSION['postimg-tracker'])){
			$post_tracker1= $_SESSION['postimg-tracker'];
			$post_tracker=$post_tracker1;
		}
		else{
			$post_tracker1= str_shuffle('1234567890987');
			$post_tracker="post".round(microtime(true)).$encode_username.$post_tracker1;
		}
		
		
      require("inc/db/config.php");
      
      $SQL=$dbh->prepare("INSERT INTO posts_tbl(POST_TRACKER,POSTED_FROM,POST_MSG,DATE_POSTED) VALUES(:post_tracker,:posted_from,:post_body,:date)");
     $SQL->bindParam(":post_tracker",$post_tracker); 
     $SQL->bindParam(":posted_from",$posted_from);
	$SQL->bindParam(":post_body",$post_body);
	//$SQL->bindParam(":time",$time);
	$SQL->bindParam(":date",$date);
     $SQL->execute();
      
           
     $category='posts_tbl';
     $sub_category='';
     $post_category_id='';
     //==========================================================
     //registering post to in they newsfeed tbl
     //===========================================================
     require('inc/newsfeed/insert_newfeed.inc.php');
     
     unset($_SESSION["post-area"]);
   unset($_SESSION["text-area"]);
     unset($_SESSION["post-image"]);
     unset($_SESSION["postimg-tracker"]);
     $texta='';
     echo 'successful';
     
     
     
}
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
		
	}
	
	else{
		$post_bodyerr="Cannot send an empty post ";
		
	}
}

?>
