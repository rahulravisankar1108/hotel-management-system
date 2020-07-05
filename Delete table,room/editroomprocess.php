<?php
    session_start();
    require_once('connection.php');
    $UserName=$_SESSION['UserName'];
    $UserID=$_SESSION['UserID'];
    $Emailquery="SELECT * from login WHERE UserID = '$UserID' ";
    $Emailq = mysqli_query($con,$Emailquery);
    $Emailqu=mysqli_fetch_assoc($Emailq);
    $Email=$Emailqu['Email'];
    if(isset($_POST['btn-update']))
    {
        $roomtype = $_POST['roomtype'];
        $timings = $_POST['timings'];
        $checkin = $_POST['checkin'];
        $checkout = $_POST['checkout'];
        $rooms = $_POST['rooms'];
        $adults = $_POST['adults'];
        $children = $_POST['children'];
        $typeac = $_POST['typeac'];
        $withfood = $_POST['withfood'];
        $bookIDR=$_SESSION['bookIDR'];
        {
            $sql = "UPDATE bookroom SET roomtype='$roomtype',timings='$timings',checkin='$checkin',checkout='$checkout',rooms='$rooms',adults='$adults',children='$children',typeac='$typeac',withfood='$withfood' WHERE bookID = '$bookIDR' ";
            $result = mysqli_query($con,$sql);
            if($result)
            {
                $to=$Email;
                $subject = 'UPDATION SUCCESSFULL FROM HILTON CHENNAI !';
                $message = 'Dear '.$UserName.','."\n\n".'Your Room with  ID:'.$bookIDR.'  has been updated successfully'."\n\n\n".'We are always there to serve you.'."\n"."\n"."\n".'With regards,'."\n".'HILTON MANAGER'."\n".'GUINDY  CHENNAI';
                $headers = 'From:rahulravisankarr@gmail.com\r\n'; // Sender's Email
                if(mail($to, $subject, $message, $headers))
                {
                    echo '<script> alert("Your room details has been updated successfully!\nMail sent to registered Email..");window.location="mybookings.php" </script>'; 
                }
                else{
                    echo '<script> alert("Your room details has been updated successfully!\nFailed to send Mail..");window.location="mybookings.php" </script>'; 
                }
                
            }
            else
            {
                echo '<script> alert("Your table details updation failed");window.location="mybookings.php" </script>'; 
            }
            
        }

    }
?>