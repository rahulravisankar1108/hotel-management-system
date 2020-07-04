<?php 
    require_once('connection.php');
    session_start();
    if(isset($_POST['next']))
    {
        $roomtype=$_POST['roomtype'];
        $timings=$_POST['timings'];
        $days=$_POST['days'];
        $checkin=$_POST['checkin'];
        $checkout=$_POST['checkout'];
        $rooms=$_POST['rooms'];
        $adults=$_POST['adults'];
        $children=$_POST['children'];
        $typeac=$_POST['typeac'];
        $withfood=$_POST['withfood'];
        $UserID=$_SESSION['UserID'];
        $bookID=uniqid("ROO");
        $_SESSION['bookIDR']=$bookID;
        $sql = "insert into bookroom (UserID,bookID,roomtype,timings,days,checkin,checkout,rooms,adults,children,typeac,withfood) values ('$UserID','$bookID','$roomtype','$timings','$days','$checkin','$checkout','$rooms','$adults','$children','$typeac','$withfood') ";
        $result = mysqli_query($con,$sql);
        if($result)
        {
            
            echo '<script> alert("Your Room has been Booked successfully!!!");window.location="admin.php" </script>';     
        }
        

    }
