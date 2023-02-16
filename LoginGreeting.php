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
  <h1>Your have successfully Logged In!</h1>
  
  <a href="CheckVenue.php" class="btn">Proceed to Check the Vanue</a> 
  
  <?php 
  
  function getQNos()
{
  $email = $_GET['company'];
  $db = new SQLite3('C:\xampp\htdocs\Group-Three-PSP\ActionPoints.db');
  $stmt = $db->prepare("SELECT btype FROM company WHERE email = '$email'");
  $result = $stmt->execute();
  
  $arrayResult = [];
  while ($row = $result->fetchArray())
  {
      $arrayResult [] = $row;
  }
  return $arrayResult;
}
$first_element = reset(getQNos(['btype'])[0]); 
$test =  (implode(',', array($first_element))); 
  
  ?>

  <a href="testing.php?company=<?php echo $test?>&comname=<?php echo $_GET['company'] ?>" class="btn">Proceed to Audit</a> 



<?php
require("Footer.php");?>


