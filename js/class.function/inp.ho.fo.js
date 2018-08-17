$(document).ready(function(){
  $(".bt-sm-ed").click(function(){
    $(".ed-rec-msd<?php echo $post_id;?>").show();
  });
  $(".btn-s-ed").click(function(){
    $("recpt-ms").hide();
  });
});
