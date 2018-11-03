<?php 
include '../config/connection.php';
session_start();

$session_id=$_SESSION['uid'];

$ses_sql=mysqli_query($conn, "SELECT username FROM users WHERE uid='$session_id'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['username'];
if(!isset($login_session)){
mysql_close($conn); // Closing Connection
header('Location: login.php'); // Redirecting To Home Page
}
?>