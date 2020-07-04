<?php 
    session_start();
    require_once('connection.php');
    if(isset($_POST['editprof-btn']))
	{
		$User=$_SESSION['User'];
		$query = "SELECT * FROM personal WHERE UserID = '$User' ";
        $result = mysqli_query($con,$query);
        while($row = mysqli_fetch_assoc($result))
        {	
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

            <title>Hilton Personal details</title>

            <!-- Google font -->
            <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

            <!-- Bootstrap -->
            <link  rel="stylesheet" href="bootstrap.min.css" >

            <link rel="stylesheet" href="navjs.js">

            <!-- Custom stlylesheet -->
            <link  rel="stylesheet" href="style3.css" >

            <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
                <![endif]-->

        </head>
        <body>
            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <p class="navbar-brandd"></p>
                    <p class="navbar-brand"><span>Personal Details</span></p>
                    </div>
                    <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav pull-right">
                        <li class="active"> </li>
                        <li><a href="admin.php">Book Other,but your current booking will be cancelled!!</a></li>
                        <li><a href="login.php">Log Out</a></li>
                    </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </nav>
                <div id="booking" class="section">
                    <div class="section-center">
                        <div class="container">
                            <div class="row">
                                <div class="booking-form">
                                    <div class="form-header">
                                        <h1>Personal details</h1>
                                    </div>
                                    <form action="myprofileeditprocess.php" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" placeholder="Enter your Name" value="<?php echo($row['name']) ?>" name="name" required>
                                                    <span class="form-label">Name</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input class="form-control" type="tel"  placeholder="Enter your Phone" value="<?php echo($row['phone']) ?>"name="phone" required>
                                                    <span class="form-label">Phone</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <input class="form-control" type="text" placeholder="Enter your residence" value="<?php echo($row['address']) ?>"name="address" required>
                                            <span class="form-label">Enter Address</span>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" placeholder="Enter your city"value="<?php echo($row['city']) ?>" name="city" required>
                                                    <span class="form-label">Enter City / State</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input class="form-control" type="number" placeholder="Enter your PINCODE" value="<?php echo($row['pincode']) ?>" name="pincode" required>
                                                    <span class="form-label">Enter Pincode</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <select class="form-control" name="IDproof" required>
                                                        <option value="" selected hidden><?php echo($row['IDproof'])?></option>
                                                        <option>AADHAR CARD</option>
                                                        <option>DRIVING LICENSE </option>
                                                        <option>PASSPORT</option>
                                                        <option>VOTER ID</option>
                                                        <option>PAN CARD</option>
                                                        <option>GROCERY CARD</option>
                                                    </select>
                                                    <span class="form-label">ID proof</span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" name="IDnumber" value="<?php echo($row['IDnumber']) ?>" placeholder="Enter number on ID" required>
                                                    <span class="form-label">Number on ID</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-btn">
                                            <input type="submit" value="Submit Details" class="submit-btn" name="per-btn">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
        </body>
        </html>
<?php
        }
    }
?>