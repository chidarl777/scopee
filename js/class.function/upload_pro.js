function loaduploadpic()
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
       if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
   alert("success");
    }else{
		alert("fail");
	}

  var upload= document.getElementById("upload").value;
  var picture= document.getElementById("picture").value;
 var senddata="upload="+upload
 +"&picture="+picture;
 
xmlhttp.open("POST","inc/uploading_profile_pic.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send();
}
