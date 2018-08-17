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

    <!--Page Container Start Here-->
    <div class="">
        <div class="container">
           <style>
           	h2{
				font-size: 30px;
				color:#17b51f;
			}
           </style>
                <div class="row"><br/><br/>
                <p>&nbsp;&nbsp;<a href="profile.php?u=<?php echo $uid_pro;?>"><button>Back</button></a></p>
                <?php
                 //==============================================
               //CODE FOR GETTING USER PHOTO
               //===============================================
             //  $v_id=$_GET['u'];
               $photo_id=$_GET['photoid'];
               $sql_photo=$dbh->prepare('SELECT *FROM uploaded_pics_tbl WHERE USER_UPLOADED="'.$userlog.'" AND ID="'.$photo_id.'" AND REMOVED="NO"');
               $sql_photo->execute();
               $num_sql_photo=$sql_photo->rowCount();
               if($num_sql_photo>0){
			   while($fetch_sql_photo=$sql_photo->fetch(PDO::FETCH_ASSOC)){
			   	$user_photos=$fetch_sql_photo['UPLOADED_FILE'];
			   	$user_photos_id=$fetch_sql_photo['ID'];
			   	echo"<center><img src='user_data/user_photo/$user_photos' style='height:80%; width:80%; border:2px solid; margin:10px;'/></center>";
			   }
			   }
			    else{
			   	echo 'No '.$pro_firstname.' '.$pro_othername.' Photos Found';
			   }
                      
                ?>
                </div>
                <p>
                <a href="profile.php?u=<?php echo $uid_pro;?>"><button>Back</button></a></p>
        </div>
    </div>

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