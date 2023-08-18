<?php
require_once("navbar.php");
require_once("denyaccess.php");
require_once("configurations.php");
require_once("classes.php");
$user = unserialize($_SESSION["user"]);
if(!empty($_GET["desiredid"])){
$desired_id=$_GET["desiredid"];
$user->accept_application($desired_id);
header("location:home.php?msg=done");
}else{
    header("location:home.php");
}