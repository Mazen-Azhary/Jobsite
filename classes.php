<?php

require_once("navbar.php");
class user{
public $user_id;
public $username;
public $email;
protected $password;
public $role='user';

public function __construct($username,$email,$password,$user_id) {
    $this->username = $username;
    $this->email = $email;
    $this->password=$password;
    $this->user_id=$user_id;
}


 function get_password(){
return $this->password;
}

static public function login($email, $password)
    {
        $user = null;

        $qry = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        require_once("configurations.php");
        $cn = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        
        $rslt = mysqli_query($cn, $qry);
    if($arr_user = mysqli_fetch_assoc($rslt)){

       switch ($arr_user["role"]) {
        case 'User':
            $user = new user($arr_user["username"],$arr_user["email"],$arr_user["password"],$arr_user["user_id"]);
            break;
        case 'Superadmin':
            $user = new Superadmin($arr_user["username"],$arr_user["email"],$arr_user["password"],$arr_user["user_id"]);
            break;   
        case 'recruiter':
            $user = new recruiter($arr_user["username"],$arr_user["email"],$arr_user["password"],$arr_user["user_id"]);
            break;
       }
    }
        mysqli_close($cn);
        return $user;
    }

    function show_all_job()
    { //this shows all posts in homepage
        require_once("configurations.php");
        $qry = "SELECT * FROM jobs";
        $cn = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($cn, $qry);
        $data = mysqli_fetch_all($rslt);
        mysqli_close($cn);
        return $data;
    }


    static function signup($username,$email,$password,$role){
        require_once("configurations.php");
        $query = "INSERT into users(username,email,password,role) values('$username','$email','$password','$role');";
        $connection=mysqli_connect(DB_HOST,DB_USER_NAME,DB_USER_PASSWORD,DB_NAME);
        $result=mysqli_query($connection,$query);
        return $result;
    }

function apply_for_job($user_id,$job_id,$recruiter_id){
    require_once("configurations.php");
    $qry = "INSERT into apps(applicant_id,application_time,job_id,recruiter_id) values($user_id,now(),$job_id,$recruiter_id)";
    $connection=mysqli_connect(DB_HOST,DB_USER_NAME,DB_USER_PASSWORD,DB_NAME);
    $result=mysqli_query($connection,$qry);
    mysqli_close($connection);
}
//apply this to home button 


function see_your_apps($user_id) {
    require_once("configurations.php");
    $query = "SELECT
                apps.app_id,
                apps.applicant_id,
                users_applicant.username AS applicant_name,
                apps.recruiter_id,
                users_recruiter.username AS recruiter_name,
                jobs.title AS job_title,
                apps.application_time,
                jobs.created_at AS job_creation_time,
                jobs.location,
                apps.status
            FROM apps
            JOIN users AS users_applicant ON apps.applicant_id = users_applicant.user_id
            JOIN users AS users_recruiter ON apps.recruiter_id = users_recruiter.user_id
            JOIN jobs ON apps.job_id = jobs.job_id
            WHERE apps.applicant_id = $user_id";

    $connection = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
    $result = mysqli_query($connection, $query);

    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    mysqli_close($connection);
    return $data;
}





}




