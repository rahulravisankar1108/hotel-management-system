<?php
    session_start();
    require_once('connection.php');

    if(isset($_POST['per-btn']))
    {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $pincode = $_POST['pincode'];
        $IDproof = $_POST['IDproof'];
        $IDnumber = $_POST['IDnumber'];
        $User=$_SESSION['User'];
        {
            $sql = "UPDATE personal SET name='$name',phone='$phone',address='$address',city='$city',pincode='$pincode',IDproof='$IDproof',IDnumber='$IDnumber' WHERE UserID = '$User' ";
            $result = mysqli_query($con,$sql);
            if($result)
            {
                echo '<script> alert("Your personal details has been updated successfully");window.location="admin.php" </script>'; 
            }
            else
            {
                echo '<script> alert("Your personal details updation failed");window.location="admin.php" </script>'; 
            }
            
        }
    }

?>