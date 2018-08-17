<?php require("aut_session.php"); ?>
<!doctype html>
<html>
<head>
  <meta>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <title>scopee</title>
  <link type="text/css" rel="stylesheet" href="cssa/font-awesome.css">
  <link type="text/css" rel="stylesheet" href="css/mystyle.css">
  <link type="text/css" rel="stylesheet" href="css/style.css">
  <link type="text/css" rel="stylesheet" href="css/material-design-iconic-font.css">
  <link type="text/css" rel="stylesheet" href="css/bootstrap.css">
  <link type="text/css" rel="stylesheet" href="css/animate.css">
  <link type="text/css" rel="stylesheet" href="cssa/layout.css">
  <link type="text/css" rel="stylesheet" href="css/components.css">
  <link type="text/css" rel="stylesheet" href="css/widgets.css">
  <link type="text/css" rel="stylesheet" href="css/plugins.css">
  <link type="text/css" rel="stylesheet" href="css/pages.css">
  <link type="text/css" rel="stylesheet" href="css/bootstrap-extend.css">
  <link type="text/css" rel="stylesheet" href="css/common.css">
  <link type="text/css" rel="stylesheet" href="css/responsive.css">
  <link type="text/css" id="themes" rel="stylesheet" href="">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body class="leftbar-view">

<?php require("inc/header.php"); ?>
<?php require("inc/leftbar.php");?>
<?php require("inc/conversation.inc.php"); ?>
<!--Page Container Start Here-->
<section class="main-container">
<div class="row">
<div class="col-md-12" >
<div class="col-md-8">
<!-- edit here -->
<div class="widget-wrap friend account-settings"><a><h1>ACCOUNT</h1></a></div>

<div class="widget-wrap pagination user-account"style="display: none;" >
<div class="widget-header block-header margin-bottom-0 clearfix">
    <input type="button" style="float:right; margin-right: 5px; border:none;" class="brn btn-success account-hide" value="hide" />
    <div class="pull-left friend account-settings">

      <h2>Account and Language Settngs</h2>
    </div>
</div>
  <div class="col-md-12 " >
    <div class="recent-users-list">
      <div class="individual-user info-expand">
          <div class="user-intro friend">
              <div class="users-info">
                  <ul>
                      <li class="u-name"><a ><h4>Username: <?php echo $user_login ?> </h4></a></li>
                  </ul>
              </div>
              <!-- this is for the toggle icon -->
              <span class="user-details-toggle"><i class="fa fa-key">&nbsp;</i></span>
          </div>
         
      </div>
    </div>
  </div>
  <?php require("inc/settings/change.name.inc.php");?>
