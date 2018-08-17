<?php

//getting the world adress on the adress bar

if(isset($_GET["wor"])){
	try{
	
	 //	require_once'inc/check.php';
	
	$world_creator="";
	 	$w_adress="";
	 	$w_name='';
	 	$other_name_w="";
	 	$first_name_w="";
	 	$world_id_w='';
	 	$post_id=$world_category="";
	 	$world_background_pic2='';
	 	$world_description='';
	 	$world_view='';
	 	$age_criteria='';
	 	$gender_view='';
	 	$world_post='';
	 	$world_comment='';
	 	$worlderr=$world_edit_btn="";
	 	$world_edit_btn=$edit_btn='';
	 	
	
	$check_u=$_GET['wor'];
 require("inc/db/config.php");
 //require('inc/datetimediff.inc.php');
	//CHECKING IF WORLD EXIST
	$SQL_w2=$dbh->prepare('SELECT *FROM worlds_tbl WHERE WORLD_ADRESS="'.$check_u.'" AND REMOVED="NO"');
	$SQL_w2->execute();
	//getting rows returned
	$num_sql=$SQL_w2->rowCount();
	
	
	 if($num_sql==1){
	 	
	 	$get_data=$SQL_w2->fetch(PDO::FETCH_ASSOC);
	 	$world_creator=$get_data['CREATED_BY'];
	 	$w_adress=$get_data['WORLD_ADRESS'];
	 	$w_name=$get_data['WORLD_NAME'];
	 	
	 	$world_id_w=$get_data['ID'];
	 	$world_background_pic2=$get_data['WORLD_BACKGROUND_PIC'];
	 	$world_description=$get_data['WORLD_DESCRIPTION'];
	 	$world_tags=$get_data['WORLD_TAG'];
	 	$world_view=$get_data['WORLD_VIEW'];
	 	$world_category=$get_data["WORLD_CATEGORY"];
	 	$age_criteria=$get_data['AGE_CRITERIA'];
	 	$gender_view=$get_data["WORLD_GENDER"];
	 	$world_post=$get_data['WORLD_POST'];
	 	$world_comment=$get_data['WORLD_COMMENT'];
	 	$world_sms=$get_data['SMS'];
	 	$world_profile_pic1=$get_data['WORLD_PROFILE_PIC'];
	 	
	 	//CHECKING IF THE USER HAS UPLOADED ANY PROFILE PIC
			 if(empty($world_profile_pic1)){
			 	$world_profile_pic="image/default-pic/images_012.jpg";
			 }
			 else{
			 	$world_profile_pic="user_data/world_photos/$world_profile_pic1";
			 }
			 
	 	//encoding world creator
	 		//$d_url=base64_encode($world_creator);
			
	 	//GETTING USERS INFO FROM THE USER TABLE
$sql1='SELECT *FROM users WHERE USERNAME="'.$world_creator.'"';
$stmt1=$dbh->prepare($sql1);
$stmt1->execute();
$get_info=$stmt1->fetch(PDO::FETCH_ASSOC);
$first_name_w=$get_info["FIRST_NAME"];
$other_name_w=$get_info["OTHER_NAME"];
$id_w=$get_info["ID"];
	$encoded_url=$id_w;
	 	if(empty($world_background_pic2)){
	$w_background_pic2="img/k1.jpg";
}
else{
	$w_background_pic2="user_data/world_photos/$world_background_pic2";
}

$w_background_pic='
.cover
{
  background-image: url("'.$w_background_pic2.'");
  background-size:cover;
    background-repeat: no-repeat;
    height: 300px;
    
}';

//checking if world creator enabled sms for these world
if($world_sms=='YES'){
	$sms_button='<li><a id="send-sms" href="sendsms.php?wor='.$check_u.'"><span class="glyphicon glyphicon-edit"></span>Send sms</a></li>';
}
else{
	$sms_button='';
}
//STARTING SESSION

//session_start();

	 }
	 else{
	 	$worlderr='<p style="color:#ff0000; margin-top:30px;">WORLD DOES NOT EXIST OR HAS BEEN REMOVED BY IT CREATOR</p>';
	 	echo'<script type="text/javascript">alert("WORLD DOES NOT EXIST OR HAS BEEN REMOVED BY IT CREATOR");</script>';
	 	echo $worlderr;
	 	die();
		
	}	
	// }
	 

}
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
	
	}
