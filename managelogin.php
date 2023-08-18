<?php
require_once("navbar.php");
require_once("classes.php");
$_SESSION["flag"]=false;


if (empty($_POST["email"]) or empty($_POST["password"])){
    header("location:index.php?msg=empty_fields");
     }
    else{
    $email = htmlspecialchars(trim($_POST["email"]));
    $password = md5($_POST["password"]);
  

   
$user=user::login($email,$password);


if ($email === $user->email && $password === $user->get_password()) 
{
    $_SESSION["user"]=serialize($user);
    $_SESSION["flag"]=true;
    header("location:home.php");
}else{
    
    header("location:index.php?msg=wrong_data");
}
}
require_once("footer.php");