<?php 
    require_once('connection.php');
    if(isset($_POST['subscribe']))
    {
        $Email = $_POST['email'];
        $to=$Email;
        $subject = 'GREETINGS from HILTON CHENNAI !';
        $message = ' Hello,'."\n\n".'Thank you for subscribing to our newletter..!.'."\n\n".'Hope you are doing good...'."\n\n"."\n".'You can now receive email notifications for promotion codes and daily newsletter from HILTON CHENNAI'."\n\n".'Dont miss any offers and updates..'."\n"."\n"."\n"."\n"."\n".'With Regards,'."\n".'HILTON MANAGER'."\n".'GUINDY  CHENNAI';
        $headers = 'From:rahulravisankarr@gmail.com\r\n'; // Sender's Email

        if(mail($_POST['email'], $subject, $message, $headers))
        {
            $query ="INSERT into subscribe (Email) values ('$Email')";
            $result = mysqli_query($con,$query);
            echo '<script> alert("You are subscribed to our newsletter!\nYou can able to get mails and notifications from HILTON CHENNAI");window.location="index.php" </script>'; 
        }
        else{
            echo '<script> alert("Failed to subscribe to our newsletter!");window.location="index.php" </script>'; 
        } 
        
    }
?>