?>
<?php
if(isset($_GET["world.post.id"])){
	
	try{
	$check_u1=test_input($_GET['world.post.id']);
	$post_id=$check_u1;


}
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
	
	}
	else{
		$post_id="";
	}
?>

<!doctype html>
<html>
<head>
  <meta>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="<?php echo $world_description; ?>"/>
  <meta name="keywords" content="<?php echo $world_tags;?>"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <title><?php echo $w_name; ?></title>
     <link rel="icon"  type="image/ico"  href="favicon.ico" />
     <?php  session_start(); 
     If(isset($_SESSION["user_login"]) && !(empty($_SESSION["user_login"]))){
     	echo '
     	<link type="text/css" rel="stylesheet" href="cssa/font-awesome.css">
  <link type="text/css" rel="stylesheet" href="cssa/material-design-iconic-font.css">
  <link type="text/css" rel="stylesheet" href="cssa/bootstrap.css">
  <link type="text/css" rel="stylesheet" href="cssa/animate.css">
  <link type="text/css" rel="stylesheet" href="cssa/layout.css">
  <link type="text/css" rel="stylesheet" href="cssa/components.css">
  <link type="text/css" rel="stylesheet" href="cssa/widgets.css">
  <link type="text/css" rel="stylesheet" href="cssa/plugins.css">
  <link type="text/css" rel="stylesheet" href="cssa/pages.css">
  <link type="text/css" rel="stylesheet" href="css/bootstrap-extend.css">
  <link type="text/css" rel="stylesheet" href="cssa/common.css">
  <link type="text/css" rel="stylesheet" href="cssa/responsive.css">
  <link type="text/css" id="themes" rel="stylesheet" href="css/style.css">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link type="text/css"  rel="stylesheet" href="css/n_layout.css">
     	';
     	}
     	else{
     		echo '<link type="text/css" rel="stylesheet" href="css/font-awesome.css">
  <link type="text/css" rel="stylesheet" href="css/material-design-iconic-font.css">
  <link type="text/css" rel="stylesheet" href="css/bootstrap.css">
  <link type="text/css" rel="stylesheet" href="css/animate.css">
  <link type="text/css" rel="stylesheet" href="css/layout.css">
  <link type="text/css" rel="stylesheet" href="css/components.css">
  <link type="text/css" rel="stylesheet" href="css/widgets.css">
  <link type="text/css" rel="stylesheet" href="css/plugins.css">
  <link type="text/css" rel="stylesheet" href="css/pages.css">
  <link type="text/css" rel="stylesheet" href="css/bootstrap-extend.css">
  <link type="text/css" rel="stylesheet" href="css/common.css">
  <link type="text/css" rel="stylesheet" href="css/responsive.css">
  <link type="text/css" id="themes" rel="stylesheet" href="">
  <link type="text/css" rel="stylesheet" href="css/style.css">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link type="text/css" id="themes" rel="stylesheet" href="css/style.css">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link type="text/css"  rel="stylesheet" href="css/n_layout.css">';
     		}
     		 ?>
     
   
 <!-- <link href="editor/editor.css" type="text/css" rel="stylesheet"/>-->
  
  
</head>
<body class=" <?php If(isset($_SESSION["user_login"]) && !(empty($_SESSION["user_login"]))){echo 'leftbar-view';}else{echo 'login-page';} ?>
">
 
<?php


