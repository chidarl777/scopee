<?php require("aut_session.php");?>
<!doctype php>
<html>
<head>
  <meta>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <title>create world</title>
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
  <link type="text/css" rel="stylesheet" href="css/style.css">
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
                <div class="col-md-6">
                    <h2>Create your world</h2>
                    <p> </p>
                </div>
                <div class="col-md-6">
                    
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="widget-wrap">
                    <div class="widget-header block-header margin-bottom-0 clearfix">
                        <div class="pull-left">
                            <h3>Create Your World</h3>
                            <p>Inspire People In Your Own Way!!! </p>
                        </div>
                        <?php require("inc/world/insert_world.inc.php"); ?>
                        <div class="pull-right w-action">
                           
                        </div>
                    </div>
                    <div class="widget-container">
                        <div class="widget-content">
                            <div class="row">
                                <div class="col-md-12">
                                <form action="" class="j-forms" method="POST">

                                <div class="form-content">

                                <!-- start text password -->
                                <div class="row">
                                    <div class="col-md-6 unit">
                                        <label class="label">World Name</label>
                                        <div class="input">
                                            <label class="icon-left" for="text">
                                                <i class="fa fa-edit"></i>
                                            </label>
                                            <input class="form-control" type="text" name="world-name" placeholder="world name" id="world-adress">
                                        </div>
                                    </div>
                                    
                                   <div class="col-md-6 unit">
                                        <label class="label">World Adress</label>
                                        
                                        <div class="input">
                                            <label class="icon-left" for="email">
                                                <i class="fa fa-envelope-o"></i>
                                            </label>
                                            <input class="form-control" type="text" placeholder="adressexample.com" name="world-adress" id="world-adress">
                                        </div>
                                    </div>
                                     <span style="float:left;" class="errors"><?php echo $world_nameerr;?></span>
                                <span style="float:right;" class="errors"><?php echo $world_adresserr;?></span>
                                </div>
                               
                               
                               
                                <!-- end text password -->

                               <!-- start textarea -->
                                <div class="unit">
                                    <label class="label">Describe Your World</label>
                                    <div class="input">
                                        <label class="icon-left" for="textarea">
                                            <i class="fa fa-file-text-o"></i>
                                        </label>
                                        <textarea class="form-control" name="world-description" placeholder="A short description of what your world is about..." spellcheck="false" id="textarea"></textarea>
                                    </div>
                                     <span style="float:left;" class="errors"><?php echo $world_descriptionerr;?></span>
                             
                                </div>
                                <div class="unit">
                                    <label class="label">Tag Your World</label>
                                    <div class="input">
                                        <label class="icon-left" for="textarea">
                                            <i class="fa fa-file-text-o"></i>
                                        </label>
                                        <textarea class="form-control" name="world-tag" placeholder="Add world tag(pointer- neccesary for optimized visibility when search) example go,yes,no etc with comma after each tag." spellcheck="false" id="textarea"></textarea>
                                    </div>
                                     <span style="float:left;" class="errors"><?php echo $world_tagerr;?></span>
                             
                                </div>
                                
                                <!-- end textarea -->
                                 <!-- start single select -->
                                <div class="unit">
                                    <label class="input select">
                                        <select class="form-control" name="world-catergory">
                                            <option value="">world catergory</option>
                                            <?php
try{
	
//selecting all world category
require('inc/db/config.php');
$sql_cat=$dbh->prepare('SELECT *FROM category WHERE removed="no"');
$sql_cat->execute();
$num_sql_cat=$sql_cat->rowCount();

if($num_sql_cat>0){
	//fetching category
	while($fetch_sql_cat=$sql_cat->fetch(PDO::FETCH_ASSOC)){
		$category=$fetch_sql_cat['category'];
		
		//echoing category
		$call_category='<option value="'.$category.'">'.$category.'</option>';
		echo $call_category;
	}
}
	}
	catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
