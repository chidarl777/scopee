
<?php
$comment_id="";
$view_comment="";
try{
//view comment scripts
require_once("inc/db/config.php");
$commented_to=$post_by;
$id=$world_post_id;
$sql='SELECT *FROM world_post_comments WHERE POST_ID="'.$id.'" AND REMOVED="NO"';
$result=$dbh->prepare($sql);
$result->execute();

//counting the nunber of rows returned
$get_row=$result->rowCount();

if($get_row>0){
while($get_col=$result->fetch(PDO::FETCH_ASSOC)){
$comment_id=$get_col['ID'];
$comment_by=$get_col["COMMENTED_FROM"];
$comment1=$get_col['COMMENTS'];
$date=$get_col['DATE_COMMENTED'];

//getting users info
$get_data=$dbh->prepare('SELECT PROFILE_PIC,FIRST_NAME,OTHER_NAME FROM users WHERE USERNAME="'.$comment_by.'"');
			$get_data->execute();
			$get_info=$get_data->fetch(PDO::FETCH_ASSOC);
			
			$profile_pic=$get_info["PROFILE_PIC"];
			$first_name=$get_info['FIRST_NAME'];
			$other_name=$get_info['OTHER_NAME'];
//displaying commment
if(empty($profile_pic)){
			 	$profile_pic2="images/default-pic/images_012.jpg";
			 }
			 else{
			 	$profile_pic2="user_data/profile_pic/".$profile_pic;
			 }
			 //CHECKING THE CHARACTER IN THE COMMENT IF IT IS MORE THAN 150
			  if(strlen($comment1)>100){
$comment=substr($comment1,0 ,100)."...."."<a href='#'>more</a>";
 }
else{
 $comment=$comment1;
 }
			 //CHECKING IF THE VIEWER OF THE COMMENT IS THE USER THAT POSTED
			 if($user_login==$comment_by){
			 	$view_comment='
		<div class="col-sm-12" style="background-color:#F7F7F7;border-radius:5px;">
                              <div class="user-thumb" style="padding-top:15px;padding-bottom:10px;"><a href="#"><img src='.$profile_pic3.' alt="user" width="50" height="50"></a>
                              </div>
                                  <div class="activities-meta" >
                                      <p>posted by '.$first_name.' '.$other_names.'</p>
                                      <i class="fa fa-clock-o"></i> '.$date.' 
                                      <p>'.$comment.'</p>
                                      <hr style="margin-top: 18px;  margin-bottom: 15px;">
                                      <div class="com">
                                        <a href="#">comments<i class="fa fa-comments-o "></i></a>&nbsp;&nbsp;&nbsp;
                                         <a href="#">share<i class="fa fa-share-alt "></i></a>&nbsp;&nbsp;&nbsp;
                                         <a href="#">like<i class="fa  fa-thumbs-o-up  "></i></a>
                                         <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" >
    edit
</button><button type="button" class="btn btn-primary btn-sm" id="delete-comment" onclick="loaddelworcomm()">
    delete
</button><hr><br><br>
 ';
			 }
			 else{
			
			$view_comment='
		<div class="col-sm-12" style="background-color:#F7F7F7;border-radius:5px;">
                              <div class="user-thumb" style="padding-top:15px;padding-bottom:10px;"><a href="#"><img src='.$profile_pic3.' alt="user" width="50" height="50"></a>
                              </div>
                                  <div class="activities-meta" >
                                      <p>posted by '.$first_name.' '.$other_names.'</p>
                                      <i class="fa fa-clock-o"></i> '.$date.' 
                                      <p>'.$comment.'</p>
                                      <hr style="margin-top: 18px;  margin-bottom: 15px;">
                                      <div class="com">
                                        <a href="#">comments<i class="fa fa-comments-o "></i></a>&nbsp;&nbsp;&nbsp;
                                         <a href="#">share<i class="fa fa-share-alt "></i></a>&nbsp;&nbsp;&nbsp;
                                         <a href="#">like<i class="fa  fa-thumbs-o-up  "></i></a>
                                         <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" >
    edit
</button><button type="button" class="btn btn-primary btn-sm" id="delete-comment" onclick="loaddelworcomm()">
    delete
</button><hr><br><br>
 ';
		 
}
//echo $view_comment;
}
}
else{

echo"No comment at the moment";
}

}
catch(PDOException $error){
echo('connection error,because:'.$error->getMessage());

}

?>