If(isset($_SESSION["user_login"]) && !(empty($_SESSION["user_login"]))){
If(isset($_SESSION["user_login"]) && empty($_SESSION["user_login"])){
	//require("inc/db/config.php");
    header("location:index.php");
    
}
else{
	$user_login1=$_SESSION["user_login"];
	
}


try {
	  //CHECKING IF USER CURRENTLY LOGGED IN ;
	  require("inc/db/config.php");
$check_user=$dbh->prepare('SELECT *FROM active_log WHERE USERNAME="'.$user_login1.'" AND ACTIVE="YES" AND INACTIVE="NO"');
	 $check_user->execute();
	 //getting result from active log
	 $get_result=$check_user->rowCount();
	
	 if($get_result>0){
	 	$user_login=$user_login1;
	 	$logged=$user_login1;
	 	$_SESSION['world_id']=$world_id_w;
	 	$_SESSION['world_creator']=$world_creator;
			//getting user info
			$get_data=$dbh->prepare("SELECT *FROM users WHERE USERNAME='$user_login'");
			$get_data->execute();
			$get_info=$get_data->fetch(PDO::FETCH_ASSOC);
			$user_firstname=$get_info['FIRST_NAME'];
			$user_othername=$get_info['OTHER_NAME'];
			$get_profile_pic=$get_info['PROFILE_PIC'];
			$user_login_userid=$get_info['ID'];
			$day_of_birth=$get_info['DOB_DAY'];
			$month_of_birth=$get_info['DOB_MONTH'];
			$year_of_birth=$get_info['DOB_YEAR'];
			$user_peecoin=$get_info['BANK'];
			$user_login_id=$user_login_userid;
			
			$category_w="world";
			//TO DISPLAY EDIT BUTTON
				if($user_login==$world_creator){
	 		if(empty($worlderr)){
				$edit_btn=$edit_profile_btn='<a><input type="button" id="edit-profile" value="Edit profile"/></a>';
				$world_edit_btn='<input type="button" id="edit-world" value="Create post"/>';
			}
	}
			 //CHECKING IF THE USER HAS UPLOADED ANY PROFILE PIC
			 if(empty($get_profile_pic)){
			 	$profile_pic1="image/default-pic/images_012.jpg";
			 }
			 else{
			 	$profile_pic1="user_data/user_photo/$get_profile_pic";
			 }
			 
			 }
			 else{
			 	
			 	header("location:logout.php");
			 }
}
catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}
	   //require("inc/headeraut.inc.php");
	   require("inc/header.php");
 require("inc/leftbar.php");
 require("inc/conversation.inc.php");
	
	 
 require("inc/world/world.view.access.php"); 
 require("inc/world/gender.view.access.php");

require("inc/world/world.comment.access.php");
require("inc/world/world.post.access.php"); 

 
 $session=1;
}
else{
	 $session=0;
require('inc/headerMenu.php');
	//echo "<div style='color:#ed4f12; font-size:17px; text-align:center;'>ONLY LOGGED IN USER'S ARE ALLOWED TO VIEW THIS WORLD.</div><p></p>";
 
}
?>
<!--=======================Page Container Start Here =================================-->
<script>
function adjustHeight(el){
    el.style.height = (el.scrollHeight > el.clientHeight) ? (el.scrollHeight)+"px" : "60px";
}
</script>
<style >
	<?php echo $w_background_pic;?>
	
textarea {
min-height: 60px;
overflow-y: auto;
word-wrap:break-word;
}

.Editor-editor{ 
    height:300px;
    padding:1%;  
  border:1px solid #EEE;
  border-radius:0;
    word-wrap: break-word;
    background-color: #ffffff;
  }
  .Editor-container{
  margin-top:10px;
  font-family:Gotham, "Helvetica Neue", Helvetica, Arial, sans-serif;
  margin: 2%;
  }
</style>
<!--Page Container Start Here-->
<section class="main-container">
  <div class="widget-container" style="margin-bottom:0px;" >
            <div class="row">
                 <!-- <div class="col-md-12"> -->
                   <!--  <div class="widget-wrap">
                         <div class="widget-header" > -->
                              <div class="container-fluid">
                                <div class="img-responsive">
                                <div class="col-md-12 img-responsive cover ">
                                <div style="float: right; width:70%;">
                                <h2 style="margin-left:5%; color:#ffffff; text-align: left; padding-top:25px;  "><?php echo $w_name;?></h2>
                                <?php echo $world_edit_btn;?>
                                <?php
                                 if($user_login==$world_creator){
								 	echo $edit_btn;
								 }
                                
                                 ?>
                               
                                <a><input type="button" style="float:right;  margin-top: 50px; display: none;" id="change-background-pic" value="Add background picture"></a>
                                <a><input type="button" id="change-pic" style=" margin-top:50px;float:left; display:none; " value="Change profile pic"/></a>
                                 </div>
                                 
                                 <div class="img-thumbnail" >
                                    <a ><img src="<?php echo ($world_profile_pic); ?>" width="150px;" alt="<?php echo $w_name;?> image" height="150px;"></a>
                                </div>
                                 <form enctype="multipart/form-data" style=" float:right;" class="change-background-pic" action="" method="post" >
  <style>
	
	.push-right{
		border: 2px solid #697869;
		padding: 2px;
		
	}
	.push-right label{
		color:#ffffff;
	}
	.push-left{
		border: 2px solid #697869;
		padding: 2px;
		
	}
	.push-left label{
		color:#ffffff;
	}
