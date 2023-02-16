

<?php
//require 'connection.php';
session_start();
    if(isset($_SESSION['email'])){
        header('location: AlreadyAdd.php');
    }
include("NavigationBar.php") 

?>

<!DOCTYPE html>
<html>
  <head>
    <style>
      /* Add some styles for a visually appealing layout */
      body {
        font-family: Arial, sans-serif;
        text-align: center;
        background-color: #f2f2f2;
      }

      h1 {
        font-size: 36px;
        margin-top: 50px;
      }

      h3 {
        font-size: 24px;
        margin-top: 30px;
      }

      h4 {
        font-size: 18px;
        margin-top: 30px;
      }

      input[type="text"],
      select {
        padding: 10px;
        font-size: 16px;
        width: 200px;
        margin-top: 20px;
      }

      label {
        font-size: 18px;
        margin-right: 10px;
      }

      button {
        background-color: blue;
        color: white;
        padding: 12px 20px;
        border-radius: 5px;
        text-decoration: none;
        margin-top: 20px;
      }

      .container {
        display: flex;
        flex-direction: column;
        align-items: center;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h1>Welcome</h1>
      <h3>We're glad you have shown interest</h3>
      <h4>Please Register your company below:</h4>

      <form method="post" action="user_registration_script.php">

      <input type="text" class="form-control" name="email" placeholder="Email" required="true">
      <br>
      <br>
      <input type="text" class="form-control" name="password" placeholder="Password" required="true">
      <br>
      <br>
      <input type="text" placeholder="Company Name" class="form-control" name="cname" required="true">
      <br>
      <br>
      <input type="text" placeholder="City" class="form-control" name="city" required="true">
      <br>
      <br>
      <input type="text" placeholder="Post Code" class="form-control" name="pcode" required="true">
      <br>
      <br>
      <label for="company">Business type:</label>
      <select name="company" required="true">
        <option value="">--- Select an Option ---</option>
        <option value="restaurant">Restaurant</option>
        <option value="General">Other</option>
        <option value="cinema">Cinema</option>
        <option value="gym">Gym</option>
      </select>
      <!-- <p>If you have a venue not listed please enter it here:</p>
      <input type="text" placeholder="Company type" class="form-control" name="company"> -->
      <br>
      <br>
      <input type="submit" class="btn btn-primary" value="Register Now">
    </form>

      <!-- <a href="SelfAudit.php" class="btn">Proceed to the Audit</a> -->
    </div>
  </body>
</html>
















