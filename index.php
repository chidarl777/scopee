<!doctype html>
<html>
<head>
       <meta name="description" content="Scopee the latest social community of enterpreneurs and internet users that inspires, educate, and empower it's user. In scopee a user can create,market and promote their bussiness or brand and also manage there engagements and events ">
    <meta name="keywords" content="About scopee,index.php,scopee index page, scopee index, scopee homepage,entrepreneurs,scopee for enterpreneurs,community for enterpreneurs,scopee registration Scopee info, Scopee informaiton,About scopee.in,scopee.in,scopee, Aboutus, scopee's Aboutus,Aboutus Scopee.in,aboutus scopee,scopee,scopee.in"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Scopee</title>
 
    <link rel="icon" type="image/ico" href="/favicon.ico" />
    <link type="text/css" rel="stylesheet" href="font-awesome/css/font-awesome.css">
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
    <link type="text/css" rel="stylesheet" href="css/style.css">
</head>
<body class="login-page" >
<?php require("inc/headerMenu.php");
require("inc/datetimediff.inc.php");
?>

   
<!--Page Container Start Here-->
<style>
	.item{
		width:100%;
		height:300px;
	}

		.reg-btn:hover{
		color:#34bf1c;
		background-color: #ffffff;
		border:2px;
		
	}
	
</style>
<div class="container">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox" >
 
      <div class="item active">
      <img src="images/ej.jpg" alt="promote"style=""  >
        
        <div class="carousel-caption">
          
                 <h1>SCOPEE</h1>
                                  [Social Community Of People's Education and Empowerment]
    <p>Meets <span class="capture">Friends</span> and <span class="capture">Earn</span> by <span class="capture">creating your business and making Posts</span></p>
         <h3>The fastest growing community of entrepreneurs and internet users...</h3>
          <br/><span><button class="reg-btn" ><a href="registration.php">JOIN NOW</a></button></span>
        </div>
      </div>

      <div class="item">
        <img src="images/download.jpg" alt="promote" style="width:100%;" width="460" height="345">
        <div class="carousel-caption">
         
                 <h1>SCOPEE</h1>
                                  [Social Community Of People's Education and Empowerment]
    <p>Meets <span class="capture">Friends</span> and <span class="capture">Earn</span> by <span class="capture">creating your business and making Posts</span></p>
         <h3> Let promote and market your business to our unlimited audience</h3>
          <br/><span><button class="reg-btn" ><a href="registration.php">JOIN NOW</a></button></span>
        </div>
      </div>
    
      <div class="item">
        <img src="images/err.jpg" alt="Flower" style='width:"460px"; height:"345px";'>
        <div class="carousel-caption">
        
                 <h1>SCOPEE</h1>
                  [Social Community Of People's Education and Empowerment]
    <p>Meets <span class="capture">Friends</span> and <span class="capture">Earn</span> by <span class="capture">creating your business and making Posts</span></p>
          <h3>Let build your business together</h3>
          <br/><span><button class="reg-btn" ><a href="registration.php">JOIN NOW</a></button></span>
          
        </div>
      </div>

      <div class="item">
        <img src="images/err2.jpg" style="width:100%; " alt="Flower" width="460" height="345">
        <div class="carousel-caption">

                 <h1>SCOPEE</h1>
                 [Social Community Of People's Education and Empowerment]
    <p>Meets <span class="capture">Friends</span> and <span class="capture">Earn</span> by <span class="capture">creating your business and making Posts</span></p>
                                	</center>
         <h3>90% of revenues earned through your business is rewarded back to you.</h3>
          <br/><span><button class="reg-btn" ><a href="registration.php">JOIN NOW</a></button></span>
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<section class="main-container">
<div class="container-fluid">
     <div class="row">
        <h1 style="padding-left:20px;"><b>LATEST</b></h1>
		<?php require("inc/world/get_wor_post_latest.php"); ?>
    </div>
    <div class="row">
        <h1 style="padding-left:20px;"><b>TRENDING</b></h1>
        <?php require('inc/world/get_wor_post_trending.php'); ?>
    </div>
     <div class="row">
        <h1 style="padding-left:20px;"><b>MOST SHARED</b></h1>
  <?php require('inc/world/get_wor_post_most_shared.php'); ?>
</div>

</section>
<!--Page Container End Here-->
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