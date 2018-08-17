<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-route.js"></script>

<body ng-app="myApp">

<p><a href="#/!">Main</a></p>

<a href="#!london">City 1</a>
<a href="#!paris">City 2</a>

<p>Click on the links.</p>

<p>Note that each "view" has its own controller which each gives the "msg" variable a value.</p>

<div ng-view></div>

<script>
var app = angular.module("myApp", ["ngRoute"]);
app.config(function($routeProvider) {
    $routeProvider
    .when("/", {
        templateUrl : "index.php"
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
    .when("/aboutus", {
        templateUrl : "aboutus.php"
    });
});

</script>

</body>
</html>