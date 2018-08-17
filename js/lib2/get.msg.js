
 jQuery(document).ready(function($) {
          var count = 2;
          $(window).scroll(function(){
                  if  ($(window).scrollTop() == $(document).height() - $(window).height()){
                     loadArticle(count);
                     count++;
                  }
          }); 
 
          function loadArticle(pageNumber){    
                  $('a#inifiniteLoader').show('fast');
                  $.ajax({
                      url: "/inc/msg/view_msg.php",
                      type:'POST',
                      data: "offset="+ pageNumber, 
                      success: function(html){
                          $('a#inifiniteLoader').hide('1000');
                          $(".g-message").append(html);    // This will be the div where our content will be loaded
                      }
                  });
              return false;
          }
    });
