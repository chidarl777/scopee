function sendmsg()
{
	var post= document.getElementById("msg-area").value;
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
    alert(xmlhttp.responseText);
    }
  }
  var post= document.getElementById("msg-area").value;
 var sendpost="msg-area="+post;
 
xmlhttp.open("POST","/inc/msg/send_msg.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send(sendpost);
}
}
