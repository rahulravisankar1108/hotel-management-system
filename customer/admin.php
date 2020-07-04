<?php
    session_start();
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>Hilton home</title>
</head>
    <body>
        <div class="book">
            <form action="process3.php" method="post">
                <span> <?php echo ("Hello   ".$_SESSION['UserName']."!"."   ")?>     Welcome to Hilton...</span>
                <input type="submit" value="Book Table" class="btn1" name="BookTable">
                <input type="submit" value="Book Room" class="btn2" name="BookRoom">
            </form>
        </div>

        <div class="login-container">
            <form action="login.php" method="post">
                <button type="submit" class="login-container button" name="logOut">Log Out</button>
            </form>
            <form action="index.php" method="post">
                <button type="submit" class="login-container button" name="Home">Home</button>
            </form>
            <form action="mybookings.php" method="post">
                <button type="submit" class="login-container button" name="My Bookings">My Bookings</button>
            </form>
            <form action="myprofile.php" method="post">
                <button type="submit" class="login-container button" name="MyProfile">My Profile</button>
            </form>
        </div>
    </body>
</html>
