function loadXMLDoc()
{
//	var post= document.getElementById("post-body").value;
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
 
  var post= document.getElementById("post-body").value;
 var sendpost="post_body="+post;
 
xmlhttp.open("POST","inc/send_post.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send(sendpost);
}
