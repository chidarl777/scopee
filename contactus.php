<!doctype html>
<html>
<head>
    <meta>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="For more information and question about Scopee and it related features contact us for info.">
    <meta  name="keywords" content="faq,scopee faq,contactus,scopee contactus,more information,scopee aboutus,scopee.in contactus,scopee,scopee.in"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Contactus</title>
    
<?php require('inc/r-side-bar.php');?>
<?php 
 
If(isset($_SESSION["user_login"]) && !(empty($_SESSION["user_login"]))){
 $msg_from='';
}
else{

 $msg_from_contact=' <div class="unit">
                            <div class="input login-input">
                                <div class="form-group input-group">
                                    <span class="input-group-addon" id="basic-addon1"> <i class="fa fa-pencil"></i></span>
                                    <input type="text" id="" name="message-from" placeholder="Email/phone number" class="form-control" aria-describedby="basic-addon1"/>
                                </div>
                            </div>
                        </div>';
}
?>
    <?php  
    require('inc/send_contactus.inc.php');
    ?>
    <!--Page Container Start Here-->
    <section class="login-container boxed-login">
    <div class="container">
        <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 widget-wrap">
                <form action="" method="POST">

                    <div class="login-form-header">
 <?php
 	//CHECKING IF CONTACTUS WAS FOR WORLD OR ADMIN
 	if(isset($_GET['wor'])){
	$ms_to=test_input($_GET['wor']);
 	If(empty($ms_to)){
		$mes_to="";
	}
	else{
		$mes_to=$ms_to;
	}	
	}
	else{
		$mes_to="";
	}
	if(!empty($mes_to)){
		
	
	$SQL_w2=$dbh->prepare('SELECT *FROM worlds_tbl WHERE WORLD_ADRESS="'.$mes_to.'" AND REMOVED="NO"');
	$SQL_w2->execute();
	//getting rows returned
	$num_sql=$SQL_w2->rowCount();
	
	
	 if($num_sql==1){
	 	
	 	$get_data=$SQL_w2->fetch(PDO::FETCH_ASSOC);
	 	$world_creator=$get_data['CREATED_BY'];
	 	
	 	$w_name=$get_data['WORLD_NAME'];
	echo '<div class="logo btn-success" style="padding:2%;">
                             <h4 ><b>'.$w_name.'</b></h4>
                        </div>';
                        
        }
        }
 ?>
                        <div class="logo">
                             <h4><b>Contact Us</b></h4>
                        </div>
                        <hr>
                    </div>
                    <div class="login-form-content">
                        <!-- start login -->
                        <?php echo $received_msg.$received_msg1;?>
                       <?php echo "$msg_from_contact";?>
                        <!-- end login -->
                        <div class="unit">
                            <div class="input login-input">
                                <div class="form-group input-group">
                                    <span class="input-group-addon" id="basic-addon1"> <i class="fa fa-envelope"></i></span>
                                    <textarea name="message-body"  placeholder="Enter message here" class="form-control"></textarea>
                                    <!-- <input type="search" id="search_friend" name="search_friends" placeholder='Email or Phone' class="form-control" aria-describedby="basic-addon1"/> -->
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row login-form-footer">
                        <div class="col-md-9"></div>
                        <div class="col-md-3">
                            <input type="submit" class="btn-block btn btn-success" value="Send" name="send-message">
                        </div>
                    </div>
                </form>
          
        </div>
        
    </div><br/>
        
<?php require('inc/footer.inc.php'); ?>
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