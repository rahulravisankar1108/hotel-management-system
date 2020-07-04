<?php
    session_start();
    require_once('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="stylesheet" href="bootstrap.min.css" >
    <link rel="stylesheet" href="style4.css">
    <title>Hilton Admin</title>
</head>
<body>
      <nav class="nav">
            <form action="login.php" method="post">
                <button type="submit" class="login-container" name="logOut">Log Out</button>
            </form>
      </nav>
    <div class="aa_htmlTable">
      <h2 class="aa_h2"> User Table Bookings </h2>
      <?php 
        $query = "SELECT * FROM booktable";
        $result = mysqli_query($con,$query);
        
      ?>
      <table>
            <thead>
                <tr>
                    <th>S.NO</th>
                    <th>User ID</th>
                    <th>Booking ID</th>
                    <th>Table type</th>
                    <th>Check IN</th>
                    <th>Timings</th>
                    <th>No of Persons</th>
                    <th>No of VEG</th>
                    <th>No of NON-VEG</th>
                    <th>Spl Queries</th>
                    <th>Alternate Phone</th>   
                    <th>total payable in (Rs.)</th>      
                </tr>
            </thead>
            <tbody>
              <?php 
                  $j=1;
                  while($row = mysqli_fetch_assoc($result))
                  {
                    
              ?>
                  <tr>
                      <td><?php echo($j);?></td>
                      <td><b><?php echo($row['UserID']);?></b></td>
                      <td><b><?php echo($row['bookID']); ?></b></td>
                      <td><?php echo($row['tabletype']); ?></td>
                      <td><?php echo($row['checkin']); ?></td>
                      <td><?php echo($row['timings']); ?></td>
                      <td><?php echo($row['persons']); ?></td>
                      <td><?php echo($row['veg']); ?></td>
                      <td><?php echo($row['nveg']); ?></td>
                      <td><?php echo($row['special']); ?></td>
                      <td><?php echo($row['altphone']); ?></td>
                      <td><?php $TablePrice =(($row['veg']*500)+($row['nveg']*700)); echo($TablePrice.".00"); $_SESSION['TablePrice']=$TablePrice;?></td>
                      <?php $j=$j+1; ?>
                  </tr>
              <?php
                  } 
              ?>
            </tbody>
            
      </table>
    </div>

  <div class="aa_css">
    <h2 class="aa_h2">User Room bookings </h2>
    <?php 
        $queryy = "SELECT * FROM bookroom";
        $resultt = mysqli_query($con,$queryy);
        
    ?>
      <table>
            <thead>
                <tr>
                    <th>S.NO</th>
                    <th>User ID</th>
                    <th>Booking ID</th>
                    <th>Room Type</th>
                    <th>Check IN</th>
                    <th>Check OUT</th>
                    <th>Arrival time</th>
                    <th>No of Rooms</th>
                    <th>No of Adults</th>
                    <th>No of Children</th>
                    <th>Variant</th>
                    <th>Dining</th> 
                    <th>total payable in (Rs.)</th>
                </tr>
            </thead>
            <tbody>
              <?php 
                  $i=1;
                  while($roww = mysqli_fetch_assoc($resultt))
                  {
                    $days=$roww['days'];
                    $bookIDRR=$roww['bookID'];
                    
              ?>
                  <tr>
                      <td><?php echo($i);?></td>
                      <td><b><?php echo($roww['UserID']);?></b></td>
                      <td><b><?php echo($roww['bookID']); ?></b></td>
                      <td><?php echo($roww['roomtype']); ?></td>
                      <td><?php echo($roww['checkin']); ?></td>
                      <td><?php echo($roww['checkout']); ?></td>
                      <td><?php echo($roww['timings']); ?></td>
                      <td><?php echo($roww['rooms']); ?></td>
                      <td><?php echo($roww['adults']); ?></td>
                      <td><?php echo($roww['children']); ?></td>
                      <td><?php echo($roww['typeac']); ?></td>
                      <td><?php echo($roww['withfood']); ?></td>
                      <td><?php if($roww['roomtype']=='Single' && $roww['typeac']=="Air Conditioning") { $Price =(($roww['rooms']*4000*$days)+((($roww['rooms']*4000)*0.18)*$days)); $query="UPDATE bookroom SET Price='$Price' WHERE bookID= '$bookIDRR' "; $result = mysqli_query($con,$query); echo($Price.".00"); } elseif($roww['roomtype']=='Single' && $roww['typeac']=="Non-Air Conditioning") { $Price = (($roww['rooms']*3000*$days)+((($roww['rooms']*3000)*0.18)*$days)); $query="UPDATE bookroom SET Price='$Price' WHERE bookID= ' $bookIDRR' "; $result = mysqli_query($con,$query); echo($Price.".00"); } elseif($roww['roomtype']=='Double'  && $roww['typeac']=="Air Conditioning") { $Price = (($roww['rooms']*6000*$days)+((($roww['rooms']*6000)*0.18)*$days));$query="UPDATE bookroom SET Price='$Price' WHERE bookID = ' $bookIDRR' "; $result = mysqli_query($con,$query); echo($Price.".00"); } elseif($roww['roomtype']=='Double'  && $roww['typeac']=="Non-Air Conditioning") { $Price = (($roww['rooms']*5000*$days)+((($roww['rooms']*5000)*0.18)*$days));$query="UPDATE bookroom SET Price='$Price' WHERE bookID= '$bookIDRR' "; $result = mysqli_query($con,$query); echo($Price.".00");} elseif($roww['roomtype']=='Deluxe'  && $roww['typeac']=="Air Conditioning") { $Price = (($roww['rooms']*8000*$days)+((($roww['rooms']*8000)*0.18)*$days));$query="UPDATE bookroom SET Price='$Price' WHERE bookID= '$bookIDRR' "; $result = mysqli_query($con,$query); echo($Price.".00"); }elseif($roww['roomtype']=='Deluxe'  && $roww['typeac']=="Non-Air Conditioning") { $Price = (($roww['rooms']*7000*$days)+((($roww['rooms']*7000)*0.18)*$days));$query="UPDATE bookroom SET Price='$Price' WHERE bookID= '$bookIDRR' "; $result = mysqli_query($con,$query);  echo($Price.".00"); }else echo("Error");?></td>
                      <?php $i=$i+1; ?>
                  </tr>
                <?php
                  }         
                ?>
            </tbody>
      </table>
  </div>
</body>
</html>