</style>
<div class="push-right" style="display: none;">
 <label>Upload Background pic</label>
                                     <input type="file" id="profile-bg-pic" name="world-background-pic" value="fileToUpload"/>
                                    <!-- <a id="add-image" title="upload file to add"><label for="profile-background-pic" ><span class="glyphicon glyphicon-camera"></span>Change Background Picture</label></a>-->
                                     <input type="submit"  name="submit" class="btn-success btn-sm" value="uploads" />
                                     <?php require("inc/world/uploading_world_background_pic.inc.php");?>
                              </div>
                                </form>
                                  <form enctype="multipart/form-data" class="change_fileToupload" action="" method="post" >
                                     <div class="push-left" style="display: none;">
                                     <label>Upload Profile pic</label>
                                     <input type="file"  name="fileToUpload" value="fileToUpload"/>
                                  <!--   <a title="upload Photo to add"><label for="profile-pic" ><span class="glyphicon glyphicon-camera"></span>+Profile Picture</label></a> <br>-->
                                     <input type="submit"  name="upload"  class="btn btn-success btn-sm" value="uploads">
                                     <?php require("inc/world/world_profile_pic.inc.php");?>
                                
                                 </div>
                                </form>

                                <div id="change_bz" style="" >
                                
                                  <form method="post"  enctype="multipart/form-data"  style='display:none; float:right;'>
                                	<input type="file" id="file" name="world-background-pic"/><input type="submit" class="btn btn-success" name="submit" value="upload"/>
                                	
                                	
                                	
                                	 <?php require("inc/world/uploading_world_background_pic.inc.php");?>
                                	 
                                </form>
                                </div>
                               
                                </div>
                                </div>
<div class="widget-content">

