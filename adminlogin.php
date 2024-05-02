<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="adminlogin.css">
  <title>Document</title>
  <?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
      session_start();
      $username=$_POST['adminId'];
      $password=$_POST['password'];
      include_once('dbconnect.php');
      $sql= "SELECT * FROM admin WHERE username = '$username' AND password = '$password' ";
      $connect=mysqli_query($conn,$sql);
      $check=mysqli_fetch_array($connect);
      if(isset($check)){
        $_SESSION['username']=$username;
        header ('Location: admindashboard.php  ');
      }
      else{
        echo "<script type='text/javascript'>alert ('username and password not matched (or) username is invalid');</script>";
        header("Refresh:0.01;url=login.php",true,303);
      }
    }
  ?>
</head>
<body>
  <form action="adminlogin.php" method="POST">
    <h1>admin login</h1>
    <div>
      <label>ADMIN ID</label>
      <input type="text" placeholder="enter the admin id" name="adminId">
</div>
<div>
      <label>PASSWORD</label>
      <input type="password" placeholder="enter the password" name="password">
</div>
<input type="submit">
  </form>
</body>
</html>