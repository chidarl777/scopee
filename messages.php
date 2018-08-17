<?php require("aut_session.php");?>
<!doctype html>
<html>
<head>
  <meta>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <title><?php echo $user_firstname ?>'s messages</title>
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
  <link type="text/css" rel="stylesheet" href="cssa/animate.min.css">
  <link type="text/css" id="themes" rel="stylesheet" href="">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body class="leftbar-view">
<?php require("inc/header.php");?>
<?php require("inc/leftbar.php");?>
<?php require("inc/conversation.inc.php");?>

<!--=======================Page Container Start Here =================================-->
<!--Page Container Start Here-->
<section class="main-container">

    <div class="container-fluid">
        <div class="page-header filled full-block light">
            <div class="row">
                <div class="col-md-8">
           <?php require("inc/msg/show.all.msg.inc.php"); ?>
                    <?php echo $get_img; ?><p><label>Sent by: <?php echo $first_name_m.' '.$other_name_m; ?></label>
                   <p> <label>Date Sent: <?php echo $date_m; ?></label>
                     </p>
                </div>
                <div class="col-md-6">
                    
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="widget-wrap" style="padding:15px;">
                    <div class="widget-header  margin-bottom-0 clearfix">
                      <div class="col-md-8">
                       <div class="widget blog_gallery">
                         <ul class="sidebar-gallery">
                           <?php echo $get_message_all; ?>
                        </ul>
                        <!-- start textarea -->
                        <?php 
                        
                        if($user_login==$message_to){
                        	$userlog=$message_from;
                        	require("inc/msg/send_msg.php");
							$form='<form method="post" action="" class="send-msg"  >
                                
                                <div class="unit">
                                  <!--  <label class="label">Textarea</label>-->
                                  <span class="errors"><?php echo $msgerr;?></span>
                                    <div class="input">
                                      <textarea class="form-control" name="msg-area" placeholder="Your Reply here..." spellcheck="false" id="message-area">
                                      	
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
                              <!-- end textarea here -->';
                              echo $form;
						}
                        ?>
                                
                    </div><!--/.blog_gallery-->
                       <!-- stop hear -->
                       </div>                          
                          <div class="col-md-4">
                            <h4>advert</h4>
                          <div class="widget blog_gallery">                      
                          <ul class="sidebar-gallery">
                               <?php// require("inc/world/get.suggested.world.inc.php");?>
                          </ul>
                      </div><!--/.blog_gallery-->          
                   
                      </div><!--/.blog_gallery-->                     
                  </div>
              </div>
          </div>
      </div>
                      
                
      </div>
      </div>
      </div>




        <!-- navbar ends -->
        
    

<?php require("inc/footer.inc.php");?>
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