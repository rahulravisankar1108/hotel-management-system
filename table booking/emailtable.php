<?php
    session_start();
    require_once('connection.php');
    if(isset($_POST['email-tab-btn']))
    {
        $key = $_POST['key'];
        $UserName=$_SESSION['UserName'];
        $UserID=$_SESSION['UserID'];
        $TablePrice = $_SESSION['TablePrice'];
        $Emailquery="SELECT * from login WHERE UserID = '$UserID' ";
        $Emailq = mysqli_query($con,$Emailquery);
        $Emailqu=mysqli_fetch_assoc($Emailq);
        $Email=$Emailqu['Email'];
        $query = "SELECT * FROM booktable WHERE bookID = '$key' ";
        $result = mysqli_query($con,$query);
        while($row = mysqli_fetch_assoc($result))
        {
            $to=$Email;
            $subject = 'Greetings from HILTON CHENNAI !';
            $message = 'Dear '.$UserName.','."\n\n".'Hope you are doing good...'."\n\n".'You have been booked a table in HILTON CHENNAI,here attached your booking details...'."\n\n".'TABLE BOOKING DETAILS'."\n\n\n".'Booking ID  -  '.$row['bookID']."\n".'Table View  -'.$row['tabletype']."\n".'Check In  -'.$row['checkin']."\n".'Timings  -'.$row['timings']."\n".'Number of Persons  -'.$row['persons']."\n".'Number of Veg  -'.$row['veg']."\n".'Number of Non-Veg  -'.$row['nveg']."\n".'Alternate phone  -'.$row['altphone']."\n\n".'TOTAL PAYABLE  -'.$TablePrice."\n\n\n".'Feel at home, Share a Grand Experience'."\n"."\n"."\n".'With regards,'."\n\n\n".'HILTON MANAGER'."\n".'GUINDY  CHENNAI';
            $headers = 'From:rahulravisankarr@gmail.com\r\n'; // Sender's Email
            if(mail($Email, $subject, $message, $headers))
            {
                echo '<script> alert("Email sent to your registered ID");window.location="mybookings.php" </script>'; 
            }
            else
            {
                echo '<script> alert("Failed to send email!");window.location="mybookings.php" </script>'; 
            } 
        }

    }
    
?>