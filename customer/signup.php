<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Hilton sign up</title>
</head>
<body>
    <div class="signup">
        <img src="login icon.png" alt="user">
        <h1>Sign up</h1>
        <form action="process.php" method="post">
            <input type="text" placeholder="User Name" class="txt" name="UserName" required>
            <input type="email" placeholder="Email" class="txt" name="Email" required>
            <input type="password" placeholder="Password" class="txt" name="Password" required>
            <input type="password" placeholder="Confirm Password" class="txt"name="Cpass" required>
            <input type="submit" value="Create an Account" class="btn" name="btn-save">
            <a href="login.php">Already have an Account?</a>

        </form>
    </div>
    <div class="login-container">
        <form action="index.php">
            <button type="submit" class="login-container button" name="logOut">Home</button>
        </form>
    </div>
</body>
</html>
