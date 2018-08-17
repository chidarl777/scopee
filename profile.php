<?php require("aut_session.php"); ?>
<?php require("inc/profile_aut.php"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C// Transitional//EN">

<html>
<head>
  <meta>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <title><?php echo $pro_othername; ?>'s profile</title>
  <link type="text/css" rel="stylesheet" href="cssa/font-awesome.css">
  <link type="text/css" rel="stylesheet" href="cssa/material-design-iconic-font.css">
  <link type="text/css" rel="stylesheet" href="cssa/bootstrap.css">
  <link type="text/css" rel="stylesheet" href="cssa/animate.css">
  <link type="text/css" rel="stylesheet" href="cssa/layout.css">
  <link type="text/css" rel="stylesheet" href="cssa/components.css">
  <link type="text/css" rel="stylesheet" href="cssa/widgets.css">
  <link type="text/css" rel="stylesheet" href="cssa/plugins.css">
  <link type="text/css" rel="stylesheet" href="cssa/pages.css">
  <link type="text/css" rel="stylesheet" href="cssa/bootstrap-extend.css">
  <link type="text/css" rel="stylesheet" href="cssa/common.css">
  <link type="text/css" rel="stylesheet" href="cssa/responsive.css">
  <link type="text/css" id="themes" rel="stylesheet" href="">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
  <link type="text/css" rel="stylesheet" href="css/common.css">
  <link type="text/css" rel="stylesheet" href="css/responsive.css">
    <link type="text/css" rel="stylesheet" href="css/style.css">
  <link type="text/css" id="themes" rel="stylesheet" href="">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  
</head>
<body class="leftbar-view">

<?php require("inc/header.php");?>
<?php require("inc/leftbar.php");?>
<style>
	<?php echo $p_background_pic; ?>
</style>
<!--Page Container Start Here-->
<section class="main-container">
    <div class="container-fluid">
        <div class="widget-container" style="margin-bottom:0px;">
            <div class="row">
                 <div class="col-md-12">
                    <div class="cover">
                
                         <br/><br/><p></p><div class="widget-header "  >
                         
                                <!-- <h3>Profile</h3> -->
                               <div style="float:right; border:0px; ">
                                	<?php echo $edit_profile_btn;?>
                                </div>
                                <div class="img-thumbnail" >
                                    <a ><img src="<?php echo ($profile_pic_user); ?>" width="150px;" alt="<?php $pro_firstname." ".$pro_othername?> image" height="150px;"></a>
                                </div>
                                <a><input type="button" style="float:right; display: none; margin-top: 50px;" id="change-background-pic" value="Add background picture"></a>
                                <a><input type="button" id="change-pic" style="display: none; margin-top:50px;float:left; " value="Change profile pic"/></a>
                                 
                                <form enctype="multipart/form-data"style="display: none; float:right;" class="change-background-pic" action="" method="post" >
                                     <div class="push-right">
                                     <input type="file" id="profile-background-pic" name="profile-background-pic" value="fileToUpload"/>
                                     <a id="add-image" title="upload file to add"><label for="profile-background-pic" ><span class="glyphicon glyphicon-camera"></span>Change Background Picture</label></a>
                                     <br />
                                     <input type="submit" id="change-background" name="submit-b" onck="loaduploadpic()" class="btn-success btn-sm" value="uploads">
                                     <?php require("inc/profile.background.pic.inc.php");?>
                              </div>
                                </form>
                               
                                <form enctype="multipart/form-data"style="display: none;" class="change_fileToupload" action="" method="post" >
                                     <div class="push-left">
                                     <input type="file" id="profile-pic" name="fileToUpload" value="fileToUpload"/><br />
                                     <a title="upload Photo to add"><label for="profile-pic" ><span class="glyphicon glyphicon-camera"></span>+Profile Picture</label></a> <br>
                                     <input type="submit" id="upload" name="upload" onck="loaduploadpic()" class="btn btn-success btn-sm" value="uploads">
                                     <?php require("inc/uploading_profile_pic.php");?>
                                
                                 </div>
                                </form>
                               
                               
                        </div>
                <!-- <div class="widget-content">
                <div class="widget-content">
                  
                </div>
            </div> -->
            </div>
            </div>
            </div>
        </div>
        <!-- navbar start  -->
        <div class="widget-wrap" style="padding-top:5px;padding-bottom:5px;" "margin-top:0px;">
             <nav class="navbar navbar-defualt" style="margin:0px;" >
                   <ul class="nav navbar-nav navbar-right">
                   <li><a id="send-msg"><span class="glyphicon glyphicon-pencil"></span>Send Message</a></li>
                   <li><a id="friends"><span class="glyphicon glyphicon-user"></span>Friends</a></li>
                    <li><a id="About"><span class="glyphicon glyphicon-log-in"></span> About</a></li>
                    <li><a id="Photo"><span class="glyphicon glyphicon-log-in"></span> Photo</a></li>
                    <li><a id="worlds"><span class="glyphicon glyphicon-log-in"></span> Worlds</a></li>

                  </ul>
            </nav>
        </div>
        <!-- navbar ends -->
         <!-- start textarea -->
                                <form method="post" action="" class="send-msg" style="display: none;" >
                                <?php require("inc/msg/send_msg.php");?>
                                <div class="unit">
                                  <!--  <label class="label">Textarea</label>-->
                                  <span class="errors"><?php echo $msgerr;?></span>
                                    <div class="input">
                                      <textarea class="form-control" name="msg-area" placeholder="Your Message..." spellcheck="false" id="message-area">
                                      	
                                      </textarea>
                                    </div>
                                </div><br>
                                <!-- end textarea -->
                                <!-- start btn -->
                                <div class="form-footer" style="float:right;">
                                  <input type="submit" class="btn btn-success btn-sms "  id="senpost" name="send-msg" value="Send"/>
                                  
                              </div><br><br>
                              <!-- end of msg btn -->
                              </form>
                              <!-- end textarea here -->
        <!-- getting content-->
        
                <?php require("inc/edit_profile.inc.php"); ?>
                <div class="about-user" >
    <div class="col-md-6" style="padding:0px; display: none;" id="ep-form" >
    <div class="stats-widget stats-widget">
        <div class="widget-header">
            <h3>About</h3>
        </div>
            <div class="widget-container">
        <div class="widget-content">
            <div class="row">
                <div class="col-md-12">
               
                    <form action="#"   class="j-forms" method="post" >

                        <div class="form-content">
                            <!-- start data list -->
                            <!-- for proper data list work -->
                            <!-- dont forget to add appropriate javascript code to your form-->
                            <!-- from the bottom of this page-->
                            <div class="unit"> <!-- unit gives us a padding bottom btw inputs -->
                                <label class="label">About Me</label>
                                <i>A short summary about yourself</i>
                                  <div class="input">
                                        <label class="icon-left" for="textarea">
                                            <i class="fa fa-file-text-o"></i>
                                        </label>
                                        <textarea class="form-control" id="about-user" name="about-user" placeholder="A short description about you..." spellcheck="false" id="textarea"></textarea>
                                    </div><br/>
                            </div>
                            <!-- end data list -->

                           <!--  <div class="divider gap-bottom-25"></div>
 -->
                            <!-- start multiple data list -->
                            <!-- for proper multiple data list work -->
                            <!-- dont forget to add appropriate javascript code to your form-->
                            <!-- from the bottom of this page-->
                            <div class="unit">
                                <label class="label">Occupations</label>
                                <div class="input">
                                    <input class="form-control" type="text" placeholder="Enter a occupation" name="occupation" id="occupation multi-list-autocomplete">
                                </div>
                            </div>
                            <div class="unit">
                                <label class="label">Educations</label>
                                <div class="input">
                                    <input class="form-control" type="text" placeholder="Enter education" id="education multi-list-autocomplete" name="education">
                                </div>
                            </div>
                            
                            <div class="unit">
                                <label class="label">Add Contacts</label>
                                <div class="input">
                                    <input class="form-control" type="text" placeholder="Enter a contact" id="contacts multi-list-autocomplete" name="contacts">
                                </div>
                            </div>
                            <div class="unit">
                                <label class="label">Hobby</label>
                                <div class="input">
                                    <input class="form-control" type="text" placeholder="Enter your hobby" id="hobby multi-list-autocomplete" name="hobby">
                                </div>
                            </div>
                            <div class="unit">
                                <label class="label">City Of Residence</label>
                                <div class="input">
                                    <input class="form-control" type="text" placeholder="Enter city of rresidence" id="city multi-list-autocomplete" name="city">
                                </div>
                            </div>
                            <div class="unit">
                                <label class="label">State Of Residence</label>
                                <div class="input">
                                    <input class="form-control" type="text" placeholder="Enter state of residence" id="multi-list-autocomplete" name="state">
                                </div>
                            </div>
                            <div class="unit">
                                <label class="label">Country Of Residence</label>
                                <div class="input">
                                    <input class="form-control" type="text" placeholder="Enter country of residence" id="country multi-list-autocomplete" name="country">
                                </div>
                            </div>
                            <hr>
                            <div class="unit">
                                <label class="label">Professional Skill/Talent</label>
                                <div class="input">
                                    <input class="form-control" type="text" placeholder="Enter professional skill" id="professional-skill multi-list-autocomplete" name="professional-skill">
                                </div>
                            </div>
                            <div class="unit">
                                <label class="label">Marital Status</label>
 <div class="unit">
                                    <label class="input select">
                                        <select class="form-control" id="marital-status" name="marital-status">
                                            
                                            <option value="Single">Single</option>
                                            
                                          <option value="Married">Married</option>
                                          <option value="In A Relationship">In A Relationship</option>
                                        </select>
                                      </label>
                                </div>
                            </div>
                            <div class="unit">
                                <label class="label">State of Origin</label>
                                <div class="input">
                                    <input class="form-control" type="text" placeholder="Enter state" id="State-of-origin multi-list-autocomplete" name="state-of-origin">
                                </div>
                            </div>
                            <div class="unit">
                                <label class="label">Country Of Origin</label>
                                <div class="input">
                                    <input class="form-control" type="text" placeholder="Enter a country" id="country-of-origin multi-list-autocomplete" name="country-of-origin">
                                </div>
                            </div>
                            

                            <!-- end multiple data list -->
                        </div>
                        <!-- end /.content -->

                        <div class="form-footer">
                            <button type="submit" id="send-data" name="send-data" class="btn btn-success primary-btn processing">update</button>
                        </div>
                        <!-- end /.footer -->


                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
<?php require("inc/get_profile.inc.php");?>
  </div>      
<div   class="row u-photo" style="display:none;">
<div class="col-md-12" >
<div class="widget-wrap" >
<div class="widget-header block-header margin-bottom-0 clearfix">
<h3><?php echo($pro_firstname." ".$pro_othername."'S Photo");?></h3>
</div>
<div class="widget-container margin-top-0">
              <div class="widget-content">
                  <div class="recent-users">
                
                      <div class="recent-users-list usr-photo" id="friend-list" onmousemove="loadendlist()">                        <?php 
               //==============================================
               //CODE FOR GETTING USER PHOTO
               //===============================================
               $sql_photo=$dbh->prepare('SELECT *FROM uploaded_pics_tbl WHERE USER_UPLOADED="'.$userlog.'" AND CATEGORY="profile_pic" AND REMOVED="NO" ORDER BY ID DESC');
               $sql_photo->execute();
               $num_sql_photo=$sql_photo->rowCount();
               if($num_sql_photo>0){
			   while($fetch_sql_photo=$sql_photo->fetch(PDO::FETCH_ASSOC)){
			   	$user_photos=$fetch_sql_photo['UPLOADED_FILE'];
			   	$user_photos_id=$fetch_sql_photo['ID'];
			   	echo"<a href='viewphoto.php?u=$uid_pro&photoid=$user_photos_id&photo=$user_photos'><img src='user_data/user_photo/$user_photos' style='height:20%; width:20%; border:2px solid; margin:10px;'/></a>";
			   }
			   }
			    else{
			   	echo 'No '.$pro_firstname.' '.$pro_othername.' Photos Found';
			   }
                      
                ?>
               <hr> <div class="widget-header block-header margin-bottom-0 clearfix">
<h3 style="margin-left: 20px;"><?php echo($pro_firstname." ".$pro_othername." World Photos");?></h3>
</div>                 
             <?php 
               //==============================================
               //CODE FOR GETTING USER PHOTO
               //===============================================
               $sql_world_photo=$dbh->prepare('SELECT *FROM uploaded_pics_tbl WHERE USER_UPLOADED="'.$userlog.'" AND CATEGORY="worlds_tbl" AND REMOVED="NO"');
               $sql_world_photo->execute();
               $num_sql_world_photo=$sql_world_photo->rowCount();
               if($num_sql_world_photo>0){
			   while($fetch_sql_world_photo=$sql_world_photo->fetch(PDO::FETCH_ASSOC)){
			   	$user_world_photos=$fetch_sql_world_photo['UPLOADED_FILE'];
			   	$user_photos_id=$fetch_sql_photo['ID'];
			   	echo"<a href='viewphoto.php?u=$uid_pro&photoid=$user_photos_id&photo=$user_photos'><img src='user_data/user_world_photo/$user_world_photos' style='height:20%; width:20%; border:2px solid; margin:10px;'/></a>";
			   }
			   }
			   else{
			   	echo 'No World Photos Found';
			   }
                      
                ?>   
                      </div>
                      
                  </div>
              </div>
          </div>
        </div>
         
</div>

</div>
<div   class="row u-world" style="display:none;">
<div class="col-md-12" >
<div class="widget-wrap" >
<div class="widget-header block-header margin-bottom-0 clearfix">
<h3><?php echo($pro_firstname." ".$pro_othername."'S World");?></h3>
</div>
<div class="widget-container margin-top-0">
              <div class="widget-content">
                  <div class="recent-users">
                 
                      <div class="recent-users-list widget-wrap" id="friend-list"  style="padding:15px;">                      <div class="col-md-8">
                       <div class="widget blog_gallery">
                         <ul class="sidebar-gallery" style="background-color:#ffffff; margin-bottom:30px; margin-top:0px; width:100%">
                           <?php require("inc/world/user_profile_world.inc.php"); ?>
                        </ul>
                    </div><!--/.blog_gallery-->
                       <!-- stop hear -->
                       </div> 
                       
                      </div>
                      
                  </div>
              </div>
          </div>
        </div>
         
</div>

</div>

<div   class="row u-friends" style="display:none;">
<div class="col-md-12" >
<div class="widget-wrap" >
<div class="widget-header block-header margin-bottom-0 clearfix">
<h3><?php echo($pro_firstname." ".$pro_othername."'S FRIENDS");?></h3>
</div>
<div class="widget-container margin-top-0">
              <div class="widget-content">
                  <div class="recent-users">
                 
                      <div class="recent-users-list" id="friend-list" onmousemove="loadendlist()">                         

<?php
//CODE TO VIEW FRIENDS OF USER LOGGED IN
//require("../aut_session.inc.php");
$user_login_f='';
try{
	require("inc/db/config.php");
$sql1='SELECT *FROM friends_tbl WHERE SENT_FROM="'.$userlog.'" AND REMOVED="NO"  OR  SENT_TO="'.$username.'" AND REMOVED="NO"';
$stmt1=$dbh->prepare($sql1);
$stmt1->execute();
$num_row=$stmt1->rowCount();
if($num_row==0){
	echo"NO FRIENDS AT THE MOMENT";
}
else{
	

while($get_result=$stmt1->fetch(PDO::FETCH_ASSOC)){

$sent_to1=$get_result['SENT_TO'];
$sent_from1=$get_result['SENT_FROM'];
//CHECKING IF $USER LOGGED IN IS SENT TO OR SENT FROM IN THE FRIEND TABLE
if($sent_to1==$userlog){
	$users_friends=$sent_from1;
}
else{
	$users_friends=$sent_to1;
}
//CHECKING IF THE USER PROFILE FRIEND  IS THE SAME WITH THE USER LOGIN
$sql_user_login=$dbh->prepare('SELECT *FROM friends_tbl WHERE SENT_FROM="'.$user_login.'" AND REMOVED="NO"  OR  SENT_TO="'.$user_login.'" AND REMOVED="NO"');
$sql_user_login->execute();
$num_user_login=$sql_user_login->rowCount();
if($num_user_login>1){
	$get_u_friends=$sql_user_login->fetch(PDO::FETCH_ASSOC);
	
$sent_to_U=$get_result['SENT_TO'];
$sent_from_U=$get_result['SENT_FROM'];
//CHECKING IF $USER LOGGED IN IS SENT TO OR SENT FROM IN THE FRIEND TABLE
if($sent_to_U==$user_login){
	$user_login_f=$sent_from_U;
}
else{
	$user_login_f=$sent_to_U;
}
}
else{
	//do notting
}

//GETTING USERS INFO FROM THE USER TABLE
$sql1='SELECT *FROM users WHERE USERNAME="'.$users_friends.'"';
$stmt1=$dbh->prepare($sql1);
$stmt1->execute();
$get_info=$stmt1->fetch(PDO::FETCH_ASSOC);
$first_name=$get_info["FIRST_NAME"];
$other_names=$get_info["OTHER_NAME"];
$profile_pic=$get_info["PROFILE_PIC"];
$user_id=$get_info["USER_ID"];

	if(empty($profile_pic)){
			 	$profile_pic2="image/default-pic/images_012.jpg";
			 }
			 else{
			 	$profile_pic2="user_data/profile_pic/$profile_pic";
			 }
			 
			 $enurl=base64_encode($users_friends);
			 $encoded_url=$user_id;
			 $encoded_id=base64_encode($user_id);
			 //COMPARING THERE FRIEND TO CHECK IF THE HAVE ANY THING IN COMMON
if($users_friends==$user_login_f){

				$get_friend='                          <div class="individual-user info-expand">
                              <div class="user-intro friend">
                                  <div class="user-thumb"><a href="'.$encoded_url.'"><img src="'.$profile_pic2.'" alt="user"></a></div>
                                  <div class="users-info">
                                      <ul>
                                          <li class="u-name"><a href="'.$encoded_url.'">'.$first_name.' '.$other_names.'</a></li>
                                         
                                      </ul>
                                  </div>
                                  <!-- this is for the toggle icon -->
                              
                              </div>
                            
                          </div>';
		
			
			
		}
		else{
			
			$get_friend='<div class="individual-user info-expand">
                              <div class="user-intro friend">
                                  <div class="user-thumb"><a href="'.$encoded_url.'"><img src="'.$profile_pic2.'" alt="user"></a></div>
                                  <div class="users-info">
                                      <ul>
                                          <li class="u-name"><a href="'.$encoded_url.'">'.$first_name.' '.$other_names.' </a></li>
                                   
                                      </ul>
                                  </div>
                                  <!-- this is for the toggle icon -->
                                  <span class="pull-right"><a href="add-fr='.$user_id.'"><input type="submit"  value="Add+" class="btn btn-success" id="add" /></a></span>
                              </div>';
		
		
			
				}
					echo $get_friend;
		}
			
     }
	}	
catch(PDOException $error){
	echo("connection error1,because:".$error->getMessage());
	
	}
require("inc/friends/profile.get_users_not_friends.php");
?>

<?php
//CODE TO REMOVE FRIENDS OF USER LOGGED IN
try{
//	$r_friend="unchecked";
//	$r_friends="";
//	$r_friendserr="";
	
	if(isset($_POST["remove_friend"])){
 /* if($_POST['friends']=='remove'){
		$r_friends=$_POST['friends'];
		$r_friend="checked";
	}
	else{
		$r_friend="unchecked";
		$r_friendserr= "You have not selected a friend to remove";
		
	}
	*/
	$time=date('h:i:s a');
    $date=date('Y-m-d');
    
	require("inc/db/config.php");
	if(empty($users_friends)){
			//echo "you have no friend request at the moment";
		}
		else{
	$remove_friend=$users_friends;
	
$sql='UPDATE friends_tbl SET REMOVED="YES",USER_REMOVED="'.$user_login.'", TIME_REMOVED="'.$time.'",DATE_REMOVED="'.$date.'" WHERE SENT_TO="'.$user_login.'" AND SENT_FROM="'.$remove_friend.'" OR SENT_FROM="'.$user_login.'" AND SENT_TO="'.$remove_friend.'"';
$stmt2=$dbh->prepare($sql);
$stmt2->execute();
$num_row=$stmt2->rowCount();
if($num_row<1){
	echo"YOU HAVE NO FRIENDS AT THE MOMENT";
}
else{
	//GETTING USERS INFO FROM THE USER TABLE
$sql1='SELECT *FROM users WHERE USERNAME="'.$remove_friend.'"';
$stmt3=$dbh->prepare($sql1);
$stmt3->execute();
$get_info=$stmt3->fetch(PDO::FETCH_ASSOC);
	
$first_name=$get_info["FIRST_NAME"];
$other_name=$get_info["OTHER_NAME"];
$profile_pic=$get_info["PROFILE_PIC"];

	if(empty($profile_pic)){
			 	$profile_pic2="images/default-pic/images_012.jpg";
			 }
			 else{
			 	$profile_pic2="user_data/profile_pic/".$profile_pic;
			 }
				/* $removed_friend="
	<div id='add_friends'>
	<img src='$profile_pic2'/>	
	<a href='profile.php'>$first_name $other_name</a>
	Have been removed from your friend list
	</div>";
		
			echo $removed_friend;
				*/
	}
	
}			
     }
	}	
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}

