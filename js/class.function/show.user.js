function load_uf_online()
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
  //getting an area where they post will be displayed
      xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
//alert(xmlhttp.responseText);
document.getElementById("show-u-online").innerHTML=xmlhttp.responseText;
    }
  }

xmlhttp.open("POST","inc/chat/show_logged_in_friends.inc.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send();
}
