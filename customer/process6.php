<?php 
    session_start();
    require_once('connection.php');

    if(isset($_POST['per-btn']))
    {
        $name=$_POST['name'];
        $phone=$_POST['phone'];
        $address=$_POST['address'];
        $city=$_POST['city'];
        $pincode=$_POST['pincode'];
        $IDproof=$_POST['IDproof'];
        $IDnumber=$_POST['IDnumber'];
        $UserID=$_SESSION['User'];
        $sql = "insert into personal (UserID,name,phone,address,city,pincode,IDproof,IDnumber) values ('$UserID','$name','$phone','$address','$city','$pincode','$IDproof','$IDnumber') ";
        $result = mysqli_query($con,$sql);
        if($result)
        {
            $_SESSION['name']=$name;
            $_SESSION['phone']=$phone;
            $_SESSION['address']=$address;
            $_SESSION['city']=$city;
            $_SESSION['pincode']=$pincode;
            $_SESSION['IDproof']=$IDproof;
            $_SESSION['IDnumber']=$IDnumber;

            
            //Your authentication key
            $authKey = "YourAuthKey";
            //Multiple mobiles numbers separated by comma
            $mobileNumber = "$phone";
            //Sender ID,While using route4 sender id should be 6 characters long.
            $senderId = "HILTON";
            //Your message to send, Add URL encoding here.
            $message = urlencode("Welcome to HILTON CHENNAI\nYou are successfully signed up with our hotel website.\nGet notification and updates from our hotel and grab your offers.");
            //Define route 
            $route = "default";
            //Prepare you post parameters
            $postData = array(
                'authkey' => $authKey,
                'mobiles' => $mobileNumber,
                'message' => $message,
                'sender' => $senderId,
                'route' => $route
            );
            //API URL
            $url="http://sms.phptpoint.com/api/sendhttp.php";
            // init the resource
            $ch = curl_init();
            curl_setopt_array($ch, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $postData
                //,CURLOPT_FOLLOWLOCATION => true
            ));
            //Ignore SSL certificate verification
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            //get response
            $output = curl_exec($ch);
            //Print error if any
            if(curl_errno($ch))
            {
                echo 'error:' . curl_error($ch);
            }
            curl_close($ch);
            echo $output;
            echo '<script> alert("Personal Details successfully saved");window.location="login.php" </script>'; 
        }
        else{
            echo '<script> alert("Error!\nPersonal Details failed to save");window.location="personal.php" </script>'; 
        }
        
    }
?>

