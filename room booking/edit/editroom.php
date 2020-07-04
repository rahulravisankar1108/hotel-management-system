<?php 
    require_once('connection.php');
    session_start();
    if(isset($_POST['edit-room-btn']))
    {
        $key = $_POST['keyy'];
        $_SESSION['bookIDR']=$key;
        $query = "SELECT * FROM bookroom WHERE bookID = '$key' ";
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
            
                <title>Hilton Room Update</title>
            
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
                <!-- USING BOOTSTRAP 3.0.3 -->
                <nav class="navbar navbar-inverse navbar-fixed-top">
                    <div class="container">
                        <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <p class="navbar-brandd"></p>
                        <p class="navbar-brand"><span> <?php echo ("Hello   ".$_SESSION['UserName']."!     ")?> Welcome to Hilton Room Booking Details Update</span></p>
                        </div>
                        <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav pull-right">
                            <li class="active"> </li>
                            <li><a href="admin.php">Book Other,but your updation will be cancelled</a></li>
                            <li><a href="login.php">Log Out</a></li>
                        </ul>
                        </div><!--/.nav-collapse -->
                    </div>
                </nav>
            
                <form action ="editroomprocess.php" method ="post">
                        <div id="booking" class="section">
                        <div class="section-center">
                            <div class="container">
                                <div class="row">
                                    <div class="booking-form">
                                        <div class="form-header">
                                            <h1>update your reservation of the room soon.....</h1>
                                        </div>
                                        <form>
                                            <div class="row">
                                                <div class=col-md-6>
                                                    <div class="form-group">
                                                        <select class="form-control" name="roomtype" required>
															<option value=""selected hidden><?php echo($row['roomtype']); ?></option>
															<option>Single</option>
															<option>Double</option>
															<option>Deluxe</option>
												        </select>
                                                        <span class="form-label">Type Of Room </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input class="form-control" name="timings"  value="<?php echo($row['timings']); ?>" type="time" required>
                                                        <span class="form-label">Arrival Time</span>
                                                    </div>
                                                </div>                                              
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input class="form-control" value="<?php echo($row['checkin']); ?>" name="checkin" type="date" required>
                                                        <span class="form-label">Check In</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input class="form-control" name="checkout"  value="<?php echo($row['checkout']); ?>" type="date" required>
                                                        <span class="form-label">Check Out</span>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <input class="form-control" placeholder="No. of Rooms" value="<?php echo($row['rooms']); ?>" name="rooms" type="number" required>
                                                        <span class="form-label">Rooms</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <input class="form-control" placeholder="No. of Adults" value="<?php echo($row['adults']); ?>" name="adults" type="number" required>
                                                        <span class="form-label">Adults</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <input class="form-control" placeholder="No. of Children" value="<?php echo($row['children']); ?>" name="children" type="number" required>
                                                        <span class="form-label">Children</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <select class="form-control" name="typeac" required>
                                                            <option value=""selected hidden><?php echo($row['typeac']); ?></option>
                                                            <option>Air Conditioning</option>
                                                            <option>Non-Air Conditioning</option>
                                                        </select>
												        <span class="form-label">Variant</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <select class="form-control" name="withfood" required>
                                                            <option value=""selected hidden><?php echo($row['withfood']); ?></option>
                                                            <option>With Food</option>
                                                            <option>Without Food</option>
                                                        </select>
                                                        <span class="form-label">Cutlery</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-btn">
                                                <input type="submit" value="Update Room Booking Now" class="submit-btn" name="btn-update">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                
            </body><!-- This templates was made by Colorlib (https://colorlib.com) -->
            
            </html>
        <?php
            }

        }
        ?>
