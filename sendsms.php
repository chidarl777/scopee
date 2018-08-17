<?php require("aut_session.php"); ?>
<?php require("inc/headeraut.inc.php"); ?>
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
    <title>Send SMS</title>
    <script language="javascript" type="text/javascript">
    //this code handles the F5/Ctrl+F5/Ctrl+R
    document.onkeydown = checkKeycode
    function checkKeycode(e) {
        var keycode;
        if (window.event)
            keycode = window.event.keyCode;
        else if (e)
            keycode = e.which;

        // Mozilla firefox
        if ($.browser.mozilla) {
            if (keycode == 116 ||(e.ctrlKey && keycode == 82)) {
                if (e.preventDefault)
                {
                    e.preventDefault();
                    e.stopPropagation();
                }
            }
        } 
        // IE
        else if ($.browser.msie) {
            if (keycode == 116 || (window.event.ctrlKey && keycode == 82)) {
                window.event.returnValue = false;
                window.event.keyCode = 0;
                window.status = "Refresh is disabled";
            }
        }
    }
</script>
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
    <style>

.modalBox{
	padding: 30px;
}
.modalBox1{
	padding: 5px;
}
.msg{
	width: 150px;
	height: 80px;
}

.modal-cont{
	background-color: #ffffff;
}
modal-footer{
	color: #ffffff;
}
.model-body{
	width:100px;;
	height: 100px;;
	margin:10px;
	}
</style>

    </head>
    <body class="leftbar-view">
  <?php require("inc/header.php"); ?>
