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
    <title>Hotel Reports</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
    
    
    <style>
          
        .well {
            background: rgba(255,255,255);
            border: none;
            height: auto;
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
						  <li><a href="view_reports.php?q=logout">Logout</a></li>
						</ul>
					</li>
                </ul>
            </div>
        </nav>
        
        <div class='row'>
                            <div class='col-lg-3'></div>
                            <div class='col-lg-12 well'>
                                  <div style="width: 100%; overflow-x: auto;">
                                <table id='example' class='table table-striped table-bordered' style='overflow-x:auto;'>
        <thead>
            <tr>
                <th>Name</th>
                <th>ID No</th>
                <th>Phone No</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Room Type</th>
				<th>Room No</th>
				<th>Room Price</th>
				<th>Nubmber of Nights</th>
				<th>Total</th>
				<th>Booking Status</th>
				<th>Admin Name</th>
				<th>Date</th>
            </tr>
        </thead>
<tbody>
<?php
        
       $sql="SELECT * FROM customers";
        $result = mysqli_query($user->db, $sql);
        if($result)
        {
            if(mysqli_num_rows($result) > 0)
            {
//               ********************************************** Show Room Category***********************
                while($row = mysqli_fetch_array($result))
                {
/*$name = $row['name'];
$id_num = $row['id_num'];
$phoneno = $row['phoneno'];
$checkin = $row['checkin'];
$checkout = $row['checkout'];
$room_categ = $row['room_categ'];
$room_num = $row['room_num'];
$price_per_night = $row['price_per_night'];
$num_of_night = $row['num_of_night'];
$total_price = $row['total_price'];
$booking_status = $row['booking_status'];
$admin_name = $row['admin_name']; */
					?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['id_num']; ?></td>
                <td><?php echo $row['phoneno'] ?></td>
                <td><?php echo $row['checkin']; ?></td>
                <td><?php echo $row['checkout']; ?></td>
                <td><?php echo $row['room_categ']; ?></td>
				<td><?php echo $row['room_num']; ?></td>
                <td><?php echo $row['price_per_night']; ?></td>
                <td><?php echo $row['num_of_night']; ?></td>
                <td><?php echo $row['total_price']; ?></td>
                <td><?php echo $row['booking_status']; ?></td>
                <td><?php echo $row['admin_name']; ?></td>
				<td><?php echo $row['event_date']; ?></td>
            </tr>
       <?php
}
		}}
?> 
 </tbody>
			</table>
			</div>
                            </div>
                            </div>
    </div>
    
    
    
    
    





    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
</body>

<script>
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
       /* buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]*/
        buttons: [
{
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
            {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'LEGAL',
				className: "btn-sm"
            },
                {
                  extend: "print",
                  className: "btn-sm"
                },
        ]
    } );
} );
</script>
</html>