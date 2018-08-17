<?php
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

$w_background_pic="
.cover
{
  background-image: url('$w_background_pic2');
  background-size:cover;
    background-repeat: no-repeat;
    height: 300px;
    
}";

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
    <meta name="description" content="<?php echo $world_description; ?>">
    <meta name="keywords" content="<?php echo $world_tags; ?>"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Aboutus</title>
    
<?php require('inc/r-side-bar.php');?>

    <!--Page Container Start Here-->
    <section class="main-container">
        <div class="container">
           <style>
           	h2{
				font-size: 30px;
				color:#17b51f;
			}
           </style>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="widget-wrap">
                            <div class="widget-header block-header margin-bottom-0 clearfix">
                                <div class="left-align">
                                    <h1>About <?php echo $w_name; ?></h1>
                                   <p>
                                   <h4>
                                   	 <?php echo $world_description;?>
                                   	 </h4>
                                   </p>
                                </div>
                            </div>
                         
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
        </div>
    </section>
<?php require("inc/footer.inc.php"); ?>
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
<script src="js/lib/smart-resize.js"></script>
<!--Forms-->
<script src="js/lib/jquery.maskedinput.js"></script>
<script src="js/lib/jquery.validate.js"></script>
<script src="js/lib/jquery.form.js"></script>
<script src="js/lib/additional-methods.js"></script>
<script src="js/lib/j-forms.js"></script>
<!--[if lt IE 10]>
<script src="js/lib/jquery.placeholder.min.js"></script>
<![endif]-->
<!--Select2-->
<script src="js/lib/select2.full.js"></script>
<script src="js/lib/jquery.loadmask.js"></script>
<script src="js/apps.js"></script>
</body>
</html>