<?php require("inc/leftbar.php"); ?>
<?php require("inc/conversation.inc.php"); ?>  
<!--Page Container Start Here-->
    <?php $world_address=''; ?>
    
    <?php 
    $_POST['sms-msg']='how to sing and dance';
    if(!empty($_POST['sms-msg'])){
		$_SESSION['sms-msg']=$_POST['sms-msg'];
		
		//header("location:send_sms.php");
	}
    
    ?>
  
    <script>
    	function isNumberKey1(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

    </script>
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
        <div class="sms" style="width:100%; text-justify: distribute;">
           
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
                    	 <a href="buysmsunit.php?wor=<?php if(isset($_GET['wor'])){ $world_address=$_GET['wor']; echo $world_address;}?>">Buy Unit</a>&nbsp;&nbsp;
                    	 <a href="sentsms.php?wor=<?php if(isset($_GET['wor'])){ $world_address=$_GET['wor']; echo $world_address;}?>">Sent SMS</a>
                    </div>
                    
                    <div class="warning" ><center>NOTE: If you are sending a message to huge number of contacts, it advisable to do a test to yourself just to be sure your message has no ban word(s).
                    <p>
                    	NOTE: Please note that sending a long SMS (i.e message longer than 160 character) will value message length as 152 characters (instead of 160) due to UDH (user defined header), i.e-if you are sending message with length greater than 304, you will be charged for 3 messages; if you are sending message with length above 456, you will be charged for 4 messages; and so on.
                    </p>
                    </center>
                    </div>
                    <div class="phone-area">
                  
                    <form method="post" action="">
                    	
                        <div class="input">
                        <div class="send">
                    	<h3 >Sender id:</h3>
                    	<input type="text" class="sender-id" placeholder="sender id" name='sender-id' value="<?php 
                    	try{
							
                    	$world_id_w=$_SESSION['world_id'];
                    	//getting world name
			$get_world_n=$dbh->prepare('SELECT *FROM worlds_tbl WHERE CREATED_BY="'.$user_login.'" AND ID="'.$world_id_w.'"');
			
		$get_world_n->execute();
		$fetch_world_n=$get_world_n->fetch(PDO::FETCH_ASSOC);
		$world_name=$fetch_world_n['WORLD_NAME'];
		$world_adresss=$fetch_world_n['WORLD_ADRESS'];
		$created_by=$fetch_world_n['CREATED_BY'];
		if($_GET["wor"]==$world_adresss){
			echo $world_name;
		}
		 }
 catch(PDOException $error){
							echo('connection error,because:'.$error->getMessage());

							}
		
                    	 ?>" placeholder="Enter a sender id"/>
                    </div><br/>
                        &nbsp;<h3 style="margin-left: 2%;" >Send to:</h3>
                            <div class="right-pane">
                        	<button>Address book</button>
                        	<input type="submit" name="contact-followers" value="Followers">
                        	<input type="submit" name="contact-friends" value="Friends">
                        	<input type="submit" name="previous_send_to" value="Previous">
                        	<button>Upload Contacts</button>
                        </div>
                        
                        <textarea class="phone-text" name="contact-textarea" onkeypress="return isNumberKey(event)" placeholder="copy and paste contact here"><?php
                        try{
							 
                        if(isset($_SESSION['use-number']) && !(empty($_SESSION['use-number']))){
         			 $use_numbers=$_SESSION['use-number'];
							echo $use_numbers;
							
							unset($_SESSION['use-number']);
							
						} 
						else{
							//do nothing
						}
						}
						 catch(PDOException $error){
							echo('connection error,because:'.$error->getMessage());

							}
                         ?><?php require('inc/sms/getting.followers.contact.php'); ?><?php require('inc/sms/getting.friends.contact.php'); ?></textarea>
                        	<div class="ph-footer" style="margin-left: 2%;">
                        	Enter a mobile number or numbers separated with comma. e.g 2348037600001, 2348030076402, 2348033498753 or 08035555551, 08036666662, 0807777773.
You can use copy & paste by pressing Control+C & Control+V respectively.
                        </div>
                        <div>
                        <?php require("inc/sms/insert.sms.php");?>
                        	<h3 style="margin-left: 2%;">Message to send:</h3>
                        	<textarea class="phone-text" name="textmsg-area" placeholder="type your message here..."><?php
                        try{
							 
                        if(isset($_SESSION['txtsms-area']) && !(empty($_SESSION['txtsms-area']))){
         			 $smsmsg=$_SESSION['txtsms-area'];
							echo $smsmsg;
							unset($_SESSION['txtsms-area']);
							
						} 
						}
						 catch(PDOException $error){
							echo('connection error,because:'.$error->getMessage());

							}
                         ?></textarea>
                        </div>
                        
                       &nbsp;<div class="btn-body"><div class="btn-sd" style="float: right;"><center> <input type="submit" class="btn-send" name="send-sms"  value="Send" /></center></div>
                       </div></div> </form>  <br/><br/>
                        </div>
                                                    
        
                    </div>
                    
                    <div class="col-md-1"></div>
                </div>
                <?php
                try{
					if(isset($_POST['previous_send_to'])){
						if(empty($_POST['contact-textarea'])){
							
							if(empty($_POST['textmsg-area'])){
								//do nothing
							}
							else{
								$txtsms_area=$_POST['textmsg-area'];
						     $_SESSION['txtsms-area']=$txtsms_area;
							}
							
							echo'<meta http-equiv="refresh" content="0, url=sentsms.php?wor='.$world_address.'" />';
						}
						else{
							$contact_txtarea=$_POST['contact-textarea'];
							$_SESSION['use-number']=$contact_txtarea;
							
							
							if(empty($_POST['textmsg-area'])){
								//do nothing
							}
							else{
								$txtsms_area=$_POST['textmsg-area'];
						     $_SESSION['txtsms-area']=$txtsms_area;
							}
							
							echo'<meta http-equiv="refresh" content="0, url=sentsms.php?wor='.$world_address.'" />';
						}
					}
				}
                catch(PDOException $error){
							echo('connection error,because:'.$error->getMessage());

							} 
                 ?>
                <?php require("inc/footer.inc.php"); ?>
        </div>
        </div>
        </div>
    </section>

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