<!-- end of button drop dropdowns -->
        <!-- navbar start  -->
        <div class="widget-container margin-top-0">
        <div class="widget-wrap nav-browse" style="padding-top:5px;padding-bottom:5px; margin-top:0px; display:none; ">
             <nav class="navbar navbar-defualt" style="margin:0px;" >
                   <ul class="nav navbar-nav ">
                <li><a id="create-post"><span class="glyphicon glyphicon-pencil"></span>Create Post</a></li>
              <div class="col-md-2 col-sm-4">
            <div class="btn-group-ex-container">
                <div class="btn-group dropdown">
                    
                    <a href="" class="btn  dropdown-toggle" data-toggle="dropdown"><i class="zmdi zmdi-wrench">Messages</i></a>
                    <ul class="dropdown-menu">
                        <li><a href="worldmessages.php?wor=<?php echo $w_adress; ?>">All Messages</a></li>
                        <li class="divider"></li>
                        <li><a href="worldmessages.php?wor=<?php echo $w_adress; ?>&read=No">Unread Messages</a></li>
                        <li class="divider"></li>
                        <li><a href="worldmessages.php?wor=<?php echo $w_adress; ?>&read=Yes">Read Messages</a></li>
                       
                    </ul>
                </div>
            </div>

        </div>
                 <?php echo $sms_button; ?>

                    <li><a href="aboutworld.php?wor=<?php echo $w_adress; ?>" id="About"><span class="glyphicon glyphicon-book"></span>World Description</a></li>                    <?php 
                    if($user_login==$world_creator){
						echo'<li><a id="Photo" href="settings.php"><span class="glyphicon glyphicon-ruble"></span>World Settings</a></li>';
					}
                    ?>
                    
                    <li><a id="worlds" href="profile.php?u=<?php  echo($id_w); ?>"><span class="glyphicon glyphicon-log-in"></span><?php echo $other_name_w; ?>'s Worlds</a></li>
                 <?php 
                    if($world_view=='Only Those Allowed' && $user_login==$world_creator){
						echo '<a><button id="access-model" style="border:none; " data-toggle="modal" data-target="#textMD">Access codes</button></a>';
						require('inc/access/insert_access_code.inc.php');
						echo '<div class="modalBox"  >

  <!-- Modal -->
  <div class="modal"  id="textMD">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Access Codes</h4>
        </div>
        <div class="modal-body">
   
  <div class="row" >
  <div class="col-md-9">
    <div class="recent-users-list">
      <div class="individual-user info-expand">
          <div class="user-intro friend">
              <!-- this is for the toggle icon -->
              <span class="user-details-toggle"><i class="fa fa-align-justify ">Create</i></span>
          </div><br>
          <div class="users-details">
              <ul>
                  <li>
                    <form action="" method="POST" >
                      <div class="form-group input-group">
                        <span class="input-group-addon" id="basic-addon1"> <i class="fa fa-pencil"></i></span>
                       <span class="errors">'.$new_access_codeerr.'</span> 
                        <input type="text" id="change_name" name="new-access-code" placeholder="Input Access Code" class="form-control" aria-describedby="basic-addon1"/>
                      </div>
                      <div class="form-group input-group">
                        <span class="input-group-addon" id="basic-addon1"> <i class="fa fa-pencil"></i></span>
                       <span class="errors">'.$new_access_commenterr.'</span> 
                        <textarea type="text" id="change_name" name="new-access-comment" placeholder="Input Access Code Comment here..." class="form-control" aria-describedby="basic-addon1"></textarea>
                      </div>
                      <div class="row login-form-footer">
                          <div class="col-md-9"></div>
                          <div class="col-md-3">
                              <input type="submit" class="btn-block btn btn-success" value="Submit" name="submit-access-code">
                          </div>
                      </div>
                      
                    </form>

                  </li>
                 
              </ul>
          </div>
      </div>
    </div>
  </div>
 
  <label>View Access code</label>
 ';
 require('inc/access/view_access_code.inc.php');
 
 echo'
 
  </div>
                            
        </div>
        <div class="modal-footer">
           <!-- start btn -->
                                <div class="form-footer " style="float:right;width:100%; margin-top:15px;">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Close</button>
                                 <input type="submit" name="verify-wview-access-code" class="btn btn-success btn-sm" value="Verify"/>
                                 
                                 
                              </div>
                              <!-- end of post btn -->
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  </div>';
					}
                    ?>
                    <br>
                    
                        <div class="text-left" >
                            <div class="dropdown " style="display:inline-block ">
                           <!--     <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            More Post
                                    <span class="caret"></span>
                                </button>-->
                            <!--    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
             
                                </ul> -->
                           
                        </div>
                       </div>
 

                  </ul>
            </nav>
        </div>
        <!-- navbar ends -->
        <?php require("inc/world/world_infolink.inc.php"); ?>
<div class="row">
  <div class="col-md-12">
    <div class="widget-wrap crtw-post" style="display: none;" >
          <div class="widget-header block-header margin-bottom-0 clearfix">
     
      <p style="float: right; margin-right: 5px; top:5px; margin-bottom: 20px;">
      <input type="button" class="btn btn-danger hide-crtw-post" title="hide" value="X" />
        </p>
        <div class="unit">
        <!--upload file start here-->
        <div class="widget-wra" style="padding-top:5px;padding-bottom:5px;float:left;" >
             <nav class="navbar navbar-defualt" style="margin:0px;" >
                   <ul class="nav navbar-nav navbar-right">



                  </ul>
            </nav>
        </div><br>
       
         <!--<form method="POST" action="" >-->
         
        <!--upload ends here-->
          <label class="label">Title</label>
          <input type="text" id="post-title" class="form-control" name="post-title" placeholder="Add title here"/>
          <div class="unit">
          <label class="label">Summary</label>
          	<textarea  class="form-control" maxlength="250" id="post-summary" name="post-summary" placeholder="summarize your post" style="width: 100%;" onkeyup="adjustHeight(el);"></textarea>
          </div>
          <div>
          	<?php
          	try{
          if($user_login == $world_creator){
 	
	 if($world_view=="Only Those Allowed"){
          echo '<div class="unit">
                  <label class="input select">
                  <label class="label">Choose Post Permission</label>
                   <select class="form-control" id="post-permission" name="post-permission">
                             <option value="" >Choose Post Permission</option>
                             <option value="None" >None</option>';
                             
				
          		$category=$category_w;
			$category_id=$world_id_w;
			
			$sql_acs_code1=$dbh->prepare('SELECT *FROM access WHERE username="'.$user_login.'" and category="'.$category.'" and category_id="'.$category_id.'" and removed="NO"');
			$sql_acs_code1->execute();
			$num_sql_acs_code1=$sql_acs_code1->rowCount();
			
			if($num_sql_acs_code1>0){
				
				while($fetch_sql_acs_code1=$sql_acs_code1->fetch(PDO::FETCH_ASSOC)){
					$access_code1=$fetch_sql_acs_code1['access_code'];
					$access_comment1=$fetch_sql_acs_code1['comment'];
					
					echo'
                             <option value="'.$access_code1.'" >'.$access_code1.' (<i>'.$access_comment1.'</i>)</option>
                        ';
					}
					}
				
          	
                    echo '  </select>
                   </label>
          
          </div>';
          	}
          	else{
				$_POST["world-post-area"]='none';
			}
	}
	}
 catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
          ?>
          <div class="unit">
          <label class="label">Add Tags</label>
          <textarea class="form-control" maxlength="250" id="post-tag" name="post-tag" placeholder="add tags(pointer- necessary for optimized visibility) to your post(example come,go,yes etc..) with comma after each tag" style="width: 100%;" onkeyup="adjustHeight(el);"></textarea>	
          </div>
              <label  class="label">Textarea</label>
        
		    <script>
		  

   function copyText() {
var output = document.getElementById("cdt").innerHTML;
var doo=document.getElementById('txtEditor').value=output;
//alert(doo);
}     
</script>
	
         <br /> <?php require('editor/videoupload.php');?>
          <div class="e-x-container">
            <div class=" margin-bottom-10">
              <div class="col-md-12">
                <div style="width: 100%">
                
