<?php
  session_start();

  include("db.php");

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    $email = $_POST['Email'];
    $password = $_POST['password'];


    if(!empty($email) && !empty($password) && !is_numeric($email))
    {
      $query = "select *from user where email = '$email' limit 1 ";
      $result = mysqli_query($con, $query);

      if($result)
      {
        if($result && mysqli_num_rows($result) > 0 )
        {
          $user_data =  mysqli_fetch_assoc($result);

          if ($user_data['password'] == $password)
          {
            header("location: home.html");//landing.php
            die;
          }
        }
      }

      echo "<script type = 'text/javascript'> alert (' Wrong Username or Password')</script>";
    }
    else
    {
      echo "<script type = 'text/javascript'> alert (' Wrong Username or Password')</script>";
    }
  }

?>


<!DOCTYPE html>
<html>
<head>
  <title>Login Form</title>
  <link rel="stylesheet" type="text/css" href="css/form.css">
</head>

<body>
    <div class="container">
      <h1>Login Form</h1>
      <form id="registration-form" method ="POST">
        
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" name="Email" required>
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" name="password" required>
        </div>
        <div class="form-group">
          <input type="submit" value="Login">
        </div>
      </form>
      <p>Dont have an account? <a href="registration.php" id="login-link">Register</a></p>
    </div>
  
    <script src="js/script.js"></script>
  </body>