<?php
session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $passwordHash = hash('sha256', $password);

    $stmt = $conn->prepare("SELECT id, password, role FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($id, $hashed_password, $role);
    if ($stmt->fetch() && $hashed_password === $passwordHash) {
        $_SESSION['user_id'] = $id;
        $_SESSION['role'] = $role;
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Invalid username or password.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>

    <link rel="stylesheet" href="assets\style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="mainContainer">
        <div class="loginContainer">
            <form name="loginForm">
                <div class="loginHadder">
                    Welcome to FRD
                </div>
                <div class="loginBlock">
                    <div class="loginBlockText">
                        Please enter your email:
                    </div>
                    <div class="loginBlockInput">
                        <input class="loginInput" type="email" placeholder="example@gmail.com" required>
                    </div>
                </div>
                <div class="loginBlock">
                    <div class="loginBlockText">
                        Please enter your password:
                    </div>
                    <div class="loginBlockInput">
                        <input class="loginInput" type="password" placeholder="******************" required>
                    </div>
                </div>
                <input type="submit" value="Submit" id="loginSubmit">
                
            </form>
            <button id="guestButton">Continue as a guest</button>
        </div>
    </div>
</body>
</html>