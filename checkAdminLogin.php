<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Connect to database using PDO

    try {
        $conn = new PDO("sqlsrv:server = tcp:access4all.database.windows.net,1433; Database = ActionPoints", "groupthreeadmin", "%Pa55w0rd");
  
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare and execute the query using bound parameters
        $stmt = $conn->prepare("SELECT username, password FROM Admin WHERE username=:username AND password=:password");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            // Invalid login, redirect to login page with error message
            $_SESSION['error_message'] = "Wrong username or password";
            header("Location: AdminLogin.php");
            exit();
        } else {
            // Valid login, set session variables and redirect to greeting page
            $_SESSION['id'] = $result['id'];
            header("Location: QuestionUpdater.php");
            exit();
        }

    } catch(PDOException $e) {
        // Database connection error, redirect to error page
        $_SESSION['error_message'] = "Failed to connect to database: " . $e->getMessage();
        header("Location: error.php");
        exit();
    }
}
?>
