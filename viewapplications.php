<?php
// For loop on apps,join the tables and use the .hidden in rejected apps (optional)
require_once("navbar.php");
require_once("denyaccess.php");
require_once("configurations.php");
require_once("classes.php");
$user = unserialize($_SESSION["user"]);
switch ($user->role) {
    case 'user':
        $apps= $user->see_your_apps($user->user_id);
        break;
    case 'Superadmin':
            $apps= $user->show_all_Apps();
            break;
    case 'recruiter':
            $apps= $user->see_applications_for_my_jobs($user->user_id);
            break;
    default:
                header("location:home.php");
        break;
    }
    ?>
<style>@import url(https://fonts.googleapis.com/css?family=Open+Sans:400,600);

*, *:before, *:after {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  background: #105469;
  font-family: 'Open Sans', sans-serif;
}
table {
  background: #012B39;
  border-radius: 0.25em;
  border-collapse: collapse;
  margin: 1em;}
th {
  border-bottom: 1px solid #364043;color: #E2B842;font-size: 0.85em;font-weight: 600;padding: 0.5em 1em;text-align: left;}
td {color: #fff;font-weight: 400;padding: 0.65em 1em;}
.disabled td {color: #4F5F64;}
.accepted td {color: #22FF33;}
tbody tr {transition: background 0.25s ease;}
tbody tr:hover {background: #014055;}</style>
<center> 
<table style="height: 75px">
  <thead>
    <tr>
    <?php  
    if($user->role=='recruiter' or $user->role=='Recruiter'){
    ?>
      <th></th>
      <th></th>
<?php
    }
      ?>



      <th>App_ID</th>
      <th>Applicant_ID</th>
      <th>Applicant's name</th>
      <th>Recruiter_ID</th>
      <th>Recruiter's Name</th>
      <th>Jobtitle</th>
      <th>Application time</th>
      <th>Location</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($apps as $app) {
      $rowClass = ''; // Initialize the row class

      // Check the status and assign appropriate row class
      if ($app["status"] === "rejected") {
          $rowClass = 'disabled';
      } elseif ($app["status"] === "accepted") {
          $rowClass = 'accepted';
      }
    ?>
      <tr class="<?=$rowClass?>">
      <?php  
    if($user->role=='recruiter' or $user->role=='Recruiter'){
    ?>
      <td><a name="" id="" class="btn btn-success" href="ManageAcceptApp.php?desiredid=<?=$app["app_id"]?>" role="button">Accept</a></td>
      <td><a name="" id="" class="btn btn-danger" href="ManageRejectApp.php?desiredid=<?=$app["app_id"]?>" role="button">Reject</a></td>
      
<?php
    }
      ?>
        <td><?=$app["app_id"] ?></td>
        <td><?=$app["applicant_id"] ?></td>
        <td><?=$app["applicant_name"] ?></td>
        <td><?=$app["recruiter_id"] ?></td>
        <td><?=$app["recruiter_name"] ?></td>
        <td><?=$app["job_title"] ?></td>
        <td><?=$app["application_time"] ?></td>
        <td><?=$app["location"] ?></td>
        <td><?=$app["status"] ?></td>
      </tr>
    <?php
    }
    ?>
  </tbody>
</table>



  </tbody>
</table>
<a name="" id="" class="btn btn-primary" href="home.php" role="button">Back to home</a>
</center>