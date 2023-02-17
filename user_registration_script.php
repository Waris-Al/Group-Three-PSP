<?php
    //require 'connection.php';
    session_start();
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cname = $_POST['cname'];
    $city = $_POST['city'];
    $pcode = $_POST['pcode'];
    $company = $_POST['company'];
    
    $db = new SQLite3('ActionPoints.db');
    $dontAsk = rand(1, 100);
    $insert_stmt = $db->prepare("INSERT INTO company (id, email, pass, cname, city, postal, btype) VALUES ($dontAsk, :email, :password, :cname, :city, :pcode, :company)");
    $insert_stmt->bindValue(':email', $email, SQLITE3_TEXT);
    $insert_stmt->bindValue(':password', $password, SQLITE3_TEXT);
    $insert_stmt->bindValue(':cname', $cname, SQLITE3_TEXT);
    $insert_stmt->bindValue(':city', $city, SQLITE3_TEXT);
    $insert_stmt->bindValue(':pcode', $pcode, SQLITE3_TEXT);
    $insert_stmt->bindValue(':company', $company, SQLITE3_TEXT);
    $insert_result = $insert_stmt->execute();
    
    if ($insert_result) {
        echo "User successfully registered";
        $_SESSION['email'] = $email;
        $_SESSION['id'] = $db->lastInsertRowID(); 
        header("Location: greet.php?company=$cname&type=$company");
    } else {
        die("Registration failed");
    }

    $_SESSION['loggedin'] = true;
    $_SESSION['cname'] = $cname;
    $_SESSION['btype'] = $company;
    ?>