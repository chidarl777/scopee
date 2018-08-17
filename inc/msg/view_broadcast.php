<?php

try{
//view broadcast scripts
$sql="SELECT * FROM broadcast WHERE user_from=$user_login ASC";
$result=$dbh->prepare($sql);
$result->execute();

//counting the nunber of rows returned
$get_row=$result->rowCount();

if($get_row>0){
while($get_col=$result->setFetchMode(PDO::FETCH_ASSOC)){
$broadcast_id=$get_col['id'];
$sent_by=$get_col['user_from'];
$date=$get_col['date'];
$time=$get_col['time'];
}

$sql="SELECT * FROM users WHERE username=$user_login";
$result2=$dbh->prepare($sql);
$result2->execute();
while($get_info=$result->setFetchMode(PDO::FETCH_ASSOC)){
$id=$get_info['id'];
$firstname=$get_info['first_name'];
$othername=$get_info['other_names'];
$profile_pic=$get_info['profile_pic"];
//displaying messages

echo"
<div class="messages">
<div class="profile_pic">
<img src='../userdata/profile_pic/$rand_number/$profile_pic' width='45px' heigth='45' />
</div>
<div class='broadcast_msg'>
<b> $sent_by $date '@' $time</b><br />
$sent_by
<form action='$msg_id' method='POST'>
<input type='submit' id='comment' name='comment_btn' value='Comment' />
</form>
</div>
</div>";
}
else{

$sent_by="You do not have any messages currently";
}
?>
}
catch(PDOException $error){
echo('connection error,because:'.$error->getMessage());

}

?>