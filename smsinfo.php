<?php require("aut_session_admin.php");?>
<!doctype html>
<html>
<head>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link type="text/css" rel="stylesheet" href="cssa/font-awesome.css">
  <link type="text/css" rel="stylesheet" href="cssa/material-design-iconic-font.css">
  <link type="text/css" rel="stylesheet" href="cssa/bootstrap.css">
  <link type="text/css" rel="stylesheet" href="cssa/animate.css">
  <link type="text/css" rel="stylesheet" href="cssa/layout.css">
  <link type="text/css" rel="stylesheet" href="cssa/components.css">
  <link type="text/css" rel="stylesheet" href="cssa/widgets.css">
  <link type="text/css" rel="stylesheet" href="cssa/plugins.css">
  <link type="text/css" rel="stylesheet" href="cssa/pages.css">
  <link type="text/css" rel="stylesheet" href="css/bootstrap-extend.css">
  <link type="text/css" rel="stylesheet" href="cssa/common.css">
  <link type="text/css" rel="stylesheet" href="cssa/responsive.css">
  <link type="text/css" id="themes" rel="stylesheet" href="css/style.css">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link type="text/css"  rel="stylesheet" href="css/n_layout.css">
  <meta name="description" name="keywords"/>
  <title>Update unit</title>
<style>
.title-header{
	width: 100%;
    padding-top: 10px;
    padding-bottom: 10px;
    padding-left: 5px;
    padding-right: 5px;
    font-size: 17px;
    font-weight: bold;
}
.num,.title-header{
	font-size: 17px;
	font-weight: bold;
}
.num{
	float:right;
	margin-right: 10px;
	
}
.summary{
	padding-left: 5px;
    padding-right: 5px;
    padding-top:10px;
    font-size: 17px;
   min-height: 100px;
   max-height: 200px;
    
}
.trk{
	width: 100%;
	margin:0.3%;
	font-weight: bold;
	font-size: 18px;
}
.sms-to{
	width: 80%;
	padding:1%;
}
.sms-info{
	float: right;
}
hr{
	width:100%;
	color:#3ce617;
}
.cat-footer{
	width: 100%;
}
.cat-footeer{
	padding: 5px;
}
.d-footer{
	float:right;
	margin-right: 10px;
}
.l-footer{

}
.i-buttons{
	width: 50%;
	float: right;
	margin-bottom: 2%;
}
.col{
	margin-left: 10px;
	width:100%;
	border:2px solid  #29a813;
	border-radius: 10px;
	 min-height: 260px;
	  max-height: 400px;
	  background-color: #ffffff;
	 
}
.col:hover{
	margin-left: 10px;
	width:100%;
	border:2px solid #29a813;
	border-radius: 10px;
	 min-height: 260px;
	  max-height: 400px;
	  background-color: #ffffff;
	  box-shadow: 10px 10px 5px #888888;
	 
}
.i-info span{
	margin-left: 2%;
	margin-right: 2%;
}
</style>
</head>

<body class="leftbar-view"> 
<?php require("inc/header.php"); ?>
<?php require("inc/leftbar.php"); ?>
<?php require("inc/conversation.inc.php"); ?>  
<div class="container-fluid">
<!--Page Container Start Here-->
<section class="main-container">
<div class="container-fluid">
<script>
function adjustHeight(el){
    el.style.height = (el.scrollHeight > el.clientHeight) ? (el.scrollHeight)+"px" : "60px";
}
</script>

<!-- <div class="page-header filled full-block light">
  <div class="row">
      <div class="col-md-6 col-sm-6">
          <h2>Scoopy</h2>
         <!--  <p>Bootstrap3 supported admin template</p> -->
          <!--     <label class="label">Your email</label>
              <div class="input">
                  <input type="email" id="email" name="email" class="form-control">
              </div>
          </div>
      </div>
      <div class="col-md-6 col-sm-6"> -->
          <!-- <ul class="list-page-breadcrumb">
              <li><a href="#">Home <i class="fa fa- fa fa--chevron-right"></i></a></li>
              <li><a href="#">Layout <i class="fa fa- fa fa--chevron-right"></i></a></li>
              <li class="active-page"> Dashboard</li>
          </ul> -->
     <!--  </div>
  </div> -->
</div>
<div class="row">
<div class="col-md-18" >
<div class="widget-wrap" >
<div class="widget-header block-header margin-bottom-0 clearfix">
    <div class="pull-left">
        <h3>scopee</h3>
        <p>make new friends &amp; have fun</p>
    </div>
