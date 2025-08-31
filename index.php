<?php
require_once("navbar.php");
?>
<body>
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
        <h2>Login</h2>
        <form action="managelogin.php" method="POST">
            <div class="user-box">
                <input type="email" name="email" required="TRUE">
                <!-- <label>Email</label> -->
            </div>
            <div class="user-box">
                <input type="password" name="password" required="TRUE">
                <!-- <label>Password</label> -->
            </div>
            <input type="password" name="flag" value="false" hidden>
            <input type="submit" value="Submit">
        </form>
        <br>
        <br><?php
require_once("navbar.php");
?>
<body>
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
        <h2>Login</h2>
        <form action="managelogin.php" method="POST">
            <div class="user-box">
                <input type="email" name="email" required="TRUE">
                <label>Email</label>
            </div>
            <div class="user-box">
                <input type="password" name="password" required="TRUE">
                <label>Password</label>
            </div>
            <input type="password" name="flag" value="false" hidden>
            <input type="submit" value="Submit">
        </form>
        <br>
        <br>
        <h2>if u don't have an account <a href="signup.php">signup</a></h2>
    </div>
<?php
require_once("footer.php"); 
?>
        <h2>if u don't have an account <a href="signup.php">signup</a></h2>
    </div>
<?php
require_once("footer.php"); 
?>

