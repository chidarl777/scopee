<?php

if(isset($_SESSION['ads'])){
	//CHECKING IF SESSION CREATED IS EQUAT TO ADS WEBSITE name
	$check_ads_2=$_SESSION['ads'];
	echo $check_ads_2;
	 $ads_script='<script>
$(document).ready(function(){
	alert("yes");
var check_ads="'.$check_ads_2.'";
var ads_addr=$("#hide").find("a").attr("href")
if(check_ads===ads_addr){
	alert("true");
	$.post("ads.php", {"ads":$("#hide").find("a").attr("href")}, function(results) {
  alert(results);
  });
}
else{
	alert("false");
}

});
</script>';

}
else{
	$ads_script='';
}
?>