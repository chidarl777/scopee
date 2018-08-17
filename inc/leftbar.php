<!--Leftbar Start Here-->
<aside class="leftbar">
  <div class="left-aside-container">
      <div class="user-profile-container">
          <div class="user-profile clearfix">
              <div class="admin-user-thumb" >
                  <center><img src="<?php echo $profile_pic1;?>" alt="admin"></center>
              </div>
              <div class="admin-user-info">
                  <ul>
                      <li><a ><?php echo $user_firstname." ".$user_othername;?></a></li>
                  </ul>
              </div>
          </div>
          <!--========= this part is for profile pic & nut =========== -->
           <div class="alert alert-success" role="alert" style="border-radius:0px;">
                  <div class="admin-user-info" style=" margin-bottom: 10px;">
                        <p>welcome <?php echo $user_firstname." ".$user_othername;?></p>
                        <p></p>
                  </div>
                  <strong>Peecoin:</strong> <?php echo $user_peecoin;?> 
                  
                  <?php if($user_login=='scopeejs001'){
				  	
				  
                  echo $admin_home; 
                  }
                 
                  ?>
                  
            </div>

            <!-- ================================================================== -->
         <div class="admin-bar">
        <a href="home.php?ref=<?php echo $user_login_userid;?>" class="ref-code btn btn-success " data-toggle="modal" data-target="#jModal">GENERATE REFERRAL LINK</a>
              <ul>
                  <li><a ><i class="fa fa-facebook "></i>
                  </a>
                  </li>
                  <li><a ><i class="fa fa-twitter "></i>
                  </a>
                  </li>
                  <li><a ><i class="fa fa-linkedin "></i>
                  </a>
                  </li>
                  <li><a ><i class="fa fa-google-plus "></i>
                  </a>
                  </li>
              </ul>
          </div>
      </div>
      <ul class="list-accordion tree-style">
          <li class="list-title">Profile</li>
          <li>
              <a><i class="fa fa-user"></i><span class="list-label">Profile</span></a>
              <ul>
              
                  <li><a href="profile.php?u=<?php echo $user_login_id; ?>">Edit profile</a></li>
                 <a href="profile.php?u=<?php echo $user_login_id; ?>">more</a>
              </ul>
          </li>
          <li class="list-title">Dashboard</li>
          <li>
              <a ><i class="fa fa-dashboard"></i><span class="list-label">Dashboard</span></a>
              <ul>
             		 
                  <li><a ><i class="fa fa-institution "></i>bank</a></li>
                  <li><a href="analytics.php" ><i class="fa fa-delicious   "></i>analytic</a></li>
                  <a >more</a>
              </ul>
          </li>
          <li>
              <a ><i class="fa fa-globe"></i><span class="list-label">world</span></a>
              <ul>
                  <li><a href="createworld.php">create world</a></li>
                  <?php require("inc/world/userlogin.total.world.inc.php");?>
                  <a href="moreworlds.php?u=<?php echo $user_login_id; ?>">more</a>
              </ul>
          </li>
          <li>
              <a ><i class="fa fa-gear "></i><span class="list-label">settings</span></a>
              <ul>
                  <li><a href="settings.php">Account</a></li>
                  <li><a href="settings.php">Privacy</a></li>
                  <li><a href="settings.php">World</a></li>
                  
                  <a href="settings.php">more</a>

              </ul>
          </li>
          
          <li class="list-title">Close Account</li>
          <li>
              <a href="logout.php"><i class="fa fa- fa fa--view-dashboard"></i><span class="list-label">Logout</span></a>
          </li>
      </ul>
  </div>
</aside>
    <div class="modalBox1">

  <!-- Modal -->
  <div class="modal"  id="jModal">
    <div class="modal-dialog">
      <div class="modal-cont">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Refferal Code</h4>
        </div>
        <div class="modal-body">
        copy and paste this link in your website or the place you want it to appear.
        <p>
        <center>
        <textarea style="width:80%; height:50px;"><a href="www.scopee.in/ref/<?php echo $user_login_userid; ?>">Scopee.in</a></textarea>
       </center>
        </p>
        <div style="color:#ff0000;"> Note: when an invite friend button is clicked, your refferal code is automatically placed in the invite friend link.</div>
        </div>
        <div class="modal-footer">
          <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  </div>
 
<style>

.modalBox{
	padding:;
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
.modal-footer{
	color: #ffffff;
}
.model-body{
	width:100px;;
	height: 100px;;
	margin:10px;
	}
</style>

<!--Leftbar End Here-->