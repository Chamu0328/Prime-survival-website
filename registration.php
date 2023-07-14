<?php
  session_start();

  include("db.php");

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    $firstname = $_POST['Fname'];
    $lastname = $_POST['Lname'];
    $username = $_POST['Username'];
    $dob = $_POST['DOB'];
    $email = $_POST['Email'];
    $password = $_POST['password'];

    if(!empty($email) && !empty($password) && !is_numeric($email))
    {
      $query = "insert into user (Fname, Lname, Username, DOB, Email, password) 
      values ('$firstname','$lastname','$username','$dob','$email','$password')";

      mysqli_query($con, $query);

      echo "<script type = 'text/javascript'> alert ('Successfully Register')</script>";
    }
    else
    {
      echo "<script type = 'text/javascript'> alert (' Please enter valid information')</script>";
    }

  }

?>







<!DOCTYPE html>
<html>
<head>
  <title>Registration Form</title>
  <link rel="stylesheet" type="text/css" href="css/form.css">
</head>
<body>
  <div class="container">
    <h1>Registration Form</h1>
    <form id="registration-form" method="POST">
      <div class="form-group">
        <label for="username">First name:</label>
        <input type="text" name="Fname" required>
      </div>
      <div class="form-group">
        <label for="username">Last Name :</label>
        <input type="text" name="Lname" required>
      </div>
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" name="Username" required>
      </div>
      <div class="form-group">
        <label for="dob">Date of Birth:</label>
        <input type="date" name="DOB" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="Email" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" required>
      </div>
      <div class="form-group">
        <input type="submit" value="Register">
      </div>
    </form>
    <p>Already have an account? <a href="index.php" id="login-link">Login</a></p>
  </div>

  <script src="js/script.js"></script>
</body>
</html>
