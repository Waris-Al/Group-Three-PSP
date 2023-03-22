
<?php


?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <style>
    .form-control {
      border-radius: 40px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      font-size: 18px;
      height: 60px;
      padding-left: 30px;
      width: 100%;
    }
    
    .form-group {
      margin-bottom: 40px;
    }
    
    .form-label {
      font-size: 18px;
      font-weight: 600;
    }
    
    .btn-primary {
      background-color: #4285F4;
      border-radius: 40px;
      color: #fff;
      font-size: 18px;
      font-weight: 600;
      height: 60px;
      letter-spacing: 2px;
      text-transform: uppercase;
      width: 100%;
    }
    
    .form-check-input {
      margin-right: 10px;
    }
    
    .form-check-label {
      font-size: 16px;
      font-weight: 400;
    }
  </style>
</head>

<body class="bg-light">
  <header>
    <?php include("NavigationBar.php"); ?>
  </header>
  <div class="container h-100 d-flex justify-content-center align-items-center" style="position:relative; top:120px;">
  <form action="checkAdminLogin.php" method="POST" autocomplete="off">
    <div class="form-group">
      <label class="form-label" for="Username1">Username</label>
      <input type="text" id="Username1" class="form-control" name="username" required>
    </div>
    <div class="form-group">
      <label class="form-label" for="Password1">Password</label>
      <input type="password" id="Password1" class="form-control" name="password" required>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Login</button>
    </div>
  </form>
</div>



<?php require("Footer.php");?>