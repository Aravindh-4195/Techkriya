<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="addEvent.css" />
    <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    include_once('dbconnect.php');
    $club = $_POST['clubname'];
    $eventName = $_POST['eventName'];
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];
    $date = $_POST['date'];
    $roomNo = $_POST['roomNo'];
    
    // Corrected SQL query
    $sql = "INSERT INTO events (`branch`, `event_name`, `event_start_time`, `event_end_time`, `event_date`, `roomNo`) VALUES ('$club', '$eventName', '$startTime', '$endTime', '$date', '$roomNo')";
    
    $connect = mysqli_query($conn, $sql);

    if ($connect) {
        echo "<script type='text/javascript'>alert ('ADDITION OF EVENT SUCCESSFUL');</script>";
        header("Location: admindashboard.php");
    } else {
        echo "<script type='text/javascript'>alert ('Addition of data unsuccessful');</script>";
        header("Refresh:0.01;url=admindashboard.php", true, 303);
    }
}
?>

  </head>
  <body>
    <form action="addEvent.php" method="post">
      <h1>ADD EVENT</h1>
      <div>
        <label for="select">CLUB NAME</label>
        <select id="select" name="clubname">
          <option value="CSEA">CSEA</option>
          <option value="MEA">AI&R</option>
        </select>
      </div>
      <div>
        <label for="eventName">EVENT NAME</label>
        <input type="text" name="eventName" placeholder="ENTER EVENT NAME" />
      </div>
      <div>
        <label for="startTime">EVENT START TIME</label
        ><input type="time" placeholder="time" name="startTime" />
      </div>
      <div>
        <label for="endTime">EVENT END TIME</label
        ><input type="time" placeholder="time" name="endTime" />
      </div>
      <div>
        <label for="date">DATE</label><input type="date" placeholder="date" name="date" />
      </div>
      <div>
        <label for="roomNo">ROOM NO</label
        ><input type="text" placeholder="ENTER ROOM NO" name="roomNo"/>
      </div>
      <input type="submit" />
    </form>
  </body>
</html>
