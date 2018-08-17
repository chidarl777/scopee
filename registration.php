
<?php  require('inc/authentication/insert.inc.php'); ?>
<!doctype php>
<head>
    <meta>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="meet friend and earn by making post signup now!!!"/>
    <meta name="keywords" content="registration,scopee.in registration,registering,registering in scopee.in, scopee,scopee.in,scopee social platform."/>
    <title>Sign Up | Scopee</title>
    <link rel="icon" type="image/ico" href="/favicon.ico" />
    <link type="text/css" rel="stylesheet" href="font-awesome/css/font-awesome.css">
    <link type="text/css" rel="stylesheet" href="css/material-design-iconic-font.css">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <link type="text/css" rel="stylesheet" href="css/animate.css">
    <link type="text/css" rel="stylesheet" href="css/layout.css">
    <link type="text/css" rel="stylesheet" href="css/components.css">
    <link type="text/css" rel="stylesheet" href="css/widgets.css">
    <link type="text/css" rel="stylesheet" href="css/plugins.css">
    <link type="text/css" rel="stylesheet" href="css/pages.css">
    <link type="text/css" rel="stylesheet" href="css/bootstrap-extend.css">
    <link type="text/css" rel="stylesheet" href="css/common.css">
    <link type="text/css" rel="stylesheet" href="css/responsive.css">
