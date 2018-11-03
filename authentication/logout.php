<script type="text/javascript" src="../js/sweetalert.js"></script>
<?php
session_start();
	$logoutalert = '';
if(session_destroy()) // Destroying All Sessions
{
	$logoutalert = "<script type='text/javascript'>
						const toast = swal.mixin({
						  toast: true,
						  position: 'top-end',
						  showConfirmButton: false,
						  timer: 3000
						});

						toast({
						  type: 'success',
						  title: 'Signed in successfully'
						})
					</script>";

	echo $logoutalert;
	header("Location: ../index.php"); // Redirecting To Login Page
}
?>

