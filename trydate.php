<?php

echo date('Y-M-d H:i:s');

$date1=date_create("2013-12-15 23:00:00");
$date2=date_create("2013-12-15 14:00:00");
$diff=date_diff($date1,$date2);
echo $diff->format("%R%a days");


?>
<?php

// Example

   $strStart = '2013-12-15 14:00:01';
   $strEnd   = '2013-12-15 14:00:00';

?>


<?php
//2. Next convert the string to a date variable
//~~~
   $dteStart = new DateTime($strStart);
   $dteEnd   = new DateTime($strEnd);

?>


<?php
//3. Calculate the difference

   $dteDiff  = $dteStart->diff($dteEnd);

?>



<?php
//4. Format the output
   print $dteDiff->format("%Y-%m-%d %H:%I:%S");

/*
    Outputs
   
    03:22:00
*/

?> 
<?php 
echo '<br>';
//CREATING DATE CONDERATION I.E ABOUT, OVER
$year= $dteDiff->format("%Y");

if($year==1){
	echo 'Over '.$year.'year ago';
}
elseif($year>1){
	echo 'Over '.$year.'years ago';
}
else{

$month= $dteDiff->format("%m");
if($month==1){
	echo 'Over '.$month.'month ago';
}
elseif($month>1){
	echo 'Over '.$month.'months ago';
}
else{
	$day= $dteDiff->format("%d");
if($day==1){
	echo 'Over '.$day.'day ago';
}
elseif($day>1){
	echo 'Over '.$day.'days ago';
}
else{
	$hour= $dteDiff->format("%H");
if($hour==1){
	echo 'Over '.$hour.'hour ago';
}
elseif($hour>1){
	echo 'Over '.$hour.'hours ago';
}
else{
	$minute= $dteDiff->format("%i");

if($minute==1){
	echo $minute.'min ago';
}
elseif($minute>1){
	echo $minute.'min ago';
}
else{
	$second= $dteDiff->format("%s");
if($second==1){
	echo 'Now';
}
elseif($second>1){
	echo $second.'sec ago';
}
else{
	
}
}
}
}
}
}
?>

<?php
function pluralize( $count, $text )
{
    return $count . ( ( $count == 1 ) ? ( " $text" ) : ( " ${text}s" ) );
}

function ago( $datetime )
{
    $interval = date_create('now')->diff( $datetime );
    $suffix = ( $interval->invert ? ' ago' : '' );
    if ( $v = $interval->y >= 1 ) return pluralize( $interval->y, 'year' ) . $suffix;
    if ( $v = $interval->m >= 1 ) return pluralize( $interval->m, 'month' ) . $suffix;
    if ( $v = $interval->d >= 1 ) return pluralize( $interval->d, 'day' ) . $suffix;
    if ( $v = $interval->h >= 1 ) return pluralize( $interval->h, 'hour' ) . $suffix;
    if ( $v = $interval->i >= 1 ) return pluralize( $interval->i, 'minute' ) . $suffix;
    return pluralize( $interval->s, 'second' ) . $suffix;
}
?>