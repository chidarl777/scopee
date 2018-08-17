<?php


try{
	

	 	//CHECKING IF THE VIEWER IS PERMITED TO VIEW THE WORLD BY THE CREATOR
	 	if($user_login != $world_creator){
	
	 	if($world_view=="Only me"){
			if($user_login != $world_creator){
			    header("location:home.php");
			}
		}
		elseif($world_view=="Friends"){
			if($user_login != $world_creator){
				$sql3='SELECT *FROM friends_tbl WHERE SENT_FROM="'.$user_login.'" AND REMOVED="NO"  OR  SENT_TO="'.$user_login.'" AND REMOVED="NO"';
$stmt=$dbh->prepare($sql3);
$stmt->execute();
$num_row=$stmt->rowCount();
if($num_row<1){
	//echo"YOU HAVE NO FRIENDS AT THE MOMENT";
}
else{
	

while($get_result=$stmt->fetch(PDO::FETCH_ASSOC)){

$sent_to=$get_result['SENT_TO'];
$sent_from=$get_result['SENT_FROM'];
//CHECKING IF $USER LOGGED IN IS SENT TO OR SENT FROM IN THE FRIEND TABLE
if($sent_to==$user_login){
	$users_friends=$sent_from;
}
else{
	$users_friends=$sent_to;
}
			}
		//CHECKING IF THE VIEWER IS A FREIND OF A CREATOR
	
		
		if($users_friends != $user_login){
			
			$a_msg="
			<script type='text/javascript'>
				alert('Sorry Permission Is Need To View World');
			</script>
			";
			echo $a_msg;
		}
		}
		}
		}
elseif($world_view=="Followers"){
			if($user_login!=$world_creator){
					//CHECKING IF THE USER HAS IS A FOLLOWER THE WORLD
		$sqlfollower=$dbh->prepare('SELECT *FROM follow_worlds WHERE FOLLOWER="'.$user_login.'" AND FOLLOWED="YES" AND WORLD_ADRESS="'.$world_adress.'"  AND WORLD_ID="'.$world_id.'" AND UNFOLLOWED="NO"');
		$sql->execute();
		$num_follower=$sqlfollower->rowCount();
		if($num_follower!=1){
			$a_msg="<script type='text/javascript'>
				alert('Sorry Permission Is Need To View World');
			</script>";
			echo $a_msg;
			header("location:home.php");
		}
			}
		}
elseif($world_view=="Public"){
			//ALLOW ALL USERS
		}
elseif($world_view=="Only Those Allowed"){
	
	if($user_login != $world_creator){
		
	//check if the world_creator created access code
	$sql_access=$dbh->prepare('SELECT *FROM access WHERE username="'.$world_creator.'" and removed="no"');
	$sql_access->execute();
	$num_sql_access=$sql_access->rowCount();
	
	if($num_sql_access >0){
		//pop out model for access code
		require("inc/access/verify_access_code.inc.php");
		if(isset($_GET['acs'])){
			//do not show model
		}
		else{
			
		
		echo ' <div class="modalBox"  >

  <!-- Modal -->
  <form action="" method="POST" >
  <div class="modal"  id="avMD">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Access Code Verification</h4>
        </div>
        <div class="modal-body">
   <label>Input Access Code To View World</label><br>
   
                      <div class="form-group input-group">
                        <span class="input-group-addon" id="basic-addon1"> <i class="fa fa-pencil"></i></span>
                       <span class="errors">'.$access_codeerr.'</span> 
                        <input type="text" id="change_name" name="world-view-access-code" placeholder="Input Access Code" class="form-control" aria-describedby="basic-addon1"/>
                      </div>
                      
                  
        </div>
        <div class="modal-footer">
           <!-- start btn -->
                                <div class="form-footer " style="float:right;width:100%; margin-top:15px;">
                                 <div class="row login-form-footer">
                          <div class="col-md-9"></div>
                          <div class="col-md-3">
                          
                              <input type="submit" class="btn-block btn btn-success" value="Verify" name="verify-access-code">
                          </div>
                      </div>
                                 
                              </div>
                              <!-- end of post btn -->
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
    </form>
  </div> ';
 

		}
	}
	else{
		echo"<script>
		alert('Permission needed to view this world.');
		</script>";
		
		echo '<div style="color:#ed4f12; font-size:17px; text-align:center;">Permission is needed to view this world.</div>';
		die();
	}
	}
}
	else{
		header("location:home.php");
	}
		}
		}
		
		catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
		
?>