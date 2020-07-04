<?php
	session_start();
	require_once('connection.php');
	if(isset($_POST['MyProfile']))
	{
		$User=$_SESSION['UserID'];
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

			<title>Hilton Table Booking</title>

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
					<p class="navbar-brand"><span> <?php echo ($_SESSION['UserName']."   Profile")?></span></p>
					</div>
					<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav pull-right">
						<li class="active"> </li>
						<li><a href="admin.php">Book</a></li>
						<li><a href="login.php">Log Out</a></li>
					</ul>
					</div><!--/.nav-collapse -->
				</div>
			</nav>

			<form action ="myprofileedit.php" method ="post">
					<div id="booking" class="section">
					<div class="section-center">
						<div class="container">
							<div class="row">
								<div class="booking-form">
									<div class="form-header">
										<h1><?php echo ($_SESSION['UserName']."   Profile")?></h1>
									</div>
									<p class="details">Name</p><p class="value"><?php echo($row['name']);?></p>
									<p class="details">Mobile Number</p><p class="value"><?php echo($row['phone']);?></p>
									<p class="details">Address</p><p class="value"><?php echo($row['address']);?></p>
									<p class="details">City/State</p><p class="value"><?php echo($row['city']);?></p>
									<p class="details" >Pincode</p><p class="value"><?php echo($row['pincode']);?></p>
									<p class="details">ID proof</p><p class="value"><?php echo($row['IDproof']);?></p>
									<p class="details">Number on ID</p><p class="value"><?php echo($row['IDnumber']);?></p>
									<input class="submit-btn" value="Edit Profile" type="submit" name="editprof-btn"></button>
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


