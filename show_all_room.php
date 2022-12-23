<?php
session_start();
include_once 'admin/include/class.user.php';
$user=new User();
$username=$_SESSION['fullname']; 
if(!$user->get_session()) 
{ 
    header("location:admin/login.php"); 
} 
if(isset($_GET['q'])) 
{ 
    $user->user_logout();
 header("location:index.php"); 
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

    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    
    
    <style>
          
        .well {
            background: rgba(0, 0, 0, 0.7);
            border: none;
            height: 200px;
        }
        
        body {
            background-image: url('images/home_bg.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        
        h4 {
            color: #ffbb2b;
        }
        h6
        {
            color: navajowhite;
            font-family:  monospace;
        }


    </style>
    
    
</head>

<body>
    <div class="container">
      
      
       <img class="img-responsive" src="images/home_banner.jpg" style="width:100%; height:180px;">      
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
               <ul class="nav navbar-nav">
                    <!--li><a href="index.php">Home</a></li>
                    <li><a href="room.php">Room &amp; Facilities</a></li>
                    <li><a href="reservation.php">Online Reservation</a></li-->
                    <li><a href="admin.php">Back to Admin</a></li>
                </ul>
				<ul class="nav navbar-nav navbar-right">
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $username?><span class="caret"></span></a>
						<ul class="dropdown-menu">
						  <li><a href="show_all_room.php?q=logout">Logout</a></li>
						</ul>
					</li>
                </ul>
            </div>
        </nav>
        
        
        
        <?php
        
        $sql="SELECT * FROM rooms WHERE book='true'";
        $result = mysqli_query($user->db, $sql);
        if($result)
        {
            if(mysqli_num_rows($result) > 0)
            {
//               ********************************************** Show Room Category***********************
                while($row = mysqli_fetch_array($result))
                {
                    
                    echo "
                            <div class='row'>
                            <div class='col-md-2'></div>
                            <div class='col-md-6 well'>
                                <h4>".$row['room_cat']."</h4><hr>
                                <h6>Checkin: ".$row['checkin']." and checkout: ".$row['checkout']."</h6>
                                <h6>Name: ".$row['name']."</h6>
                                <h6>Phone: ".$row['phone']."</h6>
                                <h6>Booking Condition: ".$row['book']."</h6>
                            </div>
                            &nbsp;&nbsp;
                            <a href='edit_all_room.php?id=".$row['room_id']."'><button class='btn btn-primary button'>Edit</button></a>
							<a href='cancel_booking.php?id=".$row['room_id']."'><button class='btn btn-danger button'>Cancel Booking</button></a>
                            </div>
                            
                    
                    
                         ";
                    
                    
                }
                
                
                          
            }
            else
            {
                //echo "NO Data Exist";
		echo "
                            <div class='row'>
                            <div class='col-md-2'></div>
                            <div class='col-md-6 well'>
                                <h4>NO Booking Exist</h4><hr>
                            </div>
                            </div>
                         ";
            }
        }
        else
        {
            echo "Cannot connect to server".$result;
        }
        
        
        
        
        
        ?>


    </div>
    
    
    
    
    





    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>