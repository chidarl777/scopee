<?php
//CODE FOR VIEWING ACCESS CODE
 try{
			$category=$category_w;
			$category_id=$world_id_w;
			
			$sql_acs_code=$dbh->prepare('SELECT *FROM access WHERE username="'.$user_login.'" and category="'.$category.'" and category_id="'.$category_id.'" and removed="NO"');
			$sql_acs_code->execute();
			$num_sql_acs_code=$sql_acs_code->rowCount();
			
			if($num_sql_acs_code>0){
				
				while($fetch_sql_acs_code=$sql_acs_code->fetch(PDO::FETCH_ASSOC)){
					$access_code=$fetch_sql_acs_code['access_code'];
					$access_comment=$fetch_sql_acs_code['comment'];
					
				
					echo '  <div class="col-md-9">
    <div class="recent-users-list">
      <div class="individual-user info-expand">
          <div class="user-intro friend">
              <div class="users-info">
                  <ul>
                      <li class="u-name"><a ><h4>Access code:'.$access_code.'</h4></a></li>
                      <li class="u-name">comment <br /><i>'.$access_comment.'</i></li>
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
                        <span class="errors"></span> 
                        <input type="text" id="search_friend" name="update-access-code-'.$access_code.'" placeholder="Change access code here.." class="form-control" aria-describedby="basic-addon1"/>
                      </div>
                      <div class="form-group input-group">
                        <span class="input-group-addon" id="basic-addon1"> <i class="fa fa-pencil"></i></span>
                        <span class="errors"></span> 
                        <input type="text" id="search_friend" name="update-access-comment-'.$access_code.'" placeholder="Access code comment here.." class="form-control" aria-describedby="basic-addon1"/>
                      </div>
                      <div class="row login-form-footer">
                          <div class="col-md-9"></div>
                          <div class="col-md-3">
                              <input type="submit" class="btn-block btn btn-success" value="Update" name="submit-update-access-code-'.$access_code.'">
                          </div>
                      </div>
                    </form>
                  </li>
                 
              </ul>
          </div>
      </div>
    </div>
  </div> <br>
';
				}
				//script for updating access code
				require('inc/access/update_access_code.inc.php');
			}
			else{
			
				$view_access_codeerr='You have no access code for these world';
			}
		}
	
 catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
?>