$(document).ready(function(){
  $("#send-data").click(function(){
    $("#ep-form,#change-pic,#change-background-pic").hide();
  });
  $("#edit-profile").click(function(){
    $("#ep-form,#change-pic,#change-background-pic,").show();
  });
});
  $("#edit-profile").click(function(){
    $("#ep-form,#change-pic,#change-background-pic").show();
  });

$(document).ready(function(){

  $("#change-pic").click(function(){
    $(".change_fileToupload").show();
  });
   $("#change-pic").click(function(){
    $(".change-background-pic").hide();
  });
});

$(document).ready(function(){

  $("#change-background-pic").click(function(){
    $(".change-background-pic").show();
  });
    $("#change-background-pic").click(function(){
    $(".change_fileToupload").hide();
  });
});
$(document).ready(function(){
  $("#send-data").click(function(){
    $("#change_fileToupload,.change-background-pic").hide();
  });
  $("#change-backgrond-pic").click(function(){
    $(".change-background-pic").show();
  });
});
$(document).ready(function(){
  $("#About,#worlds,#Photo,#send-msg").click(function(){
    $(".u-friends").hide();
  });
  $("#friends").click(function(){
    $(".u-friends").show();
  });
});
$(document).ready(function(){
  $("#friends,#About,#Photo").click(function(){
    $(".u-world").hide();
  });
  $("#worlds").click(function(){
    $(".u-world").show();
  });
});
$(document).ready(function(){
  $("#friends,#worlds,#About,#send-msg").click(function(){
    $(".u-photo").hide();
  });
  $("#Photo").click(function(){
    $(".u-photo").show();
  });
});

$(document).ready(function(){
  $("#friends,#worlds,#Photo,#send-msg").click(function(){
    $(".about-user").hide();
  });
  $("#About").click(function(){
    $(".about-user").show();
  });
});

$(document).ready(function(){
  $("#About,#worlds,#Photo,#friends").click(function(){
    $(".send-msg").hide();
  });
  $("#send-msg").click(function(){
    $(".send-msg").show();
  });
});