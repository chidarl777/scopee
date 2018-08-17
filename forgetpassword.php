<!doctype html>
<head>
    <meta>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="Forgot password; No problem, input your username in they field provided...">
    <meta name="keywords" content="forgetten password,scopee forgetten password,scopee.in,scopee, forget password, forget password, scopee pass"/>
    <title>Forgotten password!!!</title>
    <link rel="icon"  type="image/ico"  href="/favicon.ico" />
<link type="text/css" rel="stylesheet" href="css/font-awesome.css">
  <link type="text/css" rel="stylesheet" href="css/material-design-iconic-font.css">
  <link type="text/css" rel="stylesheet" href="css/bootstrap.css">
  <link type="text/css" rel="stylesheet" href="css/animate.css">
  <link type="text/css" rel="stylesheet" href="css/layout.css">
  <link type="text/css" rel="stylesheet" href="css/components.css">
  <link type="text/css" rel="stylesheet" href="css/widgets.css">
  <link type="text/css" rel="stylesheet" href="css/plugins.css">
  <link type="text/css" rel="stylesheet" href="css/pages.css">
  <link type="text/css" rel="stylesheet" href="css/bootstrap-extend.css">
  <link type="text/css" rel="stylesheet" href="css/common.css">
  <link type="text/css" rel="stylesheet" href="css/responsive.css">
  <link type="text/css" id="themes" rel="stylesheet" href="">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body class="login-page">
<?php require("inc/headerMenu.php");?>
    <!--Page Container Start Here-->
    <section class="login-container boxed-login">
    <div class="container">

        <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
            <div class="login-form-container">
                <form action="" method="POST" class="j-forms" >
               
<?php require("inc/authentication/forget_password.inc.php");?>
                    <div class="login-form-header">
                        <div class="logo">
                             <span id="login-head"><b>Forgot Password?</b></span>
                        </div>
                    </div>
                    <?php echo $success; ?>
                    <div class="login-form-content">
                        <!-- start login -->
                        <div class="unit">
                            <div class="input login-input">
                                <div class="form-group input-group">
                                
                                    <span class="input-group-addon" id="basic-addon1"> <i class="fa fa-user"></i></span>
                                    <span class="errors"><?php echo $Usernameerr ?></span>
                                    <input type="search" id="search_friend" name="username" placeholder='Email or Phone' class="form-control" aria-describedby="basic-addon1"/>
                                </div>
                            </div>
                        </div>
                        <!-- end login -->

                    </div>
                    <div class="row login-form-footer">
                        <div class="col-md-9"></div>
                        <div class="col-md-3">
                            <input type="submit" class="btn-block btn btn-success" value="Submit" name="recover_pass">
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
<?php require('inc/footer.inc.php'); ?>
    </section>
    <!--Page Container End Here-->
    <script src="js/lib/jquery.js"></script>
    <script src="js/lib/jquery-migrate.js"></script>
    <script src="js/lib/bootstrap.js"></script>
    <script src="js/lib/jRespond.js"></script>
    <script src="js/lib/hammerjs.js"></script>
    <script src="js/lib/jquery.hammer.js"></script>
    <script src="js/lib/smoothscroll.js"></script>
    <script src="js/lib/smart-resize.js"></script>

    <script src="js/lib/jquery.validate.js"></script>
    <script src="js/lib/jquery.form.js"></script>
    <script src="js/lib/j-forms.js"></script>
    <script src="js/lib/login-validation.js"></script>
</body>
