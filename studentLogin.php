<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="studentlogin.css">
  <title>Document</title>
  <?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
      session_start();
      $username=$_POST['studentId'];
      $password=$_POST['password'];
      include_once('dbconnect.php');
      $sql= "SELECT * FROM users WHERE email = '$username' AND password = '$password' ";
      $connect=mysqli_query($conn,$sql);
      $check=mysqli_fetch_array($connect);
      if(isset($check)){
        $_SESSION['username']=$username;
        header ('Location: events.php ');
      }
      else{
        echo "<script type='text/javascript'>alert ('username and password not matched (or) username is invalid');</script>";
        header("Refresh:0.01;url=studentLogin.php",true,303);
      }
    }
  ?>
</head>
<body>
  <form action="studentLogin.php" method="POST">
    <h1>Student login</h1>
    <p>*To View or Register events you must login to the Fest</p>
    <div>
      <label>STUDENT EMAIL</label>
      <input type="email" placeholder="enter the student college email" name="studentId">
</div>
<div>
      <label>PASSWORD</label>
      <input type="password" placeholder="enter the password" name="password">
</div>
<input type="submit">
<div>
    <label for="signup" id="signup">IF YOU ARE NEW! WELCOME <a href="registration.php">SIGN UP</a></label>
</div>
  </form>
</body>
</html>s