<div class="row">
  <div class="col-md-12">
    <div class="recent-users-list">
      <div class="individual-user info-expand">
          <div class="user-intro friend">
          
              <div class="users-info">
                  <ul>
                      <li class="u-name"><a ><h4>First Name:<?php echo$user_firstname; ?></h4></a></li>
                  </ul>
              </div>
              <!-- this is for the toggle icon -->
              <span class="user-details-toggle"><i class="fa fa-align-justify ">Edit</i></span>
          </div>
          <div class="users-details">
              <ul>
                  <li>
                    <form action="" method="POST" >
                      <div class="form-group input-group">
                        <span class="input-group-addon" id="basic-addon1"> <i class="fa fa-pencil"></i></span>
                       <span class="errors"><?php echo $Firstnameerr ?></span> 
                        <input type="text" id="change_name" name="edit-firstname" placeholder='first name' class="form-control" aria-describedby="basic-addon1"/>
                      </div>
                      <div class="row login-form-footer">
                          <div class="col-md-9"></div>
                          <div class="col-md-3">
                              <input type="submit" class="btn-block btn btn-success" value="Update" name="update-firstname">
                          </div>
                      </div>
                    </form>

                  </li>
                  <!-- <li><label>Company:</label> Olympic Sports</li>
                  <li><label>Plan:</label> <label class="label label-success">Platinum</label> </li> -->
              </ul>
          </div>
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="recent-users-list">
      <div class="individual-user info-expand">
          <div class="user-intro friend">
              <div class="users-info">
                  <ul>
                      <li class="u-name"><a ><h4>Other Name:<?php echo $user_othername ?></h4></a></li>
                  </ul>
              </div>
              <!-- this is for the toggle icon -->
              <span class="user-details-toggle"><i class="fa fa-align-justify ">Edit</i></span>
          </div>
          <div class="users-details">
              <ul>
                  <li>
                    <form action="" method="POST">
                      <div class="form-group input-group">
                        <span class="input-group-addon" id="basic-addon1"> <i class="fa fa-pencil"></i></span>
                        <span class="errors"><?php echo $othernameerr ?></span> 
                        <input type="text" id="search_friend" name="edit-othernames" placeholder='other names' class="form-control" aria-describedby="basic-addon1"/>
                      </div>
                      <div class="row login-form-footer">
                          <div class="col-md-9"></div>
                          <div class="col-md-3">
                              <input type="submit" class="btn-block btn btn-success" value="Update" name="update-othernames">
                          </div>
                      </div>
                    </form>
                  </li>
                  <!-- <li><label>Company:</label> Olympic Sports</li>
                  <li><label>Plan:</label> <label class="label label-success">Platinum</label> </li> -->
              </ul>
          </div>
      </div>
    </div>
  </div>

  <div class="col-md-12">
    <div class="recent-users-list">
      <div class="individual-user info-expand">
          <div class="user-intro friend">
              
                                     <h3> <input type="button" style="border:0px; background:none;font-weight: bold; color:#4aca54; margin:10px; " id="change-password" value="Change password"/></h3>
                    <div class="apas_panel " style=" display: none;">
                    <form action="" method="post" id="panel1">
                    <?php require("inc/settings/change.pass.inc.php"); ?>
	
	<div id="change_password_panel">
	<label>Old Password</label><br>
	 <div class="form-group input-group">
	   
                        <span class="input-group-addon" id="basic-addon1"> <i class="fa fa-key"></i></span>
                        <span class="errors"><?php echo $Passworderr; ?></span>
                        <input type="text" id="sf" name="old-pass" placeholder='subject' class="form-control" aria-describedby="basic-addon1"/>
                      </div>
	<label>New Password</label><br>
	<div class="form-group input-group">
	 
                        <span class="input-group-addon" id="basic-addon1"> <i class="fa fa-key"></i></span>
                       <span class="errors"><?php echo $newPassworderr; ?></span>  
                        <input type="text" id="sea" name="new-pass" placeholder='subject' class="form-control" aria-describedby="basic-addon1"/>
                      </div>
	<label>Confirm Password</label><br>
<div class="form-group input-group">
 
                        <span class="input-group-addon" id="basic-addon1"> <i class="fa fa-key"></i></span>
                         <span class="errors "><?php echo $Confirm_passworderr; ?></span>
                        <input type="text" id="sd" name="comfirm-pass" placeholder='subject' class="form-control" aria-describedby="basic-addon1"/>
                      </div>
	<div class="row login-form-footer">
                          <div class="col-md-9"></div>
                          <div class="col-md-3">
                              <input type="submit" class="btn-block btn btn-success" value="Update" name="update-pass">
                          </div>
                      </div>
	</div>
</form>
  </div>
                  <!-- <li><label>Company:</label> Olympic Sports</li>
                  <li><label>Plan:</label> <label class="label label-success">Platinum</label> </li> -->
              </ul>
          </div>
      </div>
    </div>
  </div>

</div>

</div>
<!--edit privacy start here -->
<div class="widget-wrap friend privacy-settings"><a><h1>PRIVACY</h1></a></div>
                <div class="widget-wrap users-privacy" style="display: none;">
                    <div class="widget-header block-header margin-bottom-0 clearfix">
                        <input type="button" style="float:right; margin-right: 5px; border:none;" class="brn btn-success privacy-hide" value="hide" />
                        <div class="pull-left">
                            <h3>Privacy</h3>

                        </div>
                        <div class="pull-right w-action">
                           
                        </div>
                    </div>
                    <div class="widget-container">
                        <div class="widget-content">
                            <div class="row">
                            <form action="" class="j-forms" method="POST">
<?php require("inc/settings/edit.account.privacy.inc.php");?>
                                <div class="col-md-12">
                                    
                                        <div class="form-content">

                                        <!-- start widget buttons 50 -->
                                        <label>Who Should View Your Profile</label>
                                       <label class="radio">
                                                        <input type="radio" id="view-profile" name="view-profile" checked="" value="Public">
                                                        <i></i>
                                                        Public
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" id="view-profile" name="view-profile" value="Only Me">
                                                        <i></i>
                                                        Only Me
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" id="view-profile"  name="view-profile" value="Friends">
                                                        <i></i>
                                                       Friends
                                                    </label>
                                                       <p><span class="errors"><?php echo $view_profileerr; ?></span></p>
                                                <label>Who Should View Your Post</label>
                                      <label class="radio">
                                                        <input type="radio" id="post-world" name="post-view" checked="" value="Public">
                                                        <i></i>
                                                        Public
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" id="post-view" name="post-world" value="Only Me">
                                                        <i></i>
                                                        Only Me
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" id="post-view"  name="post-world" value="Friends">
                                                        <i></i>
                                                       Friends
                                                    </label>

                                                </div>
                                                <p><span class="errors"><?php echo $post_viewerr ?></span></p>

                                        <div class="form-footer" style="float:right;">
								              <input type="submit" class="btn btn-success btn-sms " name="update-privacy" value="Update" title="update privacy" />
                                   </div><br><br>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
