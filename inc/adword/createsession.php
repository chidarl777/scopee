<?php
session_start();
$_SESSION["ads"] = $_POST["name"];
print $_SESSION["name"]; // What will be passed to Javascript "alert" command.
?>