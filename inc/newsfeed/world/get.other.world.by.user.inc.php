<?php
//CODE FOR SELECTING USERS WORLDS
//require("inc/check.php");
$other_w_creator="";
$other_w_description="";
$other_w_adress="";
$other_w_id="";
 $get_other_world="";
try{
	$w_post_id=$post_id;
	require("inc/db/config.php");
	$get_world_post=$dbh->prepare('SELECT *FROM worlds_tbl WHERE CREATED_BY="'.$world_creator.'" AND REMOVED="NO" LIMIT 2');
	$get_world_post->execute();
	$num_row=$get_world_post->rowCount();

	if($num_row>0){
		while($result3=$get_world_post->fetch(PDO::FETCH_ASSOC)){
			
		
		$other_w_creator=$result3["CREATED_BY"];
		$other_w_adress=$result3["WORLD_ADRESS"];
		$other_w_id=$result3['ID'];
		$other_w_description=$result3["WORLD_DESCRIPTION"];
		$other_w_background_pic=$result3["WORLD_BACKGROUND_PIC"];
	 $other_w_name=$result3["WORLD_NAME"];
	 $other_w_adress=$result3["WORLD_ADRESS"];
	
				 	//GETTING USERS INFO FROM THE USER TABLE
$sql1='SELECT *FROM users WHERE USERNAME="'.$other_w_creator.'"';
$stmt1=$dbh->prepare($sql1);
$stmt1->execute();
$get_info=$stmt1->fetch(PDO::FETCH_ASSOC);
$first_name_rw=$get_info["FIRST_NAME"];
$other_name_rw=$get_info["OTHER_NAME"];
		if(empty($other_w_background_pic)){
			 	$profile_pic2="img/k1.jpg";
			 }
			 else{
			 	$profile_pic2="user_data/profile_pic/$other_w_background_pic";
			 }
			
			 if($world_id==$other_w_id)	{
			 	//do nothing
			 }
			else{
				
			
	          $get_other_world='
   <div class="col-md-6">
        <div class="col-md-12 widget-wrap">
                <div class="widget-header block-header margin-bottom-0 clearfix">
                    <div class="pull-left">
                                         <div class="comment-user-thumb">
                                        <a ><img style="height:80px;width:80px; border-radius:10px;" src="'.$profile_pic2.'" alt="world"></a>  &nbsp;&nbsp;&nbsp;<h2 style="float:right;margin-top:5px;"><a >'.$other_w_name.'</a></h2>
                                    </div>
                    </div>
                </div>
                <div class="widget-container margin-top-0">
                    <div class="widget-content">
                        <div class="recent-comments-list">
                            <div class="recent-comments">
                                <div class="recent-comment-meta">
                                 
                                    <div class="comment-user-info">
  
                                    </div>
 
                                </div>
                                <div class="comment-text">
                                    <p>'.$other_w_description.'</p>
                                </div>
                            </div>
                            <a href="world.php?wor='.$other_w_adress.'"><button class="btn btn-link btn-block btn-loadmore">Load More</button></a>
                        </div>
                    </div>
                </div>
                </div>        
            </div>
            ';
            echo $get_other_world;
}
}
	}
	else{
		echo "";
		//do nothing......
	}
} 		
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
?>