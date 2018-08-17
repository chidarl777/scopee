<?php

//function for date time difference

function datetimediff($cur_time,$old_time){
//2. Next convert the string to a date variable
//~~~
   $dteStart = new DateTime($cur_time);
   $dteEnd   = new DateTime($old_time);
   //3. Calculate the difference

   $dteDiff  = $dteStart->diff($dteEnd);	

//CREATING DATE CONDERATION I.E ABOUT, OVER
$year= $dteDiff->format("%Y");

if($year==1){
	return $year.'year ago';
}
elseif($year>1){
	return $year.'years ago';
}
else{

$month= $dteDiff->format("%m");
if($month==1){
	return $month.'month ago';
}
elseif($month>1){
	return $month.'months ago';
}
else{
	$day= $dteDiff->format("%d");
if($day==1){
	return $day.'day ago';
}
elseif($day>1){
	return $day.'days ago';
}
else{
	$hour= $dteDiff->format("%H");
if($hour==1){
	return $hour.'hour ago';
}
elseif($hour>1){
	return $hour.'hours ago';
}
else{
	$minute= $dteDiff->format("%i");

if($minute==1){
	return $minute.'min ago';
}
elseif($minute>1){
	return $minute.'min ago';
}
else{
	$second= $dteDiff->format("%s");
if($second==1){
	return 'Now';
}
elseif($second>1){
	return $second.'sec ago';
}
else{
	
}
}
}
}
}
}
}

?>