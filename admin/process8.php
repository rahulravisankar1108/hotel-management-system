<?php
    session_start();
    require_once('connection.php');
    $password="hiltonadmin123";
    if(isset($_POST['btn-login']))
    {
        $Pass=$_POST['Password'];
        if($Pass===$password)
        {
            header("location:adminn.php");   
        }
        else
        {
            echo '<script> alert("Password and username does not match!!");window.location="adminlogin.php" </script>';
        }
    }
?>