?>
                                        </select>
                                      </label>
                                       <span  class="errors"><?php echo $world_catergoryerr;?></span>
                                </div>
                                <!-- end single select -->
                                

                <div class="widget-wrap">
                    <div class="widget-header block-header margin-bottom-0 clearfix">
                        <div class="pull-left">
                            <h3>Privacy</h3>
                            <p>Select how you want your world to be viewed </p>
                        </div>
                        <div class="pull-right w-action">
                           
                        </div>
                    </div>
                    <div class="widget-container">
                        <div class="widget-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="#" class="j-forms" novalidate>

                                        <div class="form-content">

                                        <!-- start widget buttons 50 -->
                                        <label>Who Should View Your World</label>
                                       <label class="radio">
                                                        <input type="radio" id="view-world" name="view-world" checked="" value="Public">
                                                        <i></i>
                                                        Public
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" id="view-world" name="view-world" value="Only Me">
                                                        <i></i>
                                                        Only Me
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" id="view-world"  name="view-world" value="Friends">
                                                        <i></i>
                                                       Friends
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" id="view-world" name="view-world" value="Followers">
                                                        <i></i>
                                                       Followers
                                                    </label>
                                                     <label class="radio">
                                                        <input type="radio" id="view-world" name="view-world" value="Only Those Allowed">
                                                        <i></i>
                                                       Only Those Allowed
                                                    </label>
                                                <span  class="errors"><?php echo $view_worlderr;?></span>
                                                <label>Who Should Post In Your World</label>
                                      <label class="radio">
                                                        <input type="radio" id="post-world" name="post-world" checked="" value="Public">
                                                        <i></i>
                                                        Public
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" id="post-world" name="post-world" value="Only Me">
                                                        <i></i>
                                                        Only Me
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" id="post-world"  name="post-world" value="Friends">
                                                        <i></i>
                                                       Friends
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" id="post-world" name="post-world" value="Followers">
                                                        <i></i>
                                                       Followers
                                                    </label>
                                                     <label class="radio">
                                                        <input type="radio" id="post-world" name="post-world" value="Only Those Allowed">
                                                        <i></i>
                                                       Only Those Allowed
                                                    </label>
                                                    <span  class="errors"><?php echo $post_viewerr;?></span>
                                                <label>Who Should Comment in Your World</label>
                                        <label class="radio">
                                                        <input type="radio" id="comment-world" name="comment-world" checked="" value="Public">
                                                        <i></i>
                                                        Public
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" id="comment-world" name="comment-world" value="Only Me">
                                                        <i></i>
                                                        Only Me
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" id="comment-world"  name="comment-world" value="Friends">
                                                        <i></i>
                                                       Friends
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" id="comment-world" name="comment-world" value="Followers">
                                                        <i></i>
                                                       Followers
                                                    </label>
                                                    
                                                    <span  class="errors"><?php echo $comment_worlderr;?></span>
                                                <label>Select A Gender To View World</label>
                                       <label class="radio">
                                                        <input type="radio" id="gender-view" name="gender-view" value="Both" checked="">
                                                        <i></i>
                                                        Both
                                                    </label>
                                                   <label class="radio"> 
                                                    <input type="radio" id="gender-view" name="gender-view" value="Male" >
                                                        <i></i>
                                                        Male
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" id="gender-view" name="gender-view" value="Female">
                                                        <i></i>
                                                      Female
                                                    </label>
                                                    <span  class="errors"><?php echo $gender_viewerr;?></span>
                                                </div><br />
                                                <div class="unit">
                                    <label class="input select">
                                   <p> Age criteria to view world</p>
                                        <select class="form-control"   name="age-criteria">
                                            <option value="" >Age criteria</option>
                                            <option value="General">General</option>
                                            <option value="Below 18">Below 18</option>
                                           <option value="Above 18">Above 18</option>
                                            <option value="18-35">18-35</option>
                                            <option value="Above">Above 35</option>
                                            <option value="25-40">25-40</option>
                                            <option value="Above 40">Above 40</option>
                                        </select>
                                      </label>
                                      <span  class="errors"><?php echo $age_criteriaerr;?></span>
                                </div>
                                 
                                        <!-- start link -->
                                        <div class="unit" style="float:right;">
                                            By clicking Create, I agree to our<br>
                                            <a>Terms & Condition</a> and <a>Privacy Policy</a> 
                                        </div><br /><br /><br />
                                        <!-- end link -->
                                        <div class="form-footer" style="float:right;">
								              <button type="submit" class="btn btn-success btn-sms " name="create-world" title="create world">Create</button>
                                   </div><br><br>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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