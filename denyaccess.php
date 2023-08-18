<?php
require_once("navbar.php");
if($_SESSION["flag"]==false){
header("location:accessdenied.php");
}
?>