<?php
session_start();
include_once 'admin/include/class.user.php'; 
$user=new User();
$username=$_SESSION['fullname'];
$id=$_GET['id'];

$sql="UPDATE rooms  SET checkin='', checkout='', name='',  cus_id='', phone='', num_of_night='', book='false' WHERE room_id=$id";
$query=mysqli_query($user->db,$sql);

$sql1="UPDATE customers  SET booking_status='Cancelled', admin_name='$username' WHERE booking_status='checkedIn' and room_id=$id";
$query1=mysqli_query($user->db,$sql1);
if($query && $query1)
		{
	    //echo '<script>alert("Welcome to Geeks for Geeks")</script>';
		//header("Location: ./delete_room.php");
				echo "<script>
		alert('Room has been deleted!!');
		window.location.href='./show_all_room.php';
		</script>";
		}
		else
		{
			echo "<script>
		alert('Sorry, Internel Error');
		window.location.href='./show_all_room.php';
		</script>";
		}
?>