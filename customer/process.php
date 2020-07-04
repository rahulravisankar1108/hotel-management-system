<?php
    session_start();
    require_once('connection.php'); 
    
    if(isset($_POST['btn-save']))
    {
        $UserName = mysqli_real_escape_string($con,$_POST['UserName']);
        $Email = mysqli_real_escape_string($con,$_POST['Email']);
        $Password = mysqli_real_escape_string($con,$_POST['Password']);
        $CPassword = mysqli_real_escape_string($con,$_POST['Cpass']);

        if(empty($UserName) || empty($Email) || empty($Password) || empty($CPassword))
        {
            echo '<script> alert("Please Fill in the Blanks");window.location="signup.php" </script>';
        }

        if($Password!=$CPassword)
        {
            echo '<script> alert("Password Not Matched");window.location="signup.php" </script>';
        }
        
        else
        {
            $Pass = md5($Password);
            $conf = mysqli_query($con,"SELECT UserName FROM login WHERE UserName ='$UserName' ");
            $conff = mysqli_query($con,"SELECT Email FROM login WHERE Email ='$Email' ");
            
            if((mysqli_num_rows($conf) > 0) && (mysqli_num_rows($conff)>0))
            {
                echo '<script> alert("Username and Email already registered");window.location="signup.php" </script>';
            }
            else
            {
                
                $to=$Email;
                $subject = 'Greetings from HILTON CHENNAI !';
                $message = 'hello '.$UserName.','."\n\n".'Hope you are doing good...'."\n\n".'You are successfully signed up with hilton chennai.'."\n\n\n".'Now,you can receive email notification of each process of what you are doing and also do subscribe to our newsletter to get daily updates and promotions from our hotel worlwide.'."\n"."\n"."\n".'With regards,'."\n".'HILTON MANAGER'."\n".'GUINDY  CHENNAI';
                $headers = 'From:rahulravisankarr@gmail.com\r\n'; // Sender's Email
        
                if(mail($to, $subject, $message, $headers))
                {
                    $Userid = (uniqid(rand(1000,9999),true));
                    $sql = "insert into login (UserID,UserName,Email,Password) values ('$Userid','$UserName','$Email','$Pass')";
                    $result = mysqli_query($con,$sql);
                    $_SESSION['User']= $Userid;
                    $_SESSION['Email']=$Email;
                    echo '<script> alert("You are successfully signed up!");window.location="personal.php" </script>'; 
                }
                else{
                    echo '<script> alert("Failed to sign up!");window.location="signup.php" </script>'; 
                } 
            }

        }

    }
?>



