<?php
session_start();
include_once 'admin/include/class.user.php'; 
$user=new User();
$username=$_SESSION['fullname'];
$room_id=$_GET['room_id'];

$sql="UPDATE rooms  SET checkin='0000-00-00', checkout='0000-00-00', name='', cus_id='0', phone='0', book='false' WHERE room_id=$room_id";
$query=mysqli_query($user->db, $sql);

$sql="UPDATE customers  SET booking_status='checkedOut', admin_name='$username' WHERE room_id=$room_id and booking_status='checkedIn'";
$query=mysqli_query($user->db, $sql);
if($query)
		{
	    //echo '<script>alert("Welcome to Geeks for Geeks")</script>';
		//header("Location: ./delete_room.php");
				echo "<script>
		alert('Checkout done. The room is free now !!');
		window.location.href='./checkoutPage.php';
		</script>";
		}
		else
		{
			echo "<script>
		alert('Sorry, Internel Error');
		window.location.href='./checkoutPage.php';
		</script>";
		}
?>