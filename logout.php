<?php
session_start();
    session_unset();
    session_destroy();
?>
<?php require ("NavigationBar.php"); ?>

<!DOCTYPE html>
<html>
    <head>
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center align-items-center" style="height: 100vh;">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-primary text-white">Logged Out</div>
                        <div class="card-body">
                            <p class="card-text">You have been logged out. <a href="login.php">Login again.</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

<?php require("Footer.php");?>
