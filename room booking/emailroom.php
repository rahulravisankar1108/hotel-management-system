<?php
    session_start();
    require_once('connection.php');
    if(isset($_POST['email-room-btn']))
    {
        $key = $_POST['keyy'];
        $UserName=$_SESSION['UserName'];
        $UserID=$_SESSION['UserID'];
        $Price=$_SESSION['Price'];
        $Emailquery="SELECT * from login WHERE UserID = '$UserID' ";
        $Emailq = mysqli_query($con,$Emailquery);
        $Emailqu=mysqli_fetch_assoc($Emailq);
        $Email=$Emailqu['Email'];
        $query = "SELECT * FROM bookroom WHERE bookID = '$key' ";
        $result = mysqli_query($con,$query);
        while($row = mysqli_fetch_assoc($result))
        {
            $to=$Email;
            $subject = 'Greetings from HILTON CHENNAI !';
            $message = 'Dear '.$UserName.','."\n\n".'Hope you are doing good...'."\n\n".'You have been booked a table in HILTON CHENNAI,here attached your booking details...'."\n\n".'ROOM BOOKING DETAILS'."\n\n\n".'Booking ID  -  '.$row['bookID']."\n".'Room View  -'.$row['roomtype']."\n".'Timings  -'.$row['timings']."\n".'Number of Days  -'.$row['days']."\n".'Check In  -'.$row['checkin']."\n".'Check Out  -'.$row['checkout']."\n".'Number of Rooms  -'.$row['rooms']."\n".'Number of Adults  -'.$row['adults']."\n".'Number of Children  -'.$row['children']."\n".'Variant  -'.$row['typeac']."\n".'Cutlery  -'.$row['withfood']."\n\n".'TOTAL PAYABLE  -'.$Price."\n\n\n".'Homewood Suites. Make Yourself at Home.On the bay in Coconut Grove.'."\n\n\n".'Feel at home, Share a Grand Experience'."\n"."\n"."\n".'With regards,'."\n\n\n".'HILTON MANAGER'."\n".'GUINDY  CHENNAI';
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