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