<?php
session_start();
include_once 'include/class.user.php';
$user=new User();

if(!$user->get_session()) 
{ 
    header("location:admin/login.php"); 
}

if(isset($_GET['q'])) 
{ 
    $user->user_logout();
 header("location:../index.php"); 
} 
?>