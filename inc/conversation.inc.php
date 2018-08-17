<!--Rightbar Start Here-->
<aside class="rightbar"  onmousemove="load_u">

<?php require("inc/chat/get.num.logged.friends.inc.php"); ?>
<div class="rightbar-container">
<div class="aside-chat-box">
  <div class="coversation-toolbar">
      <div class="chat-back">
          <i class="glyphicon glyphicon-log-in"></i>
      </div>
      <div class="active-conversation">
         
          <div class="chat-user-status">
              <ul>
              <?php require("inc/chat/show.chat.info.inc.php"); ?>
                  <li><?php echo $chat_info;?></li>
                  <li></li>
              </ul>
          </div>
      </div>
      <div class="conversation-action">
          <ul>
        
              <li class="dropdown">
                  <a  class="btn-more dropdown-toggle" data-toggle="dropdown"><i class="fa fa-globe"></i></a>
                  <ul class="dropdown-menu">
                      <li><a id="attach-chat-file" ><i class="fa fa-fa-attachment-alt"></i>Attach A File</a></li>
                      <li><a ><i class="fa fa- fa fa-mic"></i>close conversation</a></li>
                      <li><a ><i class="fa fa- fa fa--block"></i>Block User</a></li>
                  </ul>
              </li>
          </ul>
      </div>
  </div>
  <div class="conversation-container" 
  >
    
<!--viewing active conversation start here-->
<script>
	function getchat(){
	 
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
    	
    document.getElementById("active-vc").innerHTML=xmlhttp.responseText;
    document.getElementById("chat-area").innerHTML="";
    }
  }

xmlhttp.open("POST","inc/chat/view_chat.inc.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send();

}



</script>
      <div id="active-vc">
     
      </div>
      <!--viewing active conversation ends here -->
      <div class="chat-text-input">
     
      <form method="post" action="">
        <div class="unit">
       <script src="js/class.function/ins.chat.js"></script>
             
                <textarea class="form-control" onclick="getchat();" placeholder="your message..." spellcheck="false" id="chat-area" ></textarea>
              <div style="float:right; margin-top:5px;">
                  <input type="button" id="send-chat" onclick="loadinschat()" class="btn btn-info" value="Send" />
       </div>
            </div>
            </form>
            
          <br>
  </div>
  </div>
</div>
<ul class="nav nav-tabs material-tabs rightbar-tab" role="tablist">
  <li class="active"><a href="#chat" aria-controls="message" role="tab" data-toggle="tab">Chat</a></li>
  <li><a href="#activities" aria-controls="notifications" role="tab" data-toggle="tab">Activities</a></li>
</ul>
<div class="tab-content">
<div role="tabpanel" class="tab-pane active" id="chat">
  <div class="chat-user-toolbar clearfix">
      <div class="chat-user-search pull-left">
          <span class="addon-icon"><i class="fa fa- fa fa--search"></i></span>
          <input type="text" class="form-control" placeholder="Search">
      </div>
      <div class="add-chat-list pull-right">
          <i class="fa fa- fa fa--accounts-add"></i>
      </div>
  </div>
  <div class="chat-user-container">
  
      <h3 class="clearfix"><span class="pull-left">Friends</span><span class="pull-right online-counter"><?php echo $get_logged_friends; ?> Online</span></h3>
      <ul class="chat-user-list">
          
          <li class="chat-u-online " id="show-u-online">
          
           <?php require("inc/chat/show_logged_in_friends.inc.php"); ?>
           
          </li>
          <!-- this is what shows if u are on line  -->
         
      </ul>

  </div>
</div>
<div role="tabpanel" class="tab-pane" id="activities">
  <div class="activities-timeline">
      <h3 class="tab-pane-header">Recent Activities</h3>
      
  </div>
</div>
</div>
</div>
</aside>
<!--Rightbar End Here-->
