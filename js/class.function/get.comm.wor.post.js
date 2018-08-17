//GETTING MORE COMMENTS WHEN THE USER CLICKS THE NORE BTN
var more=0;
if(oncontrolselect(more_btn)){
	more=+2;
}
var xmlhttp; // The variable that makes Ajax possible!
 try{
         // Opera 8.0+, Firefox, Safari 
         xmlhttp = new XMLHttpRequest();
      }catch (e){

         // Internet Explorer Browsers
         try{
            xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
         }catch (e) {
            try{
               xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }catch (e){

               // Something went wrong
               alert("Your browser broke!");
               return false;
            }
         }
      }
      
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("world_feed").innerHTML=xmlhttp.responseText;
    }
  }
  var comment_num=more;
 var send_comment_num="limit="+comment_num;
xmlhttp.open("POST","inc/world/comment_world_post.inc.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send(send_comment_num);
//}

