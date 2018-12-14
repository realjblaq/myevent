<?php 
include '../config/connection.php';
$eidx = '';
// exit();

if (isset($_GET['bookingID'])) {
	$eidx = $_GET['bookingID'];

}

$sql = "DELETE FROM events WHERE eid='$eidx'"; 
if(mysqli_query($conn, $sql)){ 
    header('Location:edit_event.php');
}  
else{ 
    echo "ERROR: Could not be able to execute $sql. "  
                                   . mysqli_error($conn); 
} 
mysqli_close($conn); 


?>