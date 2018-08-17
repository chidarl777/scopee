<?php require("aut_session.php"); ?>
<?php require("inc/headeraut.inc.php"); ?>
<?php 
require_once("inc/check.php");
   if(isset($_GET["useridinscopeemedia"])){
   	try{
          $check_url=test_input($_GET["useridinscopeemedia"]);
			$get_dat=$dbh->prepare("SELECT *FROM users WHERE ID='$check_url' AND REMOVED='NO'");
			$get_dat->execute();
			 $num_url_id=$get_dat->rowCount();
			 if($num_url_id==1){
			 	
			
			 }
			 else{
			
			 }
}
catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}

   }
?>
<!doctype html>
<html>
<head>
  <meta>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <title>newsfeed</title>
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
  <link type="text/css" id="themes" rel="stylesheet" href="css/style.css">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <style>
  	
  	a#inifiniteLoader{
    position: fixed;  
    z-index: 2;  
    bottom: 15px;   
    right: 10px; 
    display:none;
}
.re,a{
	 text-decoration: none;
}
.re:hover{
	background-color:£f7f7f7;
}
  </style>
</head>
<body class="leftbar-view">
<?php require("inc/header.php"); ?>
<?php require("inc/leftbar.php"); ?>
<?php require("inc/conversation.inc.php"); ?>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!--Page Container Start Here-->
<section class="main-container">
<div class="container-fluid">
<!-- <div class="page-header filled full-block light">
  <div class="row">
      <div class="col-md-6 col-sm-6">
          <h2>Scoopy</h2>
         <!--  <p>Bootstrap3 supported admin template</p> -->
          <!--     <label class="label">Your email</label>
              <div class="input">
                  <input type="email" id="email" name="email" class="form-control">
              </div>
          </div>
      </div>
      <div class="col-md-6 col-sm-6"> -->
          <!-- <ul class="list-page-breadcrumb">
              <li><a href="#">Home <i class="fa fa- fa fa--chevron-right"></i></a></li>
              <li><a href="#">Layout <i class="fa fa- fa fa--chevron-right"></i></a></li>
              <li class="active-page"> Dashboard</li>
          </ul> -->
     <!--  </div>
  </div> -->
</div>
<div class="row">
<div class="col-md-12" >
<div class="widget-wrap" >
<div class="widget-header block-header margin-bottom-0 clearfix">
    <div class="pull-left">
        <h3>scopee</h3>
        <p>make new friends &amp; have fun</p>
    </div>
  
</div>
<div class="row" style="padding-top:25px;">
<div class="col-md-">
  <div class="widget-wrap">
      <div class="widget-header block-header margin-bottom-0 clearfix">
          <div class="pull-left">
              <h3>Recent Activities</h3>
          </div>
         </div>
      <div class="widget-container margin-top-0">
          <div class="widget-content">
              <div class="activities-container">
                  <ul class="activities-list">
                      <li>
                          <div class="activities-badge">
                              <!-- <span class="w_bg_amber"><i class="fa fa- fa fa--ticket-star"></i></span> -->
                          </div>
                          
                          <div class="activities-details">
                           
                                <!-- start textarea -->
                               <?php require("inc/post/send_post.php"); ?>
                                <form method="post">
                                <div class="unit">
                                    <label class="label">Textarea</label>
                                    <div class="input">
                                      <textarea class="form-control"  placeholder="your message..." spellcheck="false" name="post-area"></textarea>
                                    </div>
                                </div><br>
                                <!-- end textarea -->
                                <!-- start btn -->
                                <div class="form-footer" style="float:right;">
                                  <input type="submit" class="btn btn-success btn-sms " value="Post" name="send-post">
                              </div><br><br>
                              </form>
                              <!-- end of post btn -->
                             
                              
                              <!-- make loop hear -->
                              
                              <div  id="activity-psm" >
                            <div class="col-sm-12 news-feed" style="background-color:#F7F7F7;border-radius:5px;">
     <?php 
       $loadmore=7;
       if(isset($_GET['loadmore'])){
	   	$loadmore=$_GET['loadmore']+5;
	   }                     
                            
      ?>
                             <?php require("inc/post/get_post.php"); ?>
                              <?php require("inc/post/like.php"); ?>
                               <?php require("inc/post/unlike.inc.php"); ?>
                                <?php require("inc/post/insert_comment.php"); ?>
                              <!-- <h2 class="activities-header">Resolved Tickets #LTK7865</h2> -->
                              <?php echo $load;?>
                                        
          </div>
      </div>

                            </div>
                            <!-- loop ends hear -->
                          </div>
                          
                      </li>
                      </ul>
                  </div>

                  <br><br>
              </div>       
              <div id="infinityloader">
              	<a><img</a>
              </div>                 
          <!-- end post -->
          <div class="col-sm-12"></div>
        </div>

  </div>
</div>

</div>
</div>
</div>

</div>
</div>
 <?php require("inc/footer.inc.php");?>
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
<script src="js/class.function/inp.ho.fo.js"></script>
<script src="js/lib/chart/flot/jquery.flot.pie.min.js"></script>
<!--Forms-->
<script src="js/lib/jquery.maskedinput.js"></script>
<script src="js/lib/jquery.validate.js"></script>
<script src="js/lib/jquery.form.js"></script>
<script src="js/lib/j-forms.js"></script>
<script src="js/lib/jquery.loadmask.js"></script>
<script src="js/lib/vmap.init.js"></script>

<script src="js/lib/theme-switcher.js"></script>
<script src="js/lib2/show-comments.js"></script>
<script src="js/apps.js"></script>
 
 
</body>
</html>