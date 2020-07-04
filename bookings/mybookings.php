<?php
    session_start();
    require_once('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link  rel="stylesheet" href="bootstrap.min.css" >
    <link rel="stylesheet" href="style4.css">
    <title>My Bookings</title>
</head>
<body>
      <nav class="nav">
            <form action="login.php" method="post">
                <button type="submit" class="login-container" name="logOut">Log Out</button>
            </form>
            <form action="index.php" method="post">
                <button type="submit" class="login-container" name="Home">Home</button>
            </form>
            <form action="admin.php" method="post">
                <button type="submit" class="login-container" name="My Bookings">Book More.</button>
            </form>
      </nav>
        
    <?php 
      $UserID=$_SESSION['UserID'];
    ?>
    <div class="aa_htmlTable">
      <h2 class="aa_h2"> Bookings <br><br> Table </h2>
      <?php 
        $query = "SELECT * FROM booktable WHERE UserID = '$UserID' ";
        $result = mysqli_query($con,$query);
        
      ?>
      <table>
            <thead>
                <tr>
                    <th>S.NO</th>
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
                    <th>Checkbox to Delete</th>
                    <th>Delete booking</th>       
                    <th>Checkbox to Edit</th>
                    <th>Edit booking details</th>
                    <th>Checkbox to Email</th>
                    <th>Email this booking</th>      
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
                      <td><?php echo($row['bookID']); ?></td>
                      <td><?php echo($row['tabletype']); ?></td>
                      <td><?php echo($row['checkin']); ?></td>
                      <td><?php echo($row['timings']); ?></td>
                      <td><?php echo($row['persons']); ?></td>
                      <td><?php echo($row['veg']); ?></td>
                      <td><?php echo($row['nveg']); ?></td>
                      <td><?php echo($row['special']); ?></td>
                      <td><?php echo($row['altphone']); ?></td>
                      <td><?php $TablePrice =(($row['veg']*500)+($row['nveg']*700)); echo($TablePrice.".00"); $_SESSION['TablePrice']=$TablePrice;?></td>
                      <form action="deletetable.php" method="post" role="form">
                        <td>
                          <input type="checkbox" name="key" value="<?php echo($row['bookID']);?>" required>
                        </td>
                        <td><input type="submit" value="Delete"  name="del-tab-btn" class="button"></td>
                      </form>
                      <form action="edittable.php" method="post">
                        <td>
                          <input type="checkbox" name="key" value="<?php echo($row['bookID']);?>" required>
                        </td>
                        <td><input type="submit" value="Edit"  name="edit-tab-btn" class="button"></td>
                      </form>
                      <form action="emailtable.php" method="post">
                        <td>
                          <input type="checkbox" name="key" value="<?php echo($row['bookID']);?>" required>
                        </td>
                        <td> <input type="submit" value="Email" class="button" name="email-tab-btn" ></td>  
                      </form>
                      <?php $j=$j+1; ?>
                  </tr>
              <?php
                  }
                  
              ?> 
               <p><div class="note">NOTE:</div> You can pay your Bill amount during your arrival...</p>
            </tbody>
            
      </table>
    </div>

  <div class="aa_css">
    <h2 class="aa_h2">Room </h2>
    <?php 
        $queryy = "SELECT * FROM bookroom WHERE UserID = '$UserID' ";
        $resultt = mysqli_query($con,$queryy);
        
    ?>
      <table>
            <thead>
                <tr>
                    <th>S.NO</th>
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
                    <th>Checkbox to Delete</th>
                    <th>Delete booking</th> 
                    <th>Checkbox to Edit</th>      
                    <th>Edit booking details</th>
                    <th>Checkbox to Email</th>
                    <th>Email this booking</th>
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
                      <td><?php echo($roww['bookID']); ?></td>
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
                      <?php $_SESSION['Price']=$Price;?>
                      <form action="deleteroom.php" method="post">
                        <td><input type="checkbox" name="keyy"  value="<?php echo($roww['bookID']); ?>" required></td>
                        <td><input type="submit" value="Delete" name="del-room-btn"  class="button1" ></td> 
                      </form>
                      <form action="editroom.php" method="post">
                        <td><input type="checkbox" name="keyy"  value="<?php echo($roww['bookID']); ?>" required></td>
                        <td><input type="submit" value="Edit" name="edit-room-btn"  class="button1" ></td>
                      </form>
                      <form action="emailroom.php" method="post">
                        <td><input type="checkbox" name="keyy"  value="<?php echo($roww['bookID']); ?>" required></td>
                        <td><input value="Email" type="submit" name="email-room-btn" class="button1"></td>
                      </form>
                      <?php $i=$i+1; ?>
                  </tr>
                <?php
                  }         
                ?> 
                <p> <div class="note">NOTE:</div>  You can pay your Bill amount during your arrival...<br>Your bill doesn't include Food amount,need to pay on visit based on your preference.</p>
               
            </tbody>
      </table>
  </div>
  <script>
    function checkdelete()
    {
        return confirm('Are you sure want to DELETE this booking?');
    }
    function checkedit()
    {
        return confirm('Are you sure want to EDIT this booking?');
    }
  
  </script>
</body>
</html>

