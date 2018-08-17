<!DOCTYPE html>
<html>

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-route.js"></script>
<body ng-app="myApp">

<div ng-view></div>
<?php
try{
	

echo '
<script>
var app = angular.module("myApp", ["ngRoute"]);
app.config(function($routeProvider) {
    $routeProvider
    .when("/", {
        templateUrl : "homepage.php"
    })
    .when("/login", {
        templateUrl : "login.php"
    })
    .when("/registration", {
        templateUrl : "registration.php"
    })
    .when("/contactus", {
        templateUrl : "contactus.php"
    })
    .when("/howitworks", {
        templateUrl : "howitworks.php"
    })
    .when("/termsandcondition", {
        templateUrl : "termsandcondition.php"
    })
    .when("/privacypolicy", {
        templateUrl : "privacypolicy.php"
    })
    .when("/home", {
        templateUrl : "home.php"
    })
    .when("/friends", {
        templateUrl : "friends.php"
    })
    .when("/createworld", {
        templateUrl : "createworld.php"
    })
    .when("/settings", {
        templateUrl : "settings.php"
    })
    .when("/sendsms", {
        templateUrl : "sendsms.php"
    })
    .when("/refillwallet", {
        templateUrl : "refillwallet.php"
    })
    .when("/moreworlds", {
        templateUrl : "moreworlds.php"
    })
    .when("/worldcategory/", {
     templateUrl : "worldcategory.php"
		}
    .when("/aboutus", {
        templateUrl : "aboutus.php"
    });
});

</script>
';
	}
	catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
?>
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
</html>