<!-- edit privacy ends here-->
<!--edit world start here -->
<div class="widget-wrap friend world-settings"><a><h1>WORLD</h1></a></div>
                <div class="widget-wrap users-world" style="display: none;">
                <form method="post">
                
                    <div class="widget-header block-header margin-bottom-0 clearfix">
                        <input type="button" style="float:right; margin-right: 5px; border:none;" class="brn btn-success world-hide" value="hide" />
                        <div class="pull-left">
                            <h3>World</h3>
                            
                            <label style="color:#ff0000;">Note:You will have to complete the settings below!!!</label>
                            <p>Choose world to apply the following settings</p>
                                                <div class="unit">
                                    <label class="input select">
                                    
                                        <select class="form-control"   name="world-edit">
                                            <option value="" >Choose world</option>
                                           <?php require("inc/settings/get_user_world.inc.php");?>
                                        </select>
                                         <span style="color:#ff0000;"><?php echo $num_worlderr;?></span>
                                      </label>
                                       <?php require("inc/settings/edit_world.php");?>
                                       <p><span class="errors"><?php echo $world_editerr ?></span></p>
                                </div>
                                
                                <p>World name</p>
                                 <div class="form-group input-group">
                                 
                        <span class="input-group-addon" id="basic-addon1"> <i class="fa fa-pencil"></i></span>
                       
                        <input type="text" id="search_friend" name="world-name" placeholder='world name' class="form-control" aria-describedby="basic-addon1"/>
                        <p> <span class="errors"><?php echo $world_nameerr ?></span></p> 
                      </div>
                      <div class="row login-form-footer">
                          <div class="col-md-9"></div>

                      </div>
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
                                                        <input type="radio" id="view-world" name="view-world" value="Does added by me">
                                                        <i></i>
                                                       Does Added By Me
                                                    </label>
                           <span class="errors"><?php echo $view_worlderr ?></span><br>             
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
                                                        <input type="radio" id="post-world" name="post-world" value="Does added by me">
                                                        <i></i>
                                                       Does Added By Me
                                                    </label>
                                                    <span class="errors"><?php echo $post_worlderr ?></span><br>
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
                                                        <input type="radio" id="comment-world" name="comment-world" value="Does added by me">
                                                        <i></i>
                                                       Does Added By Me
                                                    </label>
                                                    <span class="errors"><?php echo $comment_worlderr ?></span><br> 
                                                <label>Select A Gender To View World</label>
                                       <label class="radio">
                                                        <input type="radio" id="gender-view" name="gender-view" value="Both" checked>
                                                        <i></i>
                                                        Both
                                                    </label>
                                                   <label class="radio"> 
                                                    <input type="radio" id="gender-view" name="gender-view" value="Male" checked="">
                                                        <i></i>
                                                        Male
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" id="gender-view" name="gender-view" value="Female" checked="">
                                                        <i></i>
                                                      Female
                                                    </label>
                                                </div><br />
                                                <span class="errors"><?php echo $gender_viewerr ?></span><br> 
                                                <div class="unit">
                                    <label class="input select">
                                    <label>Age criteria</label>
                                        <select class="form-control"   name="age-criteria">
                                            <option value="" >Age criteria</option>
                                            <option value="General">General</option>
                                            <option value="Below 18">Below 18</option>
                                            <option value="18-35">18-35</option>
                                            <option value="Above 18">Above 18</option>
                                            <option value="Above">Above 35</option>
                                            <option value="25-40">25-40</option>
                                            <option value="Above 40">Above 40</option>
                                        </select>
                                      </label><br>
                                      <span class="errors"><?php echo $age_criteriaerr ?></span><br> 
                                </div>
                                 

                                        <div class="form-footer" style="float:right;">
								              <button type="submit" class="btn btn-success btn-sms " name="update-world" title="update world">Update</button>
                                   </div><br><br>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
<!-- edit world ends here-->
</div>

</div>
</div>
</div>
<?php require("inc/footer.inc.php");?>
</section>
<!--Page Container End Here-->

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
<script src="js/class.function/get.set.form.js"></script>
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