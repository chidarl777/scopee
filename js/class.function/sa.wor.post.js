function load3()
{
	var post= document.getElementById("world-post-area").value;
var xmlhttp; // The variable that makes Ajax possible!
if(post.length==0 || post.length==" "){
	 //do nothing
        return;
    } else {
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
   alert(xmlhttp.responseText);
    }
  }
  var world_id="<?php echo(world_id);?>";
  var post_title=document.getElementById("post-title").value;
 var send_post=document.getElementById("save-post").value;
 var post= document.getElementById("world-post-area").value;
 var sendpost="save-post="+send_post
 +"&post-content="+post +"&post-title="+post_title +"&world_id="+world_id;
 
xmlhttp.open("POST","inc/world/save_world_post.inc.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send(sendpost);
}
}