?>
                      </div>
                     
                  </div>
              </div>
          </div>
        </div>
         
</div>

</div>
</div>
</div>
</div>
</div>
</div>

</div>
</div>
</div>
<?php require("inc/conversation.inc.php");?>
<?php require("inc/footer.inc.php");?>
</section>
<!--Page Container End Here-->
<script src="lib/code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="js/lib/jquery.js"></script>
<script src="js/lib/jquery-migrate.js"></script>
<script src="js/lib/bootstrap.js"></script>
<script src="js/lib/jquery.ui.js"></script>
<script src="js/lib/jRespond.js"></script>
<script src="js/lib/nav.accordion.js"></script>
<script src="js/class.function/get.pro.form.js"></script>
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
<!--Forms-->
<script src="js/lib/jquery.maskedinput.js"></script>
<script src="js/lib/jquery.validate.js"></script>
<script src="js/lib/jquery.form.js"></script>
<script src="js/lib/j-forms.js"></script>
<script src="js/lib/jquery.loadmask.js"></script>
<script src="js/lib/vmap.init.js"></script>
<script src="js/lib/theme-switcher.js"></script>
<script src="js/class.function/upload_pro.js"></script>
<script src="js/class.function/ins.msg.js"></script>
<script src="js/apps.js"></script>

</body>
</html>