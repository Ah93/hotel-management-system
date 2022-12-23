<?php
include_once 'admin/include/class.user.php'; 
$user=new User();

$room_id=$_GET['room_id'];

$sql="DELETE FROM rooms WHERE room_id='$room_id'";
$query=mysqli_query($user->db, $sql);

if($query)
		{
	    //echo '<script>alert("Welcome to Geeks for Geeks")</script>';
		//header("Location: ./delete_room.php");
				echo "<script>
		alert('Room has been deleted!!');
		window.location.href='./delete_room.php';
		</script>";
		}
		else
		{
			echo "<script>
		alert('Sorry, Internel Error');
		window.location.href='./delete_room.php';
		</script>";
		}
?>