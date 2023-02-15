<?php
    $db = new SQLite3('ActionPoints.db');
    session_start();
    $email=$db->escapeString($_POST['email']);
  
    $password=$db->escapeString($_POST['password']);
   
    $user_authentication_query="select id,email, btype from company where email='$email' and pass='$password'";
    $user_authentication_result=$db->query($user_authentication_query);
    $rows_fetched=$user_authentication_result->numColumns();
    if($rows_fetched==0){
        //no user
        //redirecting to same login page
        ?>
        <script>
            window.alert("Wrong username or password");
        </script>
        <meta http-equiv="refresh" content="1;url=login.php" />
        <?php
    }else{
        $row=$user_authentication_result->fetchArray(SQLITE3_ASSOC);
        $_SESSION['id']=$row['id'];  //user id
        header("location: LoginGreeting.php?company=$email");
    }
    $db->close();
 ?>
