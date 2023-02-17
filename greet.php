<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
  // display the navbar with the logout link
  include 'NavbarLoggedin.php';
} else {
  // display the default navbar
  include 'NavigationBar.php';
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>A HUGE Welcome From Everybody Welcome</title>
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
  <h1>You've successfully registered</h1>
  <?php 
  $comname = $_GET['company']; 
  $type = $_GET['type']; ?>
  
  <a href="testing.php?company=<?php echo $comname?>&type=<?php echo $type ?>" class="btn">Proceed to the Audit</a>



<?php require("Footer.php");?>


