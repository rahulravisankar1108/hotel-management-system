<?php
    require_once('connection.php');
    session_start();
    if(isset($_POST['edit-tab-btn']))
    {
        $key = $_POST['keyy'];
        $UserName=$_SESSION['UserName'];
        $Email=$_SESSION['Email'];
        $query = "SELECT * FROM bookroom WHERE bookID = '$key' ";
        $result = mysqli_query($con,$query);
        while($row = mysqli_fetch_assoc($result))
        {
            $to=$Email;
            $subject = 'Greetings from HILTON CHENNAI !';
            $message = 'Dear '$UserName','."\n\n".'Hope you are doing good...'."\n\n".'BOOKING DETAILS'."\n\n\n".'Booking ID  -  '.$row['bookID']."\n".'Room View  -'.$row['roomtype']."\n".'Timings  -'.$row['timings']."\n".'Number of Days  -'.$row['days']."\n".'Check In  -'.$row['checkin']."\n".'Check Out  -'.$row['checkout']."\n".'Number of Rooms  -'.$row['rooms']."\n".'Number of Adults  -'.$row['adults']."\n".'Number of Children  -'.$row['children']."\n".'Variant  -'.$row['typeac']."\n".'Cutlery  -'.$row['withfood']."\n\n\n".'Homewood Suites. Make Yourself at Home.On the bay in Coconut Grove.'."\n\n\n".'Feel at home, Share a Grand Experience'."\n"."\n"."\n".'With regards,'."\n".'HILTON MANAGER'."\n".'GUINDY  CHENNAI';
            $headers = 'From:rahulravisankarr@gmail.com\r\n'; // Sender's Email
            if(mail($to, $subject, $message, $headers))
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