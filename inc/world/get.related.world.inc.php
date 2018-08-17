<?php
//CODE FOR SELECTING USERS WORLDS
//require("inc/check.php");
$related_w_creator="";
$related_w_description="";
$related_w_adress="";
$related_w_id="";
 $get_related_world="";
try{
	$w_post_id=$post_id;
	require("inc/db/config.php");
	$get_world_post=$dbh->prepare('SELECT *FROM worlds_tbl WHERE WORLD_CATEGORY="'.$world_category.'" AND REMOVED="NO" LIMIT 5');
	$get_world_post->execute();
	$num_row=$get_world_post->rowCount();

	if($num_row>0){
		while($result3=$get_world_post->fetch(PDO::FETCH_ASSOC)){
			
		
		$related_w_creator=$result3["CREATED_BY"];
		$related_w_adress=$result3["WORLD_ADRESS"];
		$related_w_id=$result3['ID'];
		$related_w_description=$result3["WORLD_DESCRIPTION"];
		$related_w_background_pic=$result3["WORLD_BACKGROUND_PIC"];
	 $related_w_name=$result3["WORLD_NAME"];
	 $related_w_adress=$result3["WORLD_ADRESS"];
	 	$world_profile_pic1=$result3['WORLD_PROFILE_PIC'];
	 	
	 	//CHECKING IF THE USER HAS UPLOADED ANY PROFILE PIC
			 if(empty($world_profile_pic1)){
			 	$world_pic_u="image/default-pic/images_012.jpg";
			 }
			 else{
			 	$world_pic_u="user_data/world_photos/$world_profile_pic1";
			 }
	if($world_id==$related_w_id){
		//do nothing
	}
	else{
	
				 	//GETTING USERS INFO FROM THE USER TABLE
$sql1='SELECT *FROM users WHERE USERNAME="'.$related_w_creator.'"';
$stmt1=$dbh->prepare($sql1);
$stmt1->execute();
$get_info=$stmt1->fetch(PDO::FETCH_ASSOC);
$first_name_rw=$get_info["FIRST_NAME"];
$other_name_rw=$get_info["OTHER_NAME"];
		if(empty($related_w_background_pic)){
			 	$profile_pic2="img/k1.jpg";
			 }
			 else{
			 	$profile_pic2="user_data/profile_pic/$related_w_background_pic";
			 }
		
			
	          $get_related_world='<div class="row widget-wrap">
              <a href="world.php?wor='.$related_w_adress.'">
                <div class="widget-header block-header margin-bottom-0 clearfix">
                
                    <div class="pull-left">
                      <div class="comment-user-thumb">
                                       <a ><img style="width:80px; height:80px; border-radius:10px;" src="'.$world_pic_u.'" alt="world"></a>  &nbsp;&nbsp;&nbsp;<h2 style="float:right;margin-top:5px;"><a >'.$related_w_name.'</a></h2>
                                    </div>
                      
                        <!-- <p>All comments are posted by users</p> -->
                    </div>
                </div></a>
                  <a href="world.php?wor='.$related_w_adress.'">
                <div class="widget-container margin-top-0">
                    <div class="widget-content">
                        <div class="recent-comments-list">
                            <div class="recent-comments">
                                <div class="recent-comment-meta">
                                  
    

                                </div>
                                <div class="comment-text">
                                    <p>'.$related_w_description.'</p>
                                </div>
                            </div>
                            </a>
                              <a href="world.php?wor='.$related_w_adress.'"><button class="btn btn-link btn-block btn-loadmore">Load More</button></a>
                        </div>
                    </div>
                </div>        
            </div><br/>';
            
           echo $get_related_world;
	
	}
 }
	}
	else{
		echo "No related world at the moment";
		//do nothing......
	}
} 		
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
?>