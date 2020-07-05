<?php
    session_start();
    require_once('connection.php');
    $UserName=$_SESSION['UserName'];
    $UserID=$_SESSION['UserID'];
    $Emailquery="SELECT * from login WHERE UserID = '$UserID' ";
    $Emailq = mysqli_query($con,$Emailquery);
    $Emailqu=mysqli_fetch_assoc($Emailq);
    $Email=$Emailqu['Email'];
    
    if(isset($_POST['del-room-btn']))
    {
        $keyy = $_POST['keyy'];

        $check = mysqli_query($con,"SELECT * FROM bookroom WHERE bookID = '$keyy' ") or die("Not Found".mysqli_error());
        if(mysqli_num_rows($check) > 0)
        {
            $queryDelete = mysqli_query($con,"DELETE FROM bookroom WHERE bookID = '$keyy' ") or die("Not Deleted!".mysqli_error());
            $to=$Email;
            $subject = 'Booking cancelled from HILTON CHENNAI !';
            $message = 'Dear '.$UserName.','."\n\n"."\n\n".'Your Room with  ID:'.$keyy.'  has been deleted successfully'."\n\n\n".'Lets stay in touch.'."\n"."\n".'Hope we see you soon at our heaven...'."\n"."\n"."\n".'With regards,'."\n".'HILTON MANAGER'."\n".'GUINDY  CHENNAI';
            $headers = 'From:rahulravisankarr@gmail.com\r\n'; // Sender's Email
    
            if(mail($to, $subject, $message, $headers))
            {
                echo '<script> alert("Booking was deleted successfully!\nMail sent to your registered Email ID");window.location="mybookings.php" </script>';
            }
            else{
                echo '<script> alert("Booking was deleted successfully\nFailed to send mail to your registered Email ID");window.location="mybookings.php" </script>';
            }

        }
        else
        {
            echo '<script> alert("Booking does Not exist");window.location="mybookings.php" </script>';
        }

    }
?>