
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <link rel="icon" href="../images/logo.png">
    <meta charset="utf-8">
    <title></title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="viewEvents.css" rel="stylesheet">
    <?php
      if ($_SERVER['REQUEST_METHOD']=='POST'){
        require_once('dbconnect.php');
        session_start();
        $eventReg=$_POST['eventReg'];
        $user = $_GET['user'];
        $sql = "INSERT INTO regestered_students (email, event_name) VALUES ('$user', '$eventReg')";
        $connect=mysqli_query($conn,$sql);
        if($connect){
          echo "<script type='text/javascript'>alert('you are registered for the event successfully! WE hope you enjoy a lot')</script>";
          header("Refresh:0.01;url=events.php",true,303);
         }
         else{
         $errmsg= "*Error occoured";
         }
      }
    ?>
  </head>
  <body>
<?php  $club=$_GET['clubname'];
$user=$_GET['user'];
?> 


<table>
<thead>
  <!-- <tr>
    <th style="text-align: center;" colspan="6">Male</th>
  </tr> -->
  <tr>
    <th>EVENT</th>
    <th>DATE</th>
    <th>START TIME</th>
    <th>END TIME</th>
    <th>ROOM NO</th>
  </tr>
</thead>
<tbody>
<?php
  include_once('dbconnect.php');
  $sql="SELECT * from events where branch='$club'";
  $query=mysqli_query($conn,$sql);
  ?>
  <form action="viewEvents.php?user=<?php echo $user?>" method="POST">
  <?php
  while($rows=mysqli_fetch_assoc($query))
  {
  ?>
  <tr> 
<td><input type="checkbox" value="<?php echo $rows['event_name']?>" name="eventReg"></td>
<td><?php echo $rows['event_name']; ?></td>  
 <td><?php echo $rows['event_date']?></td>
 <td><?php echo $rows['event_start_time']?></td>
 <td><?php echo $rows['event_end_time']?></td>
 <td><?php echo $rows['roomNo']?></td>

  </tr>
  <?php
  }
  ?>
</tbody>
</table>

  <input type="submit">
</form>

  </body>
</html>