
<!--Topbar Start Here-->
<script src="js/lib2/get.msg.js"></script>
<header class="topbar clearfix" style="background-color:#0db30d;">
  <!--Top Search Bar Start Here-->
  <div class="top-search-bar">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-6 col-md-offset-3">
                  <div class="search-input-addon">
                      <span class="addon-icon"><i class="fa fa- fa fa-search"></i></span>
                      <input type="text" class="form-control top-search-input" placeholder="Search">
                  </div>
              </div>
          </div>
      </div>
  </div>
  <style>
  	.responcive-text{
		color:#ffffff;
	}
  </style>
  <!--Top Search Bar End Here-->
  <!--Topbar Left Branding With Logo Start-->
  <div class="topbar-left pull-left">
      <div class="clearfix">
     
                           &nbsp;&nbsp; <div class="dropdown  " role="menu"  style=" display:inline-block; top:12px;">
                                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            Category
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu " aria-labelledby="dropdownMenu1" style="height: 400px; overflow-x: hidden;">
              <?php require("inc/world/world_category.inc.php"); ?>
                                </ul>
                           
                        </div>
                       
          <ul class="left-branding pull-left clickablemen ttmenu dark-style menu-color-gradient">
              <li><span class="left-toggle-switch"><i class="fa fa-align-justify "></i></span></li>
              <li>
                  <div class="logo">
                      <a title="logo"><img src="image/logo-img/scopee_logo.png" alt="logo" width="60px;" height="60px;"></a>
                  </div>
              </li>
          </ul>
          <!--Mobile Search and Rightbar Toggle-->
          <ul class="branding-right pull-right">
              <li><a  class="btn-mobile-search btn-top-search"><i class="fa fa- fa fa-search"></i></a></li>
              <li><a  class="btn-mobile-bar"><i class="fa fa- fa fa-menu">menu</i></a></li>&nbsp;&nbsp;
          </ul>
      </div>
  </div>
  <!--Topbar Left Branding With Logo End-->
  <!--Topbar Right Start-->
  <div class="topbar-right pull-right">
      <div class="clearfix">
          <!--Mobile View Leftbar Toggle-->
          <ul class="left-bar-switch pull-left">
             <li><span class="left-toggle-switch"><i class="fa fa-align-justify "></i></span></li>
          </ul>
          <ul class="pull-right top-right-icons">
              <li class="dropdown apps-dropdown">
                  <a href="home.php" class="btn-apps responcive-text dropdown-toggle" title="Home" ><i class="fa fa- fa-home"></i></a>
              </li>
     <li class="dropdown apps-dropdown">
                  <a href="friends.php" class="btn-apps dropdown-toggle" title="friends/find friends"><span class="noty-bubble"><?php require('inc/friends/num_friend_request.inc.php') ?></span><i class="fa fa-users"></i></a>
              </li>
 
 <?php require('inc/notification/num_notification.php'); ?>
              <li class="dropdown notifications-dropdown">
              
                  <a  class="btn-notification dropdown-toggle"title="messages/notification" data-toggle="dropdown"><span class="noty-bubble"><?php echo $global_num_notification; ?></span><i class="fa fa-globe"></i></a>
                  <div class="dropdown-menu notifications-tabs">
                      <div>
                          <ul class="nav material-tabs nav-tabs" role="tablist">
                              <li class="active"><a href="#message" aria-controls="message" role="tab" data-toggle="tab">Message</a></li>
                              <li><a href="#notifications" aria-controls="notifications" role="tab" data-toggle="tab">Notifications</a></li>
                          </ul>
                          <div class="tab-content">
                              <div role="tabpanel" class="tab-pane active" id="message">
                                  <div class="message-list-container">
                                      <h4><?php echo $num_s_msg; ?></h4>
                                      <ul class="clearfix g-message" >
                                        <?php require('inc/msg/view_msg.php'); ?>
                                   
                                      </ul>
                                      <a class="btn btn-link btn-block btn-view-all" href="home.php?msgl=<?php echo $offset; ?>" ><span>View All</span></a>
                                  </div>
                              </div>
                               <div role="tabpanel" class="tab-pane" id="notifications">
                                  <div class="notification-wrap">
                                      <h4><?php echo $num_s_notification; ?></h4>
                                      <ul>
                                       <?php require('inc/notification/get_notification.php');?>  
                                      <!--your notification here-->
                                      </ul>
                                      <a class="btn btn-link btn-block btn-view-all clearfix"  href="home.php?ntf=<?php echo $offset_ntf; ?>" ><span>View All</span></a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </li>
              <li><a  class="right-toggle-switch" title="chat" onclick="getchat();"><i class="fa fa-comment "></i><span class="more-noty"></span></a></li>
          </ul>
      </div>
  </div>
  <!--Topbar Right End-->
</header>
<!--Topbar End Here-->
<?php
$_SESSION['date_active']=date("Y-m-d H:i:s");
?>
<style>
	#chat-user-avatar img{
		width: 50px;
		height: 50px;
	}
</style>


