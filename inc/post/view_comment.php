<?php
//require("../aut_session.inc.php");
//require("get_post.php");
$comment_id="";

try{
//view comment scripts
require_once("inc/db/config.php");
//$commented_to=$posted_from;
//$id=$post_id;
//echo $post_id_h;
$sql='SELECT *FROM comments WHERE POST_ID="'.$post_id_h.'" AND REMOVED="NO" LIMIT '.$loadmore.'';
$result=$dbh->prepare($sql);
$result->execute();

//counting the nunber of rows returned
$get_row=$result->rowCount();
//echo $get_row;

if($get_row>0){
	 if($get_row>5){
			 	$loadmore=' <div class="widget-container margin-top-0">
          <div class="widget-content">
              <div class="activities-container">
               <a href="post.php?loadmore='.$loadmore.'"><button class="btn btn-link btn-block btn-loadmore">Loadmore</button></a>
              </div>';
			 }
while($get_col=$result->fetch(PDO::FETCH_ASSOC)){
	
$comment_id=$get_col['ID'];
$comment_by=$get_col["COMMENTED_FROM"];
$comment1=$get_col['COMMENT'];
$date=$get_col['DATE_COMMENTED'];

//getting users info
$get_data=$dbh->prepare('SELECT ID,PROFILE_PIC,FIRST_NAME,OTHER_NAME FROM users WHERE USERNAME="'.$comment_by.'"');
			$get_data->execute();
			$get_info=$get_data->fetch(PDO::FETCH_ASSOC);
			
			$profile_pic=$get_info["PROFILE_PIC"];
			$first_name=$get_info['FIRST_NAME'];
			$other_names=$get_info['OTHER_NAME'];
			$idc=$get_info['ID'];
//displaying commment
if(empty($profile_pic)){
			 	$profile_pic3="image/default-pic/images_012.jpg";
			 }
			 else{
			 	$profile_pic3="user_data/user_photo/".$profile_pic;
			 }
			 //CHECKING THE CHARACTER IN THE COMMENT IF IT IS MORE THAN 150
			  if(strlen($comment1)>100){
$comment=substr($comment1,0 ,100)."...."."<a href='#'>more</a>";
 }
else{
 $comment=$comment1;
 }
 //CHECKING IF NUMBER OF COMMENT IS GREATER THAN 10
 /*if($get_row==10){
		$loadmore=' <div class="widget-container margin-top-0">
          <div class="widget-content">
              <div class="activities-container">
                <button class="btn btn-link btn-block btn-loadmore">Load More</button>
              </div>
          </div>
      </div>';
	}*/
	
			 //CHECKING IF THE VIEWER OF THE COMMENT IS THE USER THAT POSTED
			 if($user_login==$comment_by){
			 	$view_comment='
		<div class="col-sm-12" style="background-color:#ffffff;border-radius:5px;">
                              <div class="user-thumb" style="padding-top:15px;padding-bottom:10px;"><a href="profile.php?u='.$idc.'"><img style="border-radius:100%;" src="'.$profile_pic3.'" alt="user" width="50" height="50">&nbsp;&nbsp;  '.$first_name.' '.$other_names.'</a>
                              </div>
                                  <div class="activities-meta" >
                                     
                                    <!--  <i class="fa fa-clock-o"></i> -->
                                      &nbsp;&nbsp;&nbsp;&nbsp;<p>'.$comment.'</p>
                                      <hr style="margin-top: 18px;  margin-bottom: 15px;">
                                      <div class="com">
  <br><br>
 ';

			 }
			 else{
			
			$view_comment='
		<div class="col-sm-12" style="background-color:#ffffff;border-radius:5px;">
                              <div class="user-thumb" style="padding-top:15px;padding-bottom:10px;"><a  href="profile.php?u='.$idc.'""><img style="border-radius:100%;" src="'.$profile_pic3.'" alt="user" width="50" height="50">&nbsp;&nbsp;'.$first_name.' '.$other_names.'</a>
                              </div>
                                  <div class="activities-meta" >
                                      
                                <!--      <i class="fa fa-clock-o"></i> '.$date.' -->
                                      &nbsp;&nbsp;&nbsp;&nbsp;<p>'.$comment.'</p>
                                     
 <br><br>
 ';
		 
}
echo $view_comment;
}
}
else{

//echo"No comment at the moment";
}

}
catch(PDOException $error){
echo('connection error,because:'.$error->getMessage());

}

?>