<?php
require_once("navbar.php");
require_once("classes.php");
$user =  unserialize($_SESSION["user"]);

// var_dump($_POST);
if (empty($_POST["description"]) || empty($_FILES["image"])) 
{
    header("location:home.php?erorr=empty_field");
}
elseif($user->role=='recruiter' or $user->role=='Superadmin'){
    $description = htmlspecialchars( trim($_POST["description"]));
    
    $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
    
    $file_name = "job_images/".date("YmdHis").".".$file_extension;
    $user_id = $user->user_id;
    move_uploaded_file($_FILES["image"]["tmp_name"],$file_name);
  
    
    $rslt = $user->post_a_job($user_id,$_POST["title"],$_POST["company"],$_POST["loc"],$file_name,$description); 
    header("location:home.php?msg=done");
}else{
    header("location:home.php?erorr=User_not_admin");
    // $recruiter_id,$title,$company,$location
}