<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="event.css" />
    <title>Events</title>
    <link rel="icon" href="images/techkriya.webp" type="image/x-icon" />
    <?php
    include_once('dbconnect.php');
    if (session_status() === PHP_SESSION_NONE) {
      session_start();
  }
   $user= $_SESSION['username'];
   ?>
    
  </head>
  <body>
    <div id="eventMain">
      <div id="note">
        <p>SELECT THE FOLLOWING CLUBS TO PARTICIPATE IN THEIR EVENTS</p>
      </div>
      <div id="events">
      <a href="viewEvents.php?clubname=<?php echo 'CSEA' ?>&user=<?php echo $user?>"><div class="event a"></div></a>
      <a href="viewEvents.php?clubname=<?php echo 'AI&R' ?>&user=<?php echo $user?>">  <div class="event b"></div></a>
        <div class="event c"></div>
        <div class="event d"></div>
        <div class="event e"></div>
        <a href="viewEvents.php?clubname=<?php echo 'MEA' ?>&user=<?php echo $user?>"><div class="event f"></div></a>
        <div class="event g"></div>
        <div class="event h"></div>
        <div class="event i"></div>
        <div class="event j"></div>
        <div class="event k"></div>
        <div class="event l"></div>
        <div class="event m"></div>
        <div class="event n"></div>
        <div class="event o"></div>
        <div class="event p"></div>
        <div class="event q"></div>
        <div class="event r"></div>
        <div class="event s"></div>
        <div class="event t"></div>
      </div>
    </div>
  </body>
</html>
