<?php session_start();
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
    <title>Admin Panel</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">

    <style>
        .well {
            background: rgba(0, 0, 0, 0.7);
            border: none;
            height: 220px;
        }
        
        body {
            background-image: url('images/home_bg.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        
        h4 {
            color: #ffbb2b;
        }
        
        ul {
            color: white;
            font-size: 13px;
        }
    </style>


</head>

<body>
    <div class="container">


        <img class="img-responsive" src="images/home_banner.jpg" style="width:100%; height:180px;">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <!--ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="room.php">Room &amp; Facilities</a></li>
                    <li><a href="reservation.php">Online Reservation</a></li>
                    <li class="active"><a href="admin.php">Admin</a></li>
                </ul-->
				<ul class="nav navbar-nav navbar-right">
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $username?><span class="caret"></span></a>
						<ul class="dropdown-menu">
						  <li><a href="admin.php?q=logout">Logout</a></li>
						</ul>
					</li>
                </ul>
            </div>
        </nav>


        <div class="row">
           <div class="col-md-3"></div>
            <div class="col-md-6 well">
                <h4>Bookings</h4>
                <hr>
                <ul>
                    <li><a href="room.php">Book New</a></li>
					<li><a href="show_all_available_rooms.php">View All Available Rooms</a></li>
                    <li><a href="show_all_room.php">View All Booked Rooms</a></li>
                    <!--li><a href="show_all_room.php">Edit Booked Room</a></li-->
					<li><a href="checkoutPage.php">Check Out</a></li>
					<li><a href="view_reports.php">View Reports</a></li>
                </ul>
            </div>
           <div class="col-md-3"></div>
        </div>
        
		<div class="row">
           <div class="col-md-3"></div>
            <div class="col-md-6 well">
                <h4>Manage Rooms</h4>
                <hr>
                <ul>
                    <li><a href="admin/addroom.php">Add Rooms</a></li>
					<li><a href="add_room_number.php">Add Room Number</a></li>
					<li><a href="edit_room_number.php">Edit Room Number</a></li>
                    <li><a href="show_room_cat.php">Edit Room Category</a></li>
					<li><a href="delete_room.php">Delete Room</a></li>
					<li><a href="delete_room_cat.php">Delete Room Category</a></li>
                </ul>
            </div>
            <div class="col-md-3"></div>
        </div>
        
        <div class="row">
           <div class="col-md-3"></div>
            <div class="col-md-6 well">
                <h4>Add New Manager</h4>
                <hr>
                <ul>
                    <li><a href="admin/registration.php">Add Manager</a></li>
 
                </ul>
            </div>
            <div class="col-md-3"></div>
        </div>









    </div>










    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>