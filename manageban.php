<?php
require_once("navbar.php");
require_once("denyaccess.php");
require_once("configurations.php");
require_once("classes.php");
$user = unserialize($_SESSION["user"]);
$banned_user_id = $_GET['user_id'];
$banned_username = $_GET['username'];
$user->ban($banned_user_id, $banned_username);
header("location:home.php?msg=done");
?>
