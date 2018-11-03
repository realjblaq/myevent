<?php 
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "myevent";

	try {
		 $conn = new mysqli($servername, $username, $password,$dbname) or die("Connect failed: %s\n". $conn -> error);
		
	} catch (Exception $e) {
		echo $e;
		
	}
?>