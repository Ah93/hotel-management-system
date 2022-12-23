<?php
include_once 'admin/include/class.user.php'; 
$user=new User();

$roomname=$_GET['roomname'];

//$sql="DELETE FROM room_category WHERE roomname='$roomname'";
$sql="DELETE room_category, rooms
FROM room_category
INNER JOIN rooms ON room_category.roomname = rooms.room_cat
where room_category.roomname = '$roomname'";
$query=mysqli_query($user->db, $sql);

if($query)
		{
	    //echo '<script>alert("Welcome to Geeks for Geeks")</script>';
		//header("Location: ./delete_room.php");
				echo "<script>
		alert('All $roomname rooms have been deleted!!');
		window.location.href='./delete_room_cat.php';
		</script>";
		}
		else
		{
			echo "<script>
		alert('Sorry, Internel Error');
		window.location.href='./delete_room_cat.php';
		</script>";
		}
?>