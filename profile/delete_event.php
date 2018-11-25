<?php 
include '../config/connection.php';
$eidx = '';

if (isset($_GET['eidx'])) {
	$eidx = $_GET['eidx'];

}

$sql = "DELETE FROM events WHERE eid='$eidx'"; 
if(mysqli_query($conn, $sql)){ 
    header('Location:edit_event.php');
}  
else{ 
    echo "ERROR: Could not able to execute $sql. "  
                                   . mysqli_error($conn); 
} 
mysqli_close($conn); 


?>