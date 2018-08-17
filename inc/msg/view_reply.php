<?php

try{
//view replies scripts
$sql="SELECT * FROM mes_reply WHERE user_to=$user_login ASC";
$result=$dbh->prepare($sql);
$result->execute();

//counting the nunber of rows returned
$get_row=$result->rowCount();

if($get_row>0){
while($get_col=$result->setFetchMode(PDO::FETCH_ASSOC)){
$reply=$get_col['msg_id'];
$replied_by=$get_col['user_from'];
$replied_msg=$get_col['reply_body'];
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
<div class="replies">
<div class="profile_pic">
<img src='../userdata/profile_pic/$rand_number/$profile_pic' width='45px' heigth='45' />
</div>
<div class='reply_body'>
<b> $replied_by $date '@' $time</b><br />
$reply_msg
<form action='$reply_id' method='POST'>
<input type='text' id='reply' name='reply_btn' value='Reply' />
</form>
</div>
</div>";
}
else{

$msg="You do not have any messages currently";
}
?>
}
catch(PDOException $error){
echo('connection error,because:'.$error->getMessage());

}