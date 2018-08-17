function sendpost()
{
	//alert('yesss');
	  var post=document.getElementById('txt-editor').innerHTML;
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
      //getting an area where they post will be displayed
      xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    	//alert(xmlhttp.responseText);
    	document.getElementById("w-reload").innerHTML=xmlhttp.responseText;
   document.getElementById("txt-editor").innerHTML="";
   document.getElementById("post-title").innerHTML="";
   document.getElementById("post-summary").innerHTML="";
   document.getElementById("post-tag").innerHTML="";
   
      }
  }
 //var insert_file='No';
  var post_title=document.getElementById('post-title').value;
   var post_summary=document.getElementById('post-summary').value;
    var post_tag=document.getElementById('post-tag').value;
    var insert_file=document.getElementById('insert-file').value;
    
    var post_permission=document.getElementById('post-permission').value;
   
 var sendpost="world-post-area="+post
  +"&post-title="+post_title+"&post-tag="+post_tag+"&post-summary="+post_summary+"&post-permission="+post_permission+"&insert-file="+insert_file;
     
     
 
xmlhttp.open("POST","inc/world/insert_world_post.inc.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send(sendpost);
}
}
