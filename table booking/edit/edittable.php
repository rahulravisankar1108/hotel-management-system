<?php 
    require_once('connection.php');
    session_start();
    if(isset($_POST['edit-tab-btn']))
    {
        $key = $_POST['key'];
        $_SESSION['bookIDT']=$key;
        $query = "SELECT * FROM booktable WHERE bookID = '$key' ";
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
            
                <title>Hilton Table Update</title>
            
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
                        <p class="navbar-brand"><span> <?php echo ("Hello   ".$_SESSION['UserName']."!     ")?> Welcome to Hilton Table Booking Details Update</span></p>
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
            
                <form action ="edittableprocess.php" method ="post">
                        <div id="booking" class="section">
                        <div class="section-center">
                            <div class="container">
                                <div class="row">
                                    <div class="booking-form">
                                        <div class="form-header">
                                            <h1>update your reservation of the table soon.....</h1>
                                        </div>
                                        <form>
                                            <div class="form-group">
                                                <select class="form-control" name="tableview" required>
                                                    <option value=""selected hidden><?php echo($row['tabletype']); ?></option>
                                                    <option>Pool</option>
                                                    <option>Theatre</option>
                                                    <option>Terrace</option>
                                                    <option>Garden</option>
                                                    <option>Candle Light</option>
                                                    <option>Spotlight</option>
                                                </select>
                                                <span class="form-label">Type Of Table View</span>
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
                                                        <input class="form-control" name="timings"  value="<?php echo($row['timings']); ?>" type="time" required>
                                                        <span class="form-label">Timings</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <select class="form-control" name="persons" >
                                                            <option value=""selected hidden><?php echo($row['persons']); ?></option>
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                            <option>6</option>
                                                            <option>7</option>
                                                            <option>8</option>
                                                            <option>9</option>
                                                            <option>10</option>
                                                            <option>11</option>
                                                            <option>12</option>
                                                            <option>13</option>
                                                            <option>14</option>
                                                            <option>15</option>												
                                                        </select>
							                            <span class="form-label">Persons</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <input class="form-control" placeholder="No. of Vegetarians" value="<?php echo($row['veg']); ?>" name="veg" type="number" required>
                                                        <span class="form-label">No of veg</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <input class="form-control" placeholder="No. of Non-Vegetarians" value="<?php echo($row['nveg']); ?>" name="nveg" type="number" required>
                                                        <span class="form-label">No of Non-Veg</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="special" value="<?php echo($row['special']); ?>" placeholder="Enter any special queries" required>
                                                        <span class="form-label">Any Special Queries?</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input class="form-control" type="tel" name="altphone" value="<?php echo($row['altphone']); ?>" placeholder="Enter your Alternate Phone" required>
                                                        <span class="form-label">Alternate Phone</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-btn">
                                                <input type="submit" value="Update Table Booking Now" class="submit-btn" name="btn-update">
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
