<?php require("inc/authentication/send_log.inc.php");?>
<!doctype php>
<head>
    <meta>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="Login now meet chat and communicate with friends"/>
    <meta name="description" content="login,scopee.in login, scopee login, signin, scopee,scopee.in"/>
    <title>Login | Scopee</title>
    <link rel="icon" type="image/ico" href="/favicon.ico" />
    <link type="text/css" rel="stylesheet" href="font-awesome/css/font-awesome.css">
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
    <link type="text/css" rel="stylesheet" href="css/style.css">
</head>
<body class="login-page" style="background-image: url('images/err.jpg'); background-size: cover;">
<?php require("inc/headerMenu.php");?>

   
    <!--Page Container Start Here-->
    <section class="login-container boxed-login">
    <div class="container">
        <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
            <div class="login-form-container">
                <form action="" method="POST" class="j-forms">

                    <div class="login-form-header">
                        <div class="logo">
                    
                            <a href="index.php" title="Scopee"><img widrh="70px;"height="70px;"src="image/logo-img/logo.png" alt="Scopee Logo"></a><br/>
                             <span id="login-head"><b>Meet and Join Friends Today</b></span>
                        </div>
                    </div>
                    <div class="login-form-content">
                        <!-- start login -->
                        <div class="unit">
                        <span class="errors"><?php echo $errors?></span>
                            <div class="input login-input">
                            
                                <label class="icon-left" for="login">
                                    <i class="fa fa-user"></i>
                                </label>
                                <input class="form-control login-frm-input"  type="text" id="login" name="login" placeholder="Email or Phone">
                            </div>
                        </div>
                        <!-- end login -->

                        <!-- start password -->
                        <div class="unit">
                            <div class="input login-input">
                                <label class="icon-left" for="password">
                                    <i class="fa fa-key"></i>
                                </label>
                                <input class="form-control login-frm-input"  type="password" id="password" name="password" placeholder="Password">
                                <label class="checkbox">
                                    <input type="checkbox" name="remenber-me" value="true" >
                                    <i></i>
                                    Remember me
                                    <span class="hint">
                                        <a href="forgetpassword.php" class="link">Lost password?</a>
                                    </span>
                                </label>
            						
                            </div>
                        </div>
                        <!-- end password -->
                        <!-- start response from server -->
                        <div class="response"></div>
                        <!-- end response from server -->



                    </div>
                    <div class="login-form-footer">
                        <input type="submit" class="btn-block btn btn-success" value="Login" name="btn-login">
                    </div>
                    <!-- start keep logged -->
                    <div class="regist">
                        <label class="regist">
                             <a href="registration.php" class="link">New on Scopee? Create Account</a>
                        </label>
                    </div>
                        <!-- end keep logged -->

                </form>

            </div>
        </div>
    </div>
    
    <?php include_once("analyticstracking.php") ?>
    <?php require("inc/footer.inc.php");?>
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
</php>