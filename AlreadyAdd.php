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
  <h1>You are Already Registered with given email!</h1>
  
  <a href="logout.php" class="btn">Log out</a> 



<?php require("Footer.php");?>

