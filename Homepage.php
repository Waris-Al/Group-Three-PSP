<?php
session_start();
include("NavigationBar.php");

?>

<!DOCTYPE html>
<html>
<head>
  <title>A HUGE Welcome From Access For All</title>
  <style>
    /* Add styles for a visually appealing homepage */
    body {
      font-family: Arial, sans-serif;
      text-align: center;
      background-color: #f2f2f2;
    }

    h1 {
      font-size: 36px;
      margin-top: 50px;
    }

    .btn {
      background-color: #4285F4;
      border-radius: 40px;
      color: #fff;
      padding: 12px 20px;
      border-radius: 5px;
      text-decoration: none;
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <h1>A HUGE Welcome From Access For All</h1>
  <p>We are committed to creating a welcoming environment for everyone, including those with accessibility needs. </p>
  <!-- <a href="details.php" class="btn">Proceed to the Audit</a> -->

  <a href="Login.php" class="btn">Sign In</a>
  <a href="details.php" class="btn">Register</a>
  <br>
  <br>
  <a href="CheckVenue.php" class="btn">Check a Location</a>
  <br>
  <br>
  <br>
</body>
</html>



<?php require("Footer.php");?>


