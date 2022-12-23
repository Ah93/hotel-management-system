<?php
session_start();
    include_once 'admin/include/class.user.php'; 
    $user=new User(); 
	$username=$_SESSION['fullname'];
	$date = date('Y-m-d H:i:s');
    $room_id=$_GET['room_id'];
	
$sql="SELECT room_cat, room_number FROM rooms WHERE room_id='$room_id'";
$query=mysqli_query($user->db, $sql);
$row = mysqli_fetch_array($query);
$roomname = $row["room_cat"];
$roomNum = $row["room_number"];
    if(isset($_REQUEST[ 'submit'])) 
    { 
        extract($_REQUEST); 
        $result=$user->booknow($checkin, $checkout, $name, $num_of_night, $roomNum, $cus_id, $phone, $roomname, $username, $date);
        if($result)
        {
            echo "<script type='text/javascript'>
                  alert('".$result."');
             </script>";
        }


        
    }


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Hotel Booking</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="admin/css/reg.css" type="text/css">
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( ".datepicker" ).datepicker({
                  dateFormat : 'yy-mm-dd'
                });
  } );
  </script>

    
</head>

<body>
    <div class="container">
      
      
       <img class="img-responsive" src="images/home_banner.jpg" style="width:100%; height:180px;">      
        

      <div class="well">
            <h2>Book Now: <?php echo "{$roomname} / {$roomNum}"; ?></h2>
            <hr>
            <form action="" method="post" name="room_category">
              
              
               <div class="form-group">
                    <label for="checkin">Check In :</label>&nbsp;&nbsp;&nbsp;
                    <input type="text" class="datepicker" name="checkin">

                </div>
               
               <div class="form-group">
                    <label for="checkout">Check Out:</label>&nbsp;
                    <input type="text" class="datepicker" name="checkout">
                </div>
                <div class="form-group">
                    <label for="name">Enter Full Name:</label>
                    <input type="text" class="form-control" name="name" placeholder="Jhon Wicky" required>
                </div>
				<div class="form-group">
                    <label for="phone">Enter Number of Night to stay:</label>
                    <input type="number" class="form-control" name="num_of_night" placeholder="1,2,3..." required>
                </div>
				<div class="form-group">
                    <label for="cus_id">Enter ID Number:</label>
                    <input type="number" class="form-control" name="cus_id" placeholder="018XXXXXXX" required>
                </div>
                <div class="form-group">
                    <label for="phone">Enter Phone Number:</label>
                    <input type="number" class="form-control" name="phone" placeholder="018XXXXXXX" required>
                </div>
                 
               
                <button type="submit" class="btn btn-lg btn-primary button" name="submit">Book Now</button>

               <br>
                <div id="click_here">
                    <a href="admin.php">Back to Admin Page</a>
                </div>


            </form>
        </div>
        
        



    </div>
    
    
    
    
    






    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
</body>

</html>