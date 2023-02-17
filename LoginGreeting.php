<?php
session_start(); // start the session
  
function getQNos() {
  $email = $_GET['company'];
  $db = new SQLite3('ActionPoints.db');
  $stmt = $db->prepare("SELECT cname, btype FROM company WHERE email = '$email'");
  $result = $stmt->execute();

  $arrayResult = [];
  while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
      $arrayResult = $row;
  }
  return $arrayResult;
}
$result = getQNos();
$_SESSION['cname'] = $result['cname'];
$_SESSION['btype'] = $result['btype'];

$test = $result['cname'];
$test2 = $result['btype'];


$_SESSION['loggedin'] = true; // set the 'loggedin' variable to true

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
  <h1>Your have successfully Logged In!</h1>
  
  <a href="CheckVenue.php" class="btn">Proceed to Check the Venue</a> 


  <a href="testing.php?company=<?php echo $test?>&type=<?php echo $test2 ?>" class="btn">Proceed to Audit</a> 



<?php
require("Footer.php");?>


