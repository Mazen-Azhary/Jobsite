<?php
require_once("navbar.php");
require_once("denyaccess.php");
require_once("configurations.php");
require_once("classes.php");
$user = unserialize($_SESSION["user"]);

// Check if both job_id and recruiter_id are present in the URL
if(isset($_GET["job_id"]) && isset($_GET["recruiter_id"])) {
    $job_id = $_GET["job_id"];
    $recruiter_id = $_GET["recruiter_id"];
    
    // Now you can use both $job_id and $recruiter_id in your code
    if ($user->role == 'recruiter' or $user->role == 'Superadmin' ) {
        header("location:home.php");
    } else {
        $user->apply_for_job($user->user_id, $job_id, $recruiter_id);
        header("location:home.php?msg=done");
    }
}
?>
