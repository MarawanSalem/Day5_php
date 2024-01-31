<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <?php
      @include 'config.php';
      $name = '';
      $email = '';
      $pass = '';      
      $nameErr='';
      $emailErr = '';
      $passErr='';
      $confirmPassErr = '';

      if(isset($_POST['signup-submit'])){
          $username = $_POST['username'];
          if(empty($username)){
            $nameErr1 = "Username is required";
          }
          
            $useremail = $_POST['useremail'];
            if (empty($useremail)) {
                $emailErr = "Email is required";
            } else {
                $checkEmailQuery = "SELECT * FROM signup WHERE useremail = '$useremail'";
                $checkEmailResult = mysqli_query($connection, $checkEmailQuery);

                if (mysqli_num_rows($checkEmailResult) > 0) {
                    $emailErr = "Email is already in use";
                }
    }
          $userpassword = $_POST['userpassword'];
          if(empty($userpassword)){
            $passErr = "Password is required";
          }
          $confirmPassword = $_POST['userpass2'];
          if (empty($confirmPassword)) {
              $confirmPassErr = "Please confirm the password";
          } elseif ($userpassword !== $confirmPassword) {
              $confirmPassErr = "Passwords do not match";
          }
            $name = $_POST['username'];
            $email = $_POST['useremail'];
            $pass = $_POST['userpassword'];
    
        if (empty($nameErr) && empty($emailErr) && empty($passErr) && empty($confirmPassErr)) {

            $query = 'INSERT INTO signup(username, useremail, userpassword) VALUES
            ("'.$_POST['username'].'", "'.$_POST['useremail'].'", "'.$_POST['userpassword'].'")';
    
            $result = mysqli_query($connection, $query);
            if($result) {
              header ("Location: login.php");
              exit();
            }
            else {
              echo "Error";
            }
          
        }
      
        }
      
  ?>
    <div class="container">
        <form method="POST">
            <h2 class="mb-2 fw-bold">Sign Up</h2>
            <div class="mb-3">
              <label for="text" class="form-label">Username</label>
              <input type="text" class="form-control" id="username" name="username" value="<?php echo "$name" ?>">
              <span style='color:red;'><?php echo "$nameErr" ?></span>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" name="useremail" value="<?php echo "$email" ?>">
              <span style='color:red;'><?php echo "$emailErr" ?></span>

            </div>
            <div class="mb-3">
              <label for="password1" class="form-label">Password</label>
              <input type="password" class="form-control" id="password1" name="userpassword">
              <span style='color:red;'><?php echo "$passErr" ?></span>

            <div class="mb-3">
                <label for="password2" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password2"  name="userpass2">
                <span style='color:red;'><?php echo "$confirmPassErr" ?></span>

              </div>
            <div class="text-center">
            <input type="submit" class="btn btn-danger" value="Submit" name="signup-submit">
            <p>Already have an account? <a href="login.php">Login</a></p>
        </div>
          </form>
    </div>
  
</body>
</html>