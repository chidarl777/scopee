<?php
//CODE FOR GETTING WORLD WITH MOST follow WORLDS

try{
	
	require "inc/db/config.php";
	
	//GETTING WORLD POST
	$sql_wor_post1=$dbh->prepare('SELECT *FROM world_post WHERE REMOVED="NO" ORDER BY ID DESC LIMIT 3 OFFSET 3');
	$sql_wor_post1->execute();
	
	$num_sql_wor_post=$sql_wor_post1->rowCount();
	
	if($num_sql_wor_post>0){
		//require("inc/datetimediff.inc.php");
		while($fetch_sql_wor_post=$sql_wor_post1->fetch(PDO::FETCH_ASSOC)){
			
		$world_id=$fetch_sql_wor_post['WORLD_ID'];
		$post_summary=$fetch_sql_wor_post['POST_SUMMARY'];
		$post_by=$fetch_sql_wor_post['POST_BY'];
		$post_title=$fetch_sql_wor_post['POST_TITLE'];
		$date_posted=$fetch_sql_wor_post['DATE_POSTED'];
		$post_id=$fetch_sql_wor_post['ID'];
		
		
		
		$get_time=datetimediff(date('Y-m-d H:i:s'),$date_posted);
		
		//GETTING WORLD DETAILS
		$sql_wor=$dbh->prepare('SELECT *FROM worlds_tbl WHERE ID="'.$world_id.'" AND REMOVED="NO"');
		$sql_wor->execute();
		
		$num_sql_wor=$sql_wor->rowCount();
		
			$fetch_sql_wor=$sql_wor->fetch(PDO::FETCH_ASSOC);
			$world_name=$fetch_sql_wor['WORLD_NAME'];
			$world_address=$fetch_sql_wor['WORLD_ADRESS'];
			$world_pic_us=$fetch_sql_wor['WORLD_BACKGROUND_PIC'];
			 	$world_profile_pic1=$fetch_sql_wor['WORLD_PROFILE_PIC'];
	 	
	 	//CHECKING IF THE USER HAS UPLOADED ANY PROFILE PIC
			 if(empty($world_profile_pic1)){
			 	$world_pic_u="image/default-pic/images_012.jpg";
			 }
			 else{
			 	$world_pic_u="user_data/world_photos/$world_profile_pic1";
			 }
			
			$world_post1='        <div class="col-md-4 col-sm-4">
            <div class="col-md-12 col-sm-12 widget-wrap">
                <div class="widget-header block-header margin-bottom-0 clearfix">
                    <div class="pull-left">
                        <h2><a href="">'.$post_title.'</a></h2>
                        <!-- <p>All comments are posted by users</p> -->
                    </div>
                </div>
                <div class="widget-container margin-top-0">
                    <div class="widget-content">
                        <div class="recent-comments-list">
                            <div class="recent-comments">
                                <div class="recent-comment-meta">
                                    <div class="comment-user-thumb">
                                        <a href=""><img src="'.$world_pic_u.'" alt="user"></a>
                                    </div>
                                    <div class="comment-user-info">
                                        <ul>
                                            <li class="u-name"><a href="">@'.$world_name.'</a></li>
                                            <li class="p-time"><i class="fa fa-clock-o"></i> '.$date_posted.'</li>
                                        </ul>
                                    </div>
                                    <span class="comments-reply"><a href=""><i class="fa fa-comment"></i></a></span>
                                </div>
                                <div class="comment-text">
                                    <p>'.$post_summary.'</p>
                                </div>
                            </div>
                            <a href="readmore.php?wor='.$world_address.'&pid='.$post_id.'&title='.$post_title.'"><button class="btn btn-link btn-block btn-loadmore">Load More</button></a>
                        </div>
                    </div>
                </div>
            </div>        
        </div>';
			
		echo $world_post1;
	}
	}
	}
	catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
?>