$(document).ready(function(){
	  $("#send-data").click(function(){
    $("#change_fileToupload,.change-background-pic").hide();
  });
  $("#change-password").click(function(){
    $(".apas_panel").show();
  });
});

$(document).ready(function(){
	  $(".privacy-settings,.world-settings,.account-hide").click(function(){
    $(".user-account").hide();
  });
  $(".account-settings").click(function(){
    $(".user-account").show();
  });
});

$(document).ready(function(){
	  $(".account-settings,.world-settings,.privacy-hide").click(function(){
    $(".users-privacy").hide();
  });
  $(".privacy-settings").click(function(){
    $(".users-privacy").show();
  });
});

$(document).ready(function(){
	  $(".account-settings,.privacy-settings,.world-hide").click(function(){
    $(".users-world").hide();
  });
  $(".world-settings").click(function(){
    $(".users-world").show();
  });
});