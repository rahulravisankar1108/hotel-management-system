<?php
    session_start();
    require_once('connection.php');
     
    if(isset($_POST['btn-login']))
    {
        $UserName=$_POST['UserName'];
        $Pass=$_POST['Password'];

        if( empty($UserName) || empty($Pass))
        {
            echo 'Please Fill in the Blanks.';
        }
        else
        {
            $query = " SELECT * FROM login where UserName = '$UserName' ";
            $result = mysqli_query($con,$query);
            if($row = mysqli_fetch_assoc($result))
            {
                $db_password = $row['Password'];  
                if(md5($Pass) == $db_password)
                {
                    $UserID = $row['UserID'];
                    $_SESSION['UserID']= $UserID;
                    $_SESSION['UserName']=$UserName;
                    header("location:admin.php");
                    
                }
                else
                {
                    echo '<script> alert("Password and username does not match!!");window.location="login.php" </script>';
                }
            }
            else
            {
                
                echo '<script> alert("Please check your Query");window.location="login.php" </script>';
            }
        }
    }