</div>

		<div class="container-fluid">
			<div class="row">
				<style>
		.wor-t-editor{
			width:90%;
			height: 150px;
			background-color: #ffffff;
			border: 2px groove;
			padding-left: 5px;
			
		}
	</style>
			
				<div class="ex-container">
					<div class="row">
						<div class="col-md-12">
							<div contenteditable="true" id="txt-editor" class="wor-t-editor" onkeydown="adjustHeight(el);"></div>
						</div>
					</div>
				</div>
			</div>
		</div>

                  <div class="col-md-4" style="float:right;">
                      <input type="button" name="publish-post" onclick='sendpost()' id="publish-post" value="Publish" class="form-control btn btn-success"/>
                  </div>
                 
                   <div class="col-md-4" style="float:right;">
                      <input type="button" onclick="" id="save_btn" name="save-post" value="Save" class="form-control btn btn-primary"/>
                  </div>
                   <div class="col-md-4" >
                      <input type="button" id="preview" name="clear" value="Clear" class="form-control btn btn-warning"/>
                  </div>

                  <!-- <div class="col-md-3">
                      <input type="submit" id="close" name="close" value="Delete" class="btn btn-danger form-control"/>
                  </div> -->
                  </div>
                </div>
            </div>
           
           
          </div><br><br>
      
      <div class="wf-ra-dy" id="world-feed">
      	
      </div>

</div>
</div>
</div>
                              </div>
                      <!--   </div>
                   </div> -->
            <!-- </div> -->
            </div>
        </div>

    <div  id="activity-psm row-col" style="margin: 2%;" >
    
<div class="col-sm-12 row-spad">

</div>
 <?php 
 
 	
 if($user_login != $world_creator){
 	$loadmore='';
	 if($world_view=="Only Those Allowed"){
	 	
	 	if(isset($_GET['acs'])){
	 		
			 
			require('inc/access/showing_world_post.inc.php');
		}
		else{
			echo"<script>
		alert('Permission needed to view this world.');
		</script>";
		
		echo '<div style="color:#ed4f12; font-size:17px; text-align:center;">Permission is needed to view this world.</div><p></p>';
		
		If(isset($_SESSION["user_login"]) && !(empty($_SESSION["user_login"]))){
		echo '
		
		<div class="row login-form-footer " >
                          <div class="col-md-9"></div>
                          <div class="col-md-3">
                              <input type="button" data-toggle="modal" data-target="#avMD" class="btn-block btn btn-success" value="Verify Access" name="verify-access-code">
                          </div>
                      </div>
                      ';
             }
             else{
			 	echo "<div style='color:#ed4f12; font-size:17px; text-align:center;'>ONLY LOGGED IN USER'S ARE ALLOWED TO VIEW THIS WORLD.</div><p></p>";
			 }         
		
		}
	 }
	 else{
	 	$loadmore='';
	 	require("inc/world/get_world_post.inc.php");
 
	 }
 }
 else{
 	$loadmore='';
	 	require("inc/world/get_world_post.inc.php");
 }
 
 ?>
 
 <p>
  <?php echo $loadmore; ?>
  </p>
  <!-- end widget wrap for a complete -->
 <!-- <div class="widget-wrap row" style="margin:0px 3px 0px 3px;">
  <div class="widget-header block-header margin-bottom-0 clearfix">
      <div class="pull-left">
          <h3>Other worlds by <?php echo $first_name_w." ".$other_name_w;?></h3>
          <!-- <p>All recent registered members</p>
      </div>
  </div><br/>
  <!-- start main div for article
  <div class="row">