class recruiter extends user{
    
public $role='recruiter';

function post_a_job($recruiter_id,$title,$company,$location,$image,$description){
    require_once("configurations.php");
$query = "INSERT into jobs(recruiter_id,title,company,location,image,description) values($recruiter_id,'$title','$company','$location','$image','$description')";
$connection = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
mysqli_query($connection, $query);
mysqli_close($connection);
}
function see_applications_for_my_jobs($recruiter_id) {
    require_once("configurations.php");
    $query = "SELECT
                apps.app_id,
                apps.applicant_id,
                users_applicant.username AS applicant_name,
                apps.recruiter_id,
                users_recruiter.username AS recruiter_name,
                jobs.title AS job_title,
                apps.application_time,
                jobs.created_at AS job_creation_time,
                jobs.location,
                apps.status
            FROM apps
            JOIN users AS users_applicant ON apps.applicant_id = users_applicant.user_id
            JOIN users AS users_recruiter ON apps.recruiter_id = users_recruiter.user_id
            JOIN jobs ON apps.job_id = jobs.job_id
            WHERE apps.recruiter_id = $recruiter_id";

    $connection = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
    $result = mysqli_query($connection, $query);

    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    mysqli_close($connection);
    return $data;
}




function accept_application($app_id){
    require_once("configurations.php");
    $connection = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
    $update_query = "UPDATE apps SET status='accepted' WHERE app_id=$app_id";
    mysqli_query($connection, $update_query);
    $select_query = "SELECT * FROM apps WHERE app_id=$app_id";
    $result = mysqli_query($connection, $select_query);
    mysqli_close($connection);
    
}

function decline_application($app_id){
    require_once("configurations.php");
    $connection = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
    $update_query = "UPDATE apps SET status='rejected' WHERE app_id=$app_id";
    mysqli_query($connection, $update_query);
    $select_query = "SELECT * FROM apps WHERE app_id=$app_id";
    $result = mysqli_query($connection, $select_query);
    mysqli_close($connection);
}

   

    



}
class Superadmin extends recruiter{
    public $role='Superadmin';
    
    function show_all_users_and_recruiters() {
        require_once("configurations.php");
        $query = "SELECT * FROM users";
                        
        $connection = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $result = mysqli_query($connection, $query);
    
        $data = array(); // Initialize an array to store the retrieved data
    
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row; // Append each row to the data array
        }
    
        mysqli_close($connection);
    
        return $data;
    }
    
    
    
    
    function ban($id, $username){
        require_once("configurations.php");
        $connection = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
    
        // Temporarily disable foreign key checks
        mysqli_query($connection, "SET FOREIGN_KEY_CHECKS=0");
    
        // Use proper escaping to prevent SQL injection
        $id = mysqli_real_escape_string($connection, $id);
        $username = mysqli_real_escape_string($connection, $username);
    
        // Delete jobs and applications by the recruiter
        $delete_jobs_query = "DELETE FROM jobs WHERE recruiter_id = $id";
        mysqli_query($connection, $delete_jobs_query);
    
        // Set job_id to null in apps records related to the banned user
        $set_null_query = "UPDATE apps SET job_id = NULL WHERE applicant_id = $id";
        mysqli_query($connection, $set_null_query);
    
        // Delete applications by the user
        $delete_applications_query = "DELETE FROM apps WHERE applicant_id = $id";
        mysqli_query($connection, $delete_applications_query);
    
        // Delete recruiter-related apps
        $delete_recruiter_apps_query = "DELETE FROM apps WHERE recruiter_id = $id";
        mysqli_query($connection, $delete_recruiter_apps_query);
    
        // Finally, delete the user
        $delete_user_query = "DELETE FROM users WHERE user_id = $id AND username = '$username'";
        mysqli_query($connection, $delete_user_query);
    
        // Re-enable foreign key checks
        mysqli_query($connection, "SET FOREIGN_KEY_CHECKS=1");
    
        mysqli_close($connection);
    }

    
    
    
    
    
    function show_all_apps() {
        require_once("configurations.php");
        $query = "SELECT
                    apps.app_id,
                    apps.applicant_id,
                    users_applicant.username AS applicant_name,
                    apps.recruiter_id,
                    users_recruiter.username AS recruiter_name,
                    jobs.title AS job_title,
                    apps.application_time,
                    jobs.created_at AS job_creation_time,
                    jobs.location,
                    apps.status
                FROM apps
                JOIN users AS users_applicant ON apps.applicant_id = users_applicant.user_id
                JOIN users AS users_recruiter ON apps.recruiter_id = users_recruiter.user_id
                JOIN jobs ON apps.job_id = jobs.job_id";
    
        $connection = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $result = mysqli_query($connection, $query);
    
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    
        mysqli_close($connection);
        return $data;
    }
    
    
    
}

require_once("footer.php");