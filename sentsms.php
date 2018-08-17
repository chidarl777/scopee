<?php require("aut_session.php");?>
<!doctype html>
<html>
<head>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
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
  <meta name="description" name="keywords"/>
  <title>Sent SMS</title>
<style>
.title-header{
	width: 100%;
    padding-top: 10px;
    padding-bottom: 10px;
    padding-left: 5px;
    padding-right: 5px;
    font-size: 17px;
    font-weight: bold;
}
.num,.title-header{
	font-size: 17px;
	font-weight: bold;
}
.num{
	float:right;
	margin-right: 10px;
	
}
.summary{
	padding-left: 5px;
    padding-right: 5px;
    padding-top:10px;
    font-size: 17px;
   min-height: 100px;
   max-height: 200px;
    
}
.trk{
	width: 100%;
	margin:0.3%;
	font-weight: bold;
	font-size: 18px;
}
.sms-to{
	width: 80%;
	padding:1%;
}
.sms-info{
	float: right;
}
hr{
	width:100%;
	color:#3ce617;
}
.cat-footer{
	width: 100%;
}
.cat-footeer{
	padding: 5px;
}
.d-footer{
	float:right;
	margin-right: 10px;
}
.l-footer{

}
.i-buttons{
	width: 50%;
	float: right;
	margin-bottom: 2%;
}
.col{
	margin-left: 10px;
	width:100%;
	border:2px solid  #29a813;
	border-radius: 10px;
	 min-height: 260px;
	  max-height: 400px;
	  background-color: #ffffff;
	 
}
.col:hover{
	margin-left: 10px;
	width:100%;
	border:2px solid #29a813;
	border-radius: 10px;
	 min-height: 260px;
	  max-height: 400px;
	  background-color: #ffffff;
	  box-shadow: 10px 10px 5px #888888;
	 
}
.i-info span{
	margin-left: 2%;
	margin-right: 2%;
}
</style>
</head>

<body class="leftbar-view"> 
<?php require("inc/header.php"); ?>
<?php require("inc/leftbar.php"); ?>
<?php require("inc/conversation.inc.php"); ?>  

      <style>
    	.phone-text{
			width: 63%;
			border:4px  groove #22a60b;
			margin-left: 2%;
			height: 250px;
		}
    	
		.phone-area{
			width: 100%;
			
		}
    	
		
		.send{
			margin:30px;
			width: 60%;
		}
		.ph-footer{
			color:red;
			font-size: 17px;
			width: 63%;
			font-weight: bold;
		}
		.right-pane{
		float: right;
		margin-right:2%;
		width:30%;	
		}
		.phone-area button:hover,.phone-area input[type=submit]:hover{
			height:40px;
			width:100%;
			border: 2px solid #22a60b;
			color:#ffffff;
			font-size: 15px;
			background-color: #1a8a13;
			
		}
		.phone-area button,.phone-area input[type=submit]{
			height:40px;
			width:100%;
			border: 2px solid #22a60b;
			color:#1a8a13;
			font-size: 15px;
			background-color: #ffffff;
			
		}
		.warning{
			background-color: #ea1c5f;
			width:100%;
			font-size: 18px;
			color: #ffffff;
			padding-bottom: 7px;
			
			text-align: justify;
			font-weight: bold;
			
		}
		#s-id{
			float:left; 
		}
		.sender-pane{
			widows: 100px;
			height: 80px;
			border: none;
			background-color: #ffffff;
		}
		.sms{
			background-color: #dddedc;
		}
		.btn-send{
			width:40%;
			height: 50px;
			background-color: #049304;
			color:#ffffff;
			
		}
		.sender-id{
			width: 60%;
			height: 50px;
			border:none;
			background-color: #eeeeee;
			
		}
		.sms-header{
			padding-bottom: 20px;
			margin: 2%;
		}
		.sms-header a:hover{
			color:#000000;
			font-size: 17px;
			text-decoration: underline #0cc50c;
			
		}
		.sms-header a{
			padding: 30px;
			width: 70px;
			height: 70px;
			background-color: #ffffff;
			text-decoration: none;
			color:#0cc50c;
			font-size: 17px;
		}
		.btn-sd{
			width: 30%;
		}
		.btn-body{
			width: 63%;
			margin-left:2%;
		}
		.unit-icon{
	float: right;
	margin-right: 1%;
	margin-left: 2%;
	background-color: #ffffff;
	color: #27be12;
	font-weight: bold;
	font-size: 18px;
	
}
    </style>
<?php
if(isset($_GET["wor"])){
	$world_address=$_GET["wor"];
}
else{
	$world_address='';
}
?>

    <!--Page Container Start Here-->
    <section class="main-container">
  <div class="widget-container" style="margin-bottom:0px;" >
            <div class="row">
                 <!-- <div class="col-md-12"> -->
                   <!--  <div class="widget-wrap">
                         <div class="widget-header" > -->
                              <div class="container-fluid">
        <div class="sms">
           
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="sms-header">
                    <span class="unit-icon"><a>Unit: <?php
                    require('inc/db/config.php');
                    //CHECKING USERS SMS UNIT
		$sql_u_unit=$dbh->prepare('SELECT SMS_UNIT FROM users where USERNAME="'.$user_login.'" AND REMOVED="NO" ');
		$sql_u_unit->execute();
		$num_sql_u_unit=$sql_u_unit->rowCount();
		if($num_sql_u_unit>0){
			$fetch_sql_u_unit=$sql_u_unit->fetch(PDO::FETCH_ASSOC);
			
			$user_u_sms_unit=$fetch_sql_u_unit['SMS_UNIT'];
			echo $user_u_sms_unit;
			}
                     ?></a></span>
                    	<a href="refillwallet.php">Refill Wallet</a>&nbsp;&nbsp;
                    	 <a href="buysmsunit.php?wor=<?php if(isset($_GET['wor'])){ $world_address=$_GET['wor']; echo $world_address;}?>">Buy Unit</a>&nbsp;&nbsp;<a href="sendsms.php?wor=<?php if(isset($_GET['wor'])){ $world_address=$_GET['wor']; echo $world_address;}?>">Send SMS</a>
                    </div>
                    
      <div class="widget-container margin-top-0">
          <div class="widget-content">
              <div class="activities-container">
                  <ul class="activities-list">
                      <li>
                          <div class="">
                          <form method="post" action="">
                       <?php require('inc/sms/view_sent_sms.php'); ?>
                       </form>
                       
                          </div>

                      </li>
                      </ul>
                  </div>
           <br><br>
              </div>                        
          <!-- end post -->
          <div class="col-sm-12"></div>
        </div>

</div>

</div>
</div>
<?php require('inc/footer.inc.php'); ?>
</section>
<!--Rightbar End Here-->
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
<!--Forms-->
<script src="js/lib/jquery.maskedinput.js"></script>
<script src="js/lib/jquery.validate.js"></script>
<script src="js/lib/jquery.form.js"></script>
<script src="js/lib/j-forms.js"></script>
<script src="js/lib/jquery.loadmask.js"></script>
<script src="js/lib/vmap.init.js"></script>
<script src="js/lib/theme-switcher.js"></script>
<script src="js/apps.js"></script>
</body>
</html>