</div>
<div class="row" style="padding-top:25px;">
<div class="col-md-10">
  <div class="widget-wrap">
      <style>
    	.phone-text{
			width: 63%;
			border:4px  groove #22a60b;
			margin-left: 2%;
			height: 250px;
		}
    	
		.phone-area{
			width: 100%;
			
		}
    	
		
		.send{
			margin:30px;
			width: 60%;
		}
		.ph-footer{
			color:red;
			font-size: 17px;
			width: 63%;
			font-weight: bold;
		}
		.right-pane{
		float: right;
		margin-right:2%;
		width:30%;	
		}
		.phone-area button:hover,.phone-area input[type=submit]:hover{
			height:40px;
			width:100%;
			border: 2px solid #22a60b;
			color:#ffffff;
			font-size: 15px;
			background-color: #1a8a13;
			
		}
		.phone-area button,.phone-area input[type=submit]{
			height:40px;
			width:100%;
			border: 2px solid #22a60b;
			color:#1a8a13;
			font-size: 15px;
			background-color: #ffffff;
			
		}
		.warning{
			background-color: #ea1c5f;
			width:100%;
			font-size: 18px;
			color: #ffffff;
			padding-bottom: 7px;
			
			text-align: justify;
			font-weight: bold;
			
		}
		#s-id{
			float:left; 
		}
		.sender-pane{
			widows: 100px;
			height: 80px;
			border: none;
			background-color: #ffffff;
		}
		.sms{
			background-color: #dddedc;
		}
		.btn-send:hover{
			width:40%;
			height: 50px;
			background-color:#049304;
			color:#ffffff;
			
		}
			.btn-send{
			width:40%;
			height: 50px;
			background-color: #ffffff;
			color:#049304;
			
		}
		.amt-unit{
			width: 90%;
			height: 50px;
			border:none;
			background-color: #ffffff;
			box-shadow: 10px 10px 5px #888888;
			border:2px
		}
		.sms-header{
			padding-bottom: 20px;
			margin: 2%;
		}
		.sms-header a:hover{
			color:#000000;
			font-size: 17px;
			text-decoration: underline #0cc50c;
			
		}
		.sms-header a{
			padding: 30px;
			width: 70px;
			height: 70px;
			background-color: #ffffff;
			text-decoration: none;
			color:#0cc50c;
			font-size: 17px;
		}
		
			.unit-icon{
	float: right;
	margin-right: 1%;
	margin-left: 2%;
	background-color: #ffffff;
	color: #27be12;
	font-weight: bold;
	font-size: 18px;
	
}
.sd-input{
	
	width: 100%;
}
.sd-input input[type="submit"]{
	float: right;
	margin-top: 5%;
	margin-right: 10%;
}
.form-body{
	width: 100%;
}

    </style>
      <div class="widget-header block-header margin-bottom-0 clearfix">
          <div class="pull-left">
              <h3>  </h3>
          </div>
          <!-- for post -->
          
           <div class="pull-right w-action">
              <ul class="widget-action-bar">
                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-globe"></i></a>
                      <ul class="dropdown-menu">
                          <li class="widget-reload"><a href="#"><i class="fa  fa-refresh "></i></a></li>
                          <li class="widget-toggle"><a href="#"><i class="fa fa-align-justify "></i></a></li>
                          <li class="widget-fullscreen"><a href="#"><i class="fa fa-square  "></i></a></li>
                         <!-- <li class="widget-exit"><a href="#"><i class="fa fa-power-off"></i></a></li>-->
                      </ul>
                  </li>
              </ul>
          </div>
      </div>
                     
      <div class="widget-container margin-top-0">
          <div class="widget-content">
              <div class="activities-container">
                  <ul class="activities-list">
                      <li>
                          <div class="form-body">
                          
      <br/>
                         
<table>
	<tr>
		<td>10-10000</td>
		<td>10000-</td>
	</tr>
	
</table>
                      </li>
                      </ul>
                  </div>
           <br><br>
              </div>                        
          <!-- end post -->
          <div class="col-sm-12"></div>
        </div>

</div>

</div>
</div>
<?php require('inc/footer.inc.php'); ?>
</section>
<!--Rightbar End Here-->
<script src="js/lib/jquery.js"></script>
<script src="js/lib/jquery-migrate.js"></script>
<script src="js/lib/bootstrap.js"></script>
<script src="js/lib/jquery.ui.js"></script>
<script src="js/lib/jRespond.js"></script>
<script src="js/lib/nav.accordion.js"></script>
<script src="js/lib/hover.intent.js"></script>
<script src="js/lib/hammerjs.js"></script>
<script src="js/lib/jquery.hammer.js"></script>
<script src="js/lib/jquery.fitvids.js"></script>
<script src="js/lib/scrollup.js"></script>
<script src="js/lib/smoothscroll.js"></script>
<script src="js/lib/jquery.slimscroll.js"></script>
<script src="js/lib/jquery.syntaxhighlighter.js"></script>
<script src="js/lib/velocity.js"></script>
<script src="js/lib/jquery-jvectormap.js"></script>
<script src="js/lib/jquery-jvectormap-world-mill.js"></script>
<script src="js/lib/jquery-jvectormap-us-aea.js"></script>
<script src="js/lib/smart-resize.js"></script>
<!--iCheck-->
<script src="js/lib/icheck.js"></script>
<script src="js/lib/jquery.switch.button.js"></script>
<!--CHARTS-->
<script src="js/lib/chart/sparkline/jquery.sparkline.js"></script>
<script src="js/lib/chart/easypie/jquery.easypiechart.min.js"></script>
<script src="js/lib/chart/flot/excanvas.min.js"></script>
<script src="js/lib/chart/flot/jquery.flot.min.js"></script>
<script src="js/lib/chart/flot/curvedLines.js"></script>
<script src="js/lib/chart/flot/jquery.flot.time.min.js"></script>
<script src="js/lib/chart/flot/jquery.flot.stack.min.js"></script>
<script src="js/lib/chart/flot/jquery.flot.axislabels.js"></script>
<script src="js/lib/chart/flot/jquery.flot.resize.min.js"></script>
<script src="js/lib/chart/flot/jquery.flot.tooltip.min.js"></script>
<script src="js/lib/chart/flot/jquery.flot.spline.js"></script>
<script src="js/lib/chart/flot/jquery.flot.pie.min.js"></script>
<!--Forms-->
<script src="js/lib/jquery.maskedinput.js"></script>
<script src="js/lib/jquery.validate.js"></script>
<script src="js/lib/jquery.form.js"></script>
<script src="js/lib/j-forms.js"></script>
<script src="js/lib/jquery.loadmask.js"></script>
<script src="js/lib/vmap.init.js"></script>
<script src="js/lib/theme-switcher.js"></script>
<script src="js/apps.js"></script>
</body>
</html>