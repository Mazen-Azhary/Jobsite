<?php
require_once("navbar.php");
?>
<body>
  <style>
    *{
color: white;
    }
  </style>
    <div class="login-box">
    <?php
          if ( !empty($_GET["msg"]) && $_GET["msg"] == 'empty_field') {
          ?>
            <div class="alert alert-warning" role="alert">
              <strong>Alert</strong> empty field
            </div>
          <?php
          }
          ?>
          <?php
          if ( !empty($_GET["msg"]) && $_GET["msg"] == 'wrong_data') {
          ?>
            <div class="alert alert-danger" role="alert">
              <strong>Alert</strong> wrong data
            </div>
          <?php
          }
          ?>
          <?php
          if ( !empty($_GET["msg"]) && $_GET["msg"] == 'Cpw') {
          ?>
            <div class="alert alert-danger" role="alert">
              <strong>Alert</strong> password doesn't equal confirm pw
            </div>
          <?php
          }
          ?>
        <h2>Signup</h2>
        <form action="managesignup.php" method="POST">
            <div class="user-box">
                <input type="text" name="name" required="TRUE">
                <label>Name</label>
            </div>
            <div class="user-box">
                <input type="email" name="email" required="TRUE">
                <label>Email</label>
            </div>
            <div class="user-box">
                <input type="password" name="password" required="TRUE">
                <label>Password</label>
            </div>
            <div class="user-box">
                <input type="password" name="cpassword" required="TRUE">
                <label>Confirm Password</label>
            </div>
            <div class="user-box">
              
            user
    <input type="radio" name="role" required="TRUE" value="User" style="color: white;" checked>
    <input type="radio" name="role" required="TRUE" value="recruiter" style="color:white;">recruiter
</div>


            <input type="submit" value="Submit">
        </form>
        <br>
        <br>
        <h2>if you have an account <a href="index.php">sign in</a></h2>
    </div>



<?php
require_once("footer.php");