</head>
<body class="login-page" style="background-image: url('images/err.jpg'); background-size: cover;">
    <?php require("inc/headerMenu.php");?>
   <?php echo $error1; ?>


    <!--Page Container Start Here-->
    <section class="main-container">
        <div class="container">
            <!-- <div class="page-header filled light"> -->
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="widget-wrap">
                            <div class="widget-header block-header margin-bottom-0 clearfix">
                                <div class="sign-up-head">
                                    <h1>Sign Up! Its Free</h1>
                                    <p>Meets <span class="capture">Friends</span> and <span class="capture">Earn</span> by <span class="capture">making Posts</span></p>
                                </div>
                            </div>
                            <div class="widget-container">
                                <div class="widget-content">
                                    <div class="row">
                                        <div class="col-md-12">
                                        <form action="" class="j-forms"  method="POST">

                                            <div class="form-content">

                                                <!-- start first name input with icon -->
                                                <div class="unit">
                                                    <label class="label">FIRST NAME</label>
                                                    <div class="input">
                                                   
                                                        <label class="icon-left" for="icon-left">
                                                            <i class="fa fa-user"></i>
                                                        </label>
                                                        <input class="form-control" type="text" name="firstname" placeholder="First name">
                                                    </div>
                                                     <span class="errors"><?php echo $Firstnameerr; ?></span>
                                                </div>
                                                <!-- end input  icon -->

                                                <!-- start other name input with icon -->
                                                <div class="unit">
                                                    <label class="label">OTHER NAMES</label>
                                                    <div class="input">
                                                    
                                                        <label class="icon-left" for="icon-left">
                                                            <i class="fa fa-user"></i>
                                                        </label>
                                                        <input class="form-control" type="text" name="othernames" id="icon-left" placeholder="Other names">
                                                    </div>
                                                     <span class="errors"><?php echo $Othernameerr; ?></span>
                                                </div>
                                                <!-- end input with  icon -->

                                                <!-- start username input with append icon -->
                                                <div class="unit">
                                                    <label class="label">USERNAME</label>
                                                    <div class="input">
                                                    
                                                        <label class="icon-left" for="icon-left">
                                                            <i class="fa fa-user-md"></i>
                                                        </label>
                                                        <input class="form-control" type="text" name="username" id="icon-right" placeholder="Email">
                                                    </div>
                                                     <span class="errors"><?php echo $Usernameerr; ?></span>
                                                </div>
                                                <!-- end input with append icon -->

                                                <!-- start gender radio buttons -->
                                                <div class="form-group">
                                                    <label class="label col-md-3">GENDER</label>
                                                   
                                                    <div class=" col-md-6">
                                                        <input type="radio" name="gender" value="Male" checked >Male<br/>
                                                        <input type="radio" name="gender" value="Female" >Female
                                                    </div>
                                                      <span class="errors"><?php echo $Gendereer; ?></span>
                                                </div>
                                                <!-- end gender radio buttons -->

                                                <!-- start date of birth -->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label class="label">DATE OF BIRTH</label>
                                                    </div>
                                                    <div class="col-md-3 unit">
                                                        <label class="input select">
                                                            <select class="form-control" name="day">
                                                                <option selected="">Day</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                                <option value="11">11</option>
                                                                <option value="12">12</option>
                                                                <option value="13">13</option>
                                                                <option value="14">14</option>
                                                                <option value="15">15</option>
                                                                <option value="16">16</option>
                                                                <option value="17">17</option>
                                                                <option value="18">18</option>
                                                                <option value="19">19</option>
                                                                <option value="20">20</option>
                                                                <option value="21">21</option>
                                                                <option value="22">22</option>
                                                                <option value="23">23</option>
                                                                <option value="24">24</option>
                                                                <option value="25">25</option>
                                                                <option value="26">26</option>
                                                                <option value="27">27</option>
                                                                <option value="28">28</option>
                                                                <option value="29">29</option>
                                                                <option value="30">30</option>
                                                                <option value="31">31</option>
                                                            </select>
                                                            <i></i>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-6 unit">
                                                        <label class="input select" >
                                                            <select class="form-control" name="month">
                                                                <option selected="">Month</option>
                                                                <option value="January">January</option>
                                                                <option value="February">February</option>
                                                                <option value="March">March</option>
                                                                <option value="April">April</option>
                                                                <option value="May">May</option>
                                                                <option value="June">June</option>
                                                                <option value="July">July</option>
                                                                <option value="August">August</option>
                                                                <option value="September">September</option>
                                                                <option value="October">October</option>
                                                                <option value="November">November</option>
                                                                <option value="December">December</option>
                                                            </select>
                                                            <i></i>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3 unit">
                                                        <label class="input select">
                                                            <select class="form-control" name="year">
                                                                <option selected="">Year</option>
                                                                <option value="2015">2015</option>
                                                                <option value="2016">2014</option>
                                                                <option value="2017">2013</option>
                                                                <option value="2018">2012</option>
                                                                <option value="2019">2011</option>
                                                                <option value="2020">2010</option>
                                                                <option value="2021">2009</option>
                                                                <option value="2022">2008</option>
                                                                <option value="2021">2007</option>
                                                                <option value="2022">2006</option>
                                                                <option value="2021">2005</option>
                                                                <option value="2022">2004</option>
                                                                <option value="2021">2003</option>
                                                                <option value="2022">2002</option>
                                                                <option value="2021">2001</option>
                                                                <option value="2022">2000</option>
                                                                <option value="2021">1999</option>
                                                                <option value="2022">1998</option>
                                                                <option value="2021">1997</option>
                                                                <option value="2022">1996</option>
                                                                <option value="2021">1995</option>
                                                                <option value="2022">1994</option>
                                                                <option value="2021">1993</option>
                                                                <option value="2022">1992</option>
                                                                <option value="2021">1991</option>
                                                                <option value="2022">1990</option>
                                                                <option value="2021">1989</option>
                                                                <option value="2022">1988</option>
                                                                <option value="2021">1987</option>
                                                                <option value="2022">1986</option>
                                                                <option value="2021">1985</option>
                                                                <option value="2022">1984</option>
                                                                <option value="2021">1983</option>
                                                                <option value="2022">1982</option>
                                                                <option value="2021">1981</option>
                                                                <option value="2022">1980</option>
                                                                <option value="2021">1979</option>
                                                                <option value="2022">1978</option>
                                                                <option value="2021">1977</option>
                                                                <option value="2022">1976</option>
                                                                <option value="2021">1975</option>
                                                                <option value="2022">1974</option>
                                                                <option value="2021">1973</option>
                                                                <option value="2022">1972</option>
                                                                <option value="2021">1971</option>
                                                                <option value="2022">1970</option>
                                                                <option value="2021">1969</option>
                                                                <option value="2022">1968</option>
                                                                <option value="2021">1967</option>
                                                                <option value="2022">1966</option>
                                                                <option value="2021">1965</option>
                                                                <option value="2022">1964</option>
                                                                <option value="2021">1963</option>
                                                                <option value="2022">1962</option>
                                                                <option value="2021">1961</option>
                                                                <option value="2022">1960</option>
                                                                <option value="2021">1959</option>
                                                                <option value="2022">1958</option>
                                                                <option value="2021">1957</option>
                                                                <option value="2022">1956</option>
                                                                <option value="2021">1955</option>
                                                                <option value="2022">1954</option>
                                                                <option value="2021">1953</option>
                                                                <option value="2022">1952</option>
                                                                <option value="2021">1951</option>
                                                                <option value="2022">1950</option>
                                                                <option value="2021">1949</option>
                                                                <option value="2022">1948</option>
                                                                <option value="2021">1947</option>
                                                                <option value="2022">1946</option>
                                                                <option value="2021">1945</option>
                                                                <option value="2022">1944</option>
                                                                <option value="2021">1943</option>
                                                                <option value="2022">1942</option>
                                                                <option value="2021">1941</option>
                                                                <option value="2022">1940</option>
                                                            </select>
                                                            <i></i>
                                                        </label>
                                                    </div>
                                                </div>
                                                     <span class="errors"><?php echo $Dayerr; ?></span><br>
                                                      <span class="errors"><?php echo $Montherr; ?></span><br>
                                                       <span class="errors"><?php echo $Yearerr; ?></span><br>

                                                <!-- start username input with append icon -->
                                                <div class="unit">
                                                    <label class="label">PASSWORD</label>
                                                    <div class="input">
                                                        <label class="icon-left" for="icon-left">
                                                            <i class="fa fa-lock"></i>
                                                        </label>
                                                        <input class="form-control" type="password" name="password" id="icon-right" placeholder="Password">
                                                    </div>
                                                     <span class="errors"><?php echo $Passworderr; ?></span>
                                                </div>
                                                <!-- end input with append icon -->

                                                <!-- start username input with append icon -->
                                                <div class="unit">
                                                    <label class="label">CONFIRM PASSWORD</label>
                                                    <div class="input">
                                                        <label class="icon-left" for="icon-left">
                                                            <i class="fa fa-lock"></i>
                                                        </label>
                                                        <input class="form-control" type="password" name="confirm-password" id="icon-right" placeholder="Confirm Password">
                                                    </div>
                                                     <span class="errors"><?php echo $Confirm_passworderr; ?></span>
                                                </div>
                                                <!-- end input with append icon -->

                                                <div class="terms">
                                                    <p class='p-10023'> By clicking Sign Up, I agree to<br /><a href='termsandcondition.php'>Terms & Condition</a> and <a href='privacypolicy.php' >Privacy Policy</a>
                                                </div>

                                                <div class="login-form-footer">
                                                    <input type="submit" class="btn-block btn btn-success" value="Sign Up" name="btn-reg">
                                                </div>

                                            </div>
                                        <!-- end /.content -->

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            <!-- </div> -->
            <?php include_once("analyticstracking.php") ?>
        </div>
  <?php require("inc/authentication/insert.inc.php"); ?> 
      
      </section>
      <?php require("inc/footer.inc.php");?>
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
<script src="js/lib/smart-resize.js"></script>
<!--Forms-->
<script src="js/lib/jquery.maskedinput.js"></script>
<script src="js/lib/jquery.validate.js"></script>
<script src="js/lib/jquery.form.js"></script>
<script src="js/lib/additional-methods.js"></script>
<script src="js/lib/j-forms.js"></script>
<!--[if lt IE 10]>
<script src="js/lib/jquery.placeholder.min.js"></script>
<![endif]-->
<!--Select2-->
<script src="js/lib/select2.full.js"></script>
<script src="js/lib/jquery.loadmask.js"></script>
<script src="js/apps.js"></script>
</body>
</php>