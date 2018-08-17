function sendsms()
{
	  var post=document.getElementById('cdt').innerHTML;
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
    	alert(xmlhttp.responseText);
   document.getElementById("world-post-area").innerHTML="";
   document.getElementById("post-title")="";
      }
  }
 
  var post_title=document.getElementById('post-title').value;
   var post_summary=document.getElementById('post-summary').value;
    var post_tag=document.getElementById('post-tag').value;
 var sendpost="world-post-area="+post
  +"&post-title="+post_title;
     
     
 
xmlhttp.open("POST","sms/send_sms.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send(sendpost);
}
}
