<?php
require_once("navbar.php");
require_once("classes.php");
if (empty($_POST["email"]) or empty($_POST["password"]) or empty($_POST["name"]) or empty($_POST["cpassword"])) {
    header("location:signup.php?msg=empty_field");
}

elseif ($_POST["password"] != $_POST["cpassword"]){
    header("location:signup.php?msg=Cpw");
}else {
    $name=$_POST["name"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $role=$_POST["role"];
    user::signup($name,$email,md5($password),$role);
    header("location:index.php");
    
} 




require_once("footer.php");