<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Hilton login</title>
</head>
<body>

    <div class="login-container">
            <form action="index.php">
                <button type="submit" class="login-container button" name="logOut">Home</button>
            </form>
    </div>

    <div class="signup">
        <img src="login icon.png" alt="user">
        <h1>Login</h1>
        <form action="process2.php" method="post">
            <input type="text" placeholder="User Name or Email" class="txt" name="UserName" required>
            <input type="password" placeholder="Password" class="txt" name="Password" required>
            <input type="submit" value="Login" class="btn" name="btn-login">
            <a href="signup.php">Don't have an Account?</a>  
        </form>
    </div>
</body>
</html>

