function loadXMLDoc()
{
	var post= document.getElementById("edit-comment").value;
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
 
  var post= document.getElementById("edit-comment").value;
 var sendpost="edit_comment="+post;
 
xmlhttp.open("POST","inc/post/edit_comment.inc.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send(sendpost);
}
}
