
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
                      url: "inc/post/get_post.php",
                      type:'POST',
                   // html1 =$.parshtml( html, true ),
                      data: "offset="+ pageNumber, 
                      success: function(html){
                          $('a#inifiniteLoader').hide('1000');
                         $(".news-feed").append( html );   
                        //  $($.parseXML(html)).children('.news-feed'); // This will be the div where our content will be loaded
                      }
                  });
              return false;
          }
    });
