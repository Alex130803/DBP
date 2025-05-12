<?php
session_start();
require 'pages/config.php';

// Handle login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password']; // plain text za sada

    $sql = "SELECT * FROM users WHERE FName = ? AND Pswd = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password); 
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $_SESSION['admin'] = true;
        unset($_SESSION['visitor']); // očisti ako je ranije bio guest
        header("Location: pages/mainScreen.php");
        exit();
    } else {
        $error = "Invalid login.";
    }
}

// Handle guest access
if (isset($_GET['guest']) && $_GET['guest'] === 'true') {
    $_SESSION['visitor'] = true;
    unset($_SESSION['admin']); // sigurnosti radi
    header("Location: pages/mainScreen.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="loginContainer">
        <div class="loginHadder">Login</div>

        <?php if (isset($error)) echo "<p class='error-msg' style='color:red; text-align:center;'>$error</p>"; ?>

        <form method="POST">
            <div class="loginBlock">
                <div class="loginBlockText">Username:</div>
                <div class="loginBlockInput">
                    <input type="text" class="loginInput" name="username" placeholder="Enter username" required>
                </div>
            </div>

            <div class="loginBlock">
                <div class="loginBlockText">Password:</div>
                <div class="loginBlockInput">
                    <input type="password" class="loginInput" name="password" placeholder="Enter password" required>
                </div>
            </div>

            <input type="submit" id="loginSubmit" value="Login">
        </form>

        <button id="guestButton" onclick="location.href='index.php?guest=true'">Continue as Guest</button>
    </div>
</body>
</html>
