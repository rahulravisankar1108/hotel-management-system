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
        $tableview = $_POST['tableview'];
        $checkin = $_POST['checkin'];
        $timings = $_POST['timings'];
        $persons = $_POST['persons'];
        $veg = $_POST['veg'];
        $nveg = $_POST['nveg'];
        $special = $_POST['special'];
        $altphone = $_POST['altphone'];
        $bookIDT=$_SESSION['bookIDT'];
        {
            $sql = "UPDATE booktable SET tabletype='$tableview',checkin='$checkin',timings='$timings',persons='$persons',veg='$veg',nveg='$nveg',special='$special',altphone='$altphone' WHERE bookID = '$bookIDT' ";
            $result = mysqli_query($con,$sql);
            if($result)
            {
                $to=$Email;
                $subject = 'UPDATION SUCCESSFULL FROM HILTON CHENNAI !';
                $message = 'Dear '.$UserName.','."\n\n".'Your Table with  ID:'.$bookIDT.'  has been updated successfully'."\n\n\n".'We are always there to serve you.'."\n"."\n"."\n".'With regards,'."\n".'HILTON MANAGER'."\n".'GUINDY  CHENNAI';
                $headers = 'From:rahulravisankarr@gmail.com\r\n'; // Sender's Email
        
                if(mail($to, $subject, $message, $headers))
                {
                    echo '<script> alert("Your table details has been updated successfully");window.location="mybookings.php" </script>'; 
                }   
                else{
                    echo '<script> alert("Your table details has been updated successfully!\nFailed to send Mail..");window.location="mybookings.php" </script>'; 
                } 
            }
            else
            {
                echo '<script> alert("Your table details updation failed");window.location="mybookings.php" </script>'; 
            }
            
        }

    }
?>