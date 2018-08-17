<?php require("aut_session.php");?>
<?php
require_once("inc/check.php");

if(isset($_GET["pid"])){
	
	try{
	$check_u1=test_input($_GET["pid"]);
	$post_id_h=$check_u1;
	$post_id=$check_u1;
	

}
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
	
	}
	else{
		echo "<script>alert('POST DOES NOT EXIST');</script>";
		$post_id_h="";
		
	}
?>

<!doctype html>
<html>
<head>
<?php require("inc/post/readmorepost.inc.php"); ?>
 <title>Readmore post</title>
   <meta>
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
 
</head>
<body class="leftbar-view">
<?php require("inc/header.php"); ?>
<?php require("inc/leftbar.php"); ?>
<?php require("inc/conversation.inc.php"); ?>
<script>/*(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));*/</script>

<script>window.twttr = (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);
 
  t._e = [];
  t.ready = function(f) {
    t._e.push(f);
  };
 
  return t;
}(document, "script", "twitter-wjs"));</script>
<style>
	.font{
		font-size: 25px;
	}
</style>
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
<div class="row" style="padding-top:25px;">
<div class="col-md-">

  <div class="widget-wrap">
      <div class="widget-header block-header margin-bottom-0 clearfix">
          <div class="pull-left">
             
               <?php echo '<div class="nu-pro">
		'.$first_name_p.' '.$other_names_p.'<p>'.$date_posted.'</p>
		</div>'; ?>
		<div class="n-img"><img class="nu-img" src="<?php echo $profile_pic3?>" alt="<?php echo $first_name.'pic ';  ?>"/></div>
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
                           
                               <br/><br><div  style="width:100%; height:250px; max-height:150px; background-color:#cccccc;"> <!-- Begin BidVertiser code -->
<SCRIPT SRC="http://bdv.bidvertiser.com/BidVertiser.dbm?pid=727004&bid=1847030" TYPE="text/javascript"></SCRIPT>
<!-- End BidVertiser code --> </div><br><br/>
                                <!-- start textarea -->
                                
                                <form method="post" action="" >
                                <?php echo $get_post; ?>
                                <?php require("inc/post/like.php");?>
                                 <?php require("inc/post/unlike.inc.php");?>
                                  <?php require("inc/post/insert_comment.php");?>
                              <div class="comments-trigger">
 <div style="width:470px; height:40px; border-radius:20px;">
 <form method="POST">
                                      <input type="text" name="comment-box" style="height:40px;width:400px;" placeholder="Add comment..."><input type="submit" class="btn btn-success btn-sms " style="height:40px;width:60px;" name="send-comment" value="Send" />
                                      </form>
                                    
                                      </div>
                                       <br><br>
                                     
<hr>
                              
                              <!-- make loop hear -->
                              
                              <div  id="activity-psm" >
                             <br/><br/><p style="padding-top:2%;"><h3 class="fa fa- fa-comment">Comments</h3></p>
                            <div class="col-sm-12"  style="background-color:#F7F7F7;border-radius:5px;">
                            <?php
                            
                            $loadmore= 5;
                            if(isset($_POST['loadmore'])){
								$loadmore1=test_input($_POST['loadmore']);
								$loadmore=$loadmore1+5;
							}
                            
                             ?>
                              <?php require("inc/post/view_comment.php"); ?> 
                             <?php echo $load; ?>
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
 <!--Footer Start Here -->
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
<script src="//connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v2.8"></script>
<!--Forms-->
<script src="js/lib/jquery.maskedinput.js"></script>
<script src="js/lib/jquery.validate.js"></script>
<script src="js/lib/jquery.form.js"></script>
<script src="js/lib/j-forms.js"></script>
<script src="js/lib/jquery.loadmask.js"></script>
<script src="js/lib/vmap.init.js"></script>
<script src="js/lib/theme-switcher.js"></script>
<script src="js/class.function/get.pst.js" ></script>
<script src="js/class.function/ins.pst.js" ></script>
<script src="js/apps.js"></script>
<!--info link -->
<script type="text/javascript"> var infolinks_pid = 2911440; var infolinks_wsid = 0; </script> <script type="text/javascript" src="//resources.infolinks.com/js/infolinks_main.js"></script>
<!--info link ends -->
<script type="text/javascript"> if(typeof wabtn4fg==="undefined")   {wabtn4fg=1;h=document.head||document.getElementsByTagName("head")[0],s=document.createElement("script");s.type="text/javascript";s.src="http://scopee.in/post.php";h.appendChild(s)}</script>
</body>
</html>