<?php// require("inc/world/get.other.world.by.user.inc.php"); ?>
            <!-- end 2nd article
          </div>
          <!-- end main div for article 
          </div>
</div>
<!--<div class="col-md-4">
<div class="widget-wrap">
  <div class="widget-header block-header margin-bottom-0 clearfix">
      <div class="pull-left">
          <h3>Related Worlds</h3>
        
      </div>

</div>


           <!-- <img src="img/k1.jpg" width="80" height="80"> -->
       
         </div>
       <?php include_once("analyticstracking.php") ?>
</div>
</div> 
</div>
</div>

</section>
<!--Page Container End Here-->

<script src="js/lib/jquery.js"></script>
<script src="js/lib/jquery-migrate.js"></script>
<script src="js/lib/bootstrap.js"></script>
<script src="js/lib/jquery.ui.js"></script>
<script src="js/lib/jRespond.js"></script>
<script src="js/lib/nav.accordion.js"></script>
<script src="js/lib/hover.intent.js"></script>
<script src="js/lib/hammerjs.js"></script>
<script src="js/lib/jquery.hammer.js"></script>
<script src="js/lib/jquery.fitvids.js"></script>
<script src="js/lib/scrollup.js"></script>
<script src="js/lib/smoothscroll.js"></script>
<script src="js/lib/jquery.slimscroll.js"></script>
<script src="js/lib/jquery.syntaxhighlighter.js"></script>
<script src="js/lib/velocity.js"></script>
<script src="js/lib/jquery-jvectormap.js"></script>
<script src="js/lib/jquery-jvectormap-world-mill.js"></script>
<script src="js/lib/jquery-jvectormap-us-aea.js"></script>
<script src="js/lib/smart-resize.js"></script>
<!--iCheck-->
<script src="js/lib/icheck.js"></script>
<script src="js/lib/jquery.switch.button.js"></script>
<!--CHARTS-->
<script src="js/lib/chart/sparkline/jquery.sparkline.js"></script>
<script src="js/lib/chart/easypie/jquery.easypiechart.min.js"></script>
<script src="js/lib/chart/flot/excanvas.min.js"></script>
<script src="js/lib/chart/flot/jquery.flot.min.js"></script>
<script src="js/lib/chart/flot/curvedLines.js"></script>
<script src="js/lib/chart/flot/jquery.flot.time.min.js"></script>
<script src="js/lib/chart/flot/jquery.flot.stack.min.js"></script>
<script src="js/lib/chart/flot/jquery.flot.axislabels.js"></script>
<script src="js/lib/chart/flot/jquery.flot.resize.min.js"></script>
<script src="js/lib/chart/flot/jquery.flot.tooltip.min.js"></script>
<script src="js/lib/chart/flot/jquery.flot.spline.js"></script>
<script src="js/lib/chart/flot/jquery.flot.pie.min.js"></script>
<script src="js/class.function/upload_pro.js"></script>
<script src="js/class.function/wor.form.js"></script>
<!--Forms-->
<script src="js/lib/jquery.maskedinput.js"></script>
<script src="js/lib/jquery.validate.js"></script>
<script src="js/lib/jquery.form.js"></script>
<script src="js/lib/j-forms.js"></script>
<script src="js/lib/jquery.loadmask.js"></script>
<script src="js/lib/vmap.init.js"></script>
<script src="js/class.function/ins.post.js" ></script>
<script src="js/class.function/get.wor.post.js" ></script>
<script src="js/class.function/ins.sms.js" ></script>
<script src="js/lib/theme-switcher.js"></script>
<script src="js/apps.js"></script>
</body>
</html>