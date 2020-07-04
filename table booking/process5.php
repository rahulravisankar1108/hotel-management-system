<?php
    session_start();
    require_once('connection.php');
    if(isset($_POST['btn-book']))
    {
        $tableview = $_POST['tableview'];
        $checkin = $_POST['checkin'];
        $time = $_POST['time'];
        $persons = $_POST['persons'];
        $veg = $_POST['veg'];
        $nveg = $_POST['nveg'];
        $special = $_POST['special'];
        $altphone = $_POST['altphone'];
        $UserID=$_SESSION['UserID'];
        $bookID=uniqid("AEF");
        {
            $sql = "insert into booktable (UserID,bookID,tabletype,checkin,timings,persons,veg,nveg,special,altphone) values ('$UserID','$bookID','$tableview','$checkin','$time','$persons','$veg','$nveg','$special','$altphone') ";
            $result = mysqli_query($con,$sql);
            if($result)
            {
                echo '<script> alert("Your table has been booked successfully");window.location="admin.php" </script>'; 
            }
            else
            {
                echo '<script> alert("Your table booking failed!");window.location="admin.php" </script>'; 
            }
            
        }

    }
    
#loginID, '$_SESSION['loginID']',