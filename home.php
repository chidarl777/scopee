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
  <title>Home</title>
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
<!--Page Container Start Here-->
<section class="main-container">
<div class="container-fluid">
<script>
function adjustHeight(el){
    el.style.height = (el.scrollHeight > el.clientHeight) ? (el.scrollHeight)+"px" : "60px";
}
</script>

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
<div class="col-md-18" >
<div class="widget-wrap" >
<div class="widget-header block-header margin-bottom-0 clearfix">
    <div class="pull-left">
        <h3>scopee</h3>
        <p>make new friends &amp; have fun</p>
    </div>
</div>
<div class="row" style="padding-top:25px;">
<div class="col-md-10">
  <div class="widget-wrap">
      <div class="widget-header block-header margin-bottom-0 clearfix">
          <div class="pull-left">
              <h3>Recent Activities</h3>
              <p>All users recent activities timeline</p>
          </div>
          <!-- for post -->
           <div class="pull-right w-action">
              <ul class="widget-action-bar">
                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa- fa fa-globe"></i></a>
                      <ul class="dropdown-menu">
                          <li class="widget-reload"><a href="#"><i class="fa  fa-refresh "></i></a></li>
                          <li class="widget-toggle"><a href="#"><i class="fa fa-align-justify "></i></a></li>
                          <li class="widget-fullscreen"><a href="#"><i class="fa fa-square  "></i></a></li>
                         <!-- <li class="widget-exit"><a href="#"><i class="fa fa-power-off"></i></a></li>-->
                      </ul>
                  </li>
              </ul>
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
                           <?php require("inc/post/send_post.php"); ?>
                           <?php require("inc/uploading_file.php"); ?>
                                <!-- start textarea -->
                                 <form method="post" class="p-area"  enctype="multipart/form-data">
                                 <Br>
                                <div class="unit" id='ch'>
                                  <!--  <label class="label">Textarea</label>-->
                                    <div class="input">
                                      <textarea id="textarea" class="form-control "  data-toggle="modal" data-target="#textMD" placeholder="your message..." spellcheck="false" name="post-area1"><?php
                                      $texta=''; 
                                      if(isset($_SESSION['post-image']) && !empty($_SESSION['post-image'])){
									  		$texta=$_SESSION['post-area'];
									  	
									  }
									  else{
									  $texta='';
									  }
                                      
                                      echo $texta; ?></textarea>
                                    </div>
                                    <div class="pro">
                                    	<img id="pro" src="<?php echo $profile_pic1; ?>" />
                                    </div>
                                </div><br>
                                <!-- end textarea -->
                                
                              
             <div class="modalBox"  >

  <!-- Modal -->
  <div class="modal"  id="textMD">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Create Post</h4>
        </div>
        <div class="modal-body">
 <!-- start textarea -->
                               <style>
                               	.upload{
	width: 100%;
	height: 50px;
	padding: 10px;
	
}
.file-u{
	float: left;
	color:#80de47;
	border:2px gradient;	
	float: left;
}
.file-s{
	margin-left: 7px;
	background-color: #ffffff;
	width:70px;
	height: 40px;
	border: 2px solid #84846c;
	color:#26d92b;
	border-radius: 10px;
	
}
.file-s:hover{
	margin-left: 7px;
	background-color: #cccccc;
	width:70px;
	height: 40px;
	border: 2px solid #84846c;
	color:#ffffff;
	border-radius: 10px;
	
}

                               </style>
                                <div class="unit" style="margin-bottom: 10px;">
                                  <!--  <label class="label">Textarea</label>-->
                                  <div class="upload" >
                                  	<input type="submit" class="file-s btn" name="send-upload" value="upload" /><input type="file" class="file-u" name="upload-file" />
                                  </div><br/><br/>
                                    <div class="input">
                                    
                                      <textarea   class="form-control " onkeyup="adjustHeight(this)" style="overflow:hidden"  placeholder="your message..." spellcheck="false" name="post-area"><?php
                                      $texta=''; 
                                      if(isset($_SESSION['post-image']) && !empty($_SESSION['post-image'])){
									  		$texta=$_SESSION['post-area'];
									  	
									  }
									  else{
									  $texta='';
									  }
                                      
                                      echo $texta; ?></textarea>
                                    </div>
                                    <div class="pro">
                                    	<img id="pro" src="<?php echo $profile_pic1; ?>" />
                                    </div>
                                </div><br>
                                <!-- end textarea -->
                               
        </div>
        <div class="modal-footer">
           <!-- start btn -->
                                <div class="form-footer " style="float:right;width:100%; margin-top:15px;">
                                  <input type="submit" class="btn btn-success btn-sms " value="Post" name="send-post">
                              </div>
                              <!-- end of post btn -->
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  </div>
 
                              </form>
                             
                              <!-- end of post btn -->
                              <!-- make loop hear -->
                            <div class="col-sm-14" style="background-color:#E2E6E9;border-radius:5px;">
                                  <div  id="activity-psm row-col" style="margin: 2%;" >                        
                              <!-- <h2 class="activities-header">Resolved Tickets #LTK7865</h2> -->
                                  <div class="activities-meta" style="padding-top: 15px;">
                                 
                                  <?php require('inc/newsfeed/get_newsfeed.inc.php'); ?>
                                  
                                  <br/><br/>
                                  <?php echo $loadmore; ?>
 
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

</section>
<?php require('inc/footer.inc.php'); ?>
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