<?php
// inserting peecin in the the users table

$insert_coin=$dbh->prepare('INSERT INTO coin(ad_clicker,posted_by,address,post_tracker,post_id,peecoin,category,category_id,category_address,date_earned,) VALUES(:ad_clicker,:posted_by,:address,:post_tracker,:post_id,:peecoin,:category,:category_id,:category_address,;date_earned)');

$insert_coin->bindParam(":ad_clicker",$user_login);
$insert_coin->bindParam(":address",$web_address);
$insert_coin->bindParam(":posted_by",$posted_by);
$insert_coin->bindParam(":post_tracker",$post_tracker);
$insert_coin->bindParam(":post_id",$post_id);
$insert_coin->bindParam(":peecoin",$coin_earned);
$insert_coin->bindParam(":category",$category);
$insert_coin->bindParam(":category_id",$category_id);
$insert_coin->bindParam(":category_address",$category_address);
$insert_coin->bindParam(":date_earned",$date);
$insert_coin->execute();
?>