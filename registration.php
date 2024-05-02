<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="icon" href="images/logo.png">
     <script type="text/javascript">
       function back(){
         window.location.href ="index.php";
       }
       function register(){
         window.location.href ="login.php";
       }
     </script>
     <?php
        $errmsg="";
         $name="";
         $email="";
         $regno="";
          $phoneno="";

     if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["submit"])){
     include 'dbconnect.php';
     if(isset($_POST['Name']) && isset($_POST['regno']) && isset($_POST['email']) && isset($_POST['phoneno']) && isset($_POST['password']) && isset($_POST['confirmpassword'])){
      
     $name=$_POST['Name'];
     $email=$_POST['email'];
     $regno=$_POST['regno'];
     $phoneno=$_POST['phoneno'];
     $password=$_POST['password'];
     $confirmpassword=$_POST['confirmpassword'];


   $nameregex="/^[a-z A-Z]*$/";
   if(!preg_match($nameregex, $name)){
       $errmsg="*Password should be in correct format";
   }
     else if($password!=$confirmpassword){
     $errmsg="*Password and confirm password are not same";
     }
     else{
     session_start();
   $sql="INSERT INTO `users` (`name`,`regno`,`email`,`phoneno`,`password`)VALUES ('$name','$regno','$email','$phoneno','$password')";
   $query=mysqli_query($conn,$sql);
   if($query){
    echo "<script type='text/javascript'>alert('Signup successful')</script>";
    header("Refresh:0.01;url=studentLogin.php",true,303);
   }
   else{
   $errmsg= "*Error occoured";
   }

    }
     }
     else{
       $errmsg="*All fields are required";


      }
      
     }
      ?>
   </head>
  <link rel="stylesheet" href="Registration2.css">
<body>
  <?php       session_start(); ?>


  <div class="container">
    <div class="title">Student Registration</div>
    <div class="content">
      <form action="registration.php"   method="post" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input name="Name" type="text" placeholder="Enter your name in CAPS" value="<?php echo "$name"; ?>" required pattern="[ A-Z]*">
          </div>
          <div class="input-box">
            <span class="details">ROLL No</span>
            <input type="text" placeholder="Enter your regno" name="regno" value="<?php echo "$regno"; ?>" pattern="[0-9]{6}" required>
          </div>
          
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter your email" name="email" value="<?php echo "$email"; ?>" pattern="[0-9]{6}@student.nitandhra.ac.in" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" placeholder="Enter your number" name="phoneno" value="<?php echo "$phoneno"; ?>" pattern="[0-9]{10}" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Enter your password" name="password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" placeholder="Confirm your password" name="confirmpassword" required>
          </div>

        </div>
     
        <div class="button">
          <input type="submit" value="Go Back" onclick="back()">
          <input type="submit" value="Register" name="submit" style="margin-left:85px;">
        </div>
        <span style="color:red"><?php echo $errmsg; ?></span>
      </form>
    </div>
  </div>

</body>
</html>
