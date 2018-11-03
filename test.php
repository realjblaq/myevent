<?php include 'config/connection.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>test</title>
	<!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->
		<link rel="stylesheet" type="text/css" href="css/sweetalert2.min.css">
</head>
<body>

	
<?php 

// $userid_check = ;

$email = "info@jblaq.com";
$pass = md5("Admin");

$query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND password = '$pass' ");
while ($list = mysqli_fetch_assoc($query)) {
	echo $list['uid'];
}
// $rows = mysqli_num_rows($query);
// $login_session =$rows['username'];
// echo $login_session;
?>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/sweetalert2.min.js"></script>
<script type="text/javascript" src="js/popper.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<script type="text/javascript">
	$('#pop').click(function(e){
		window.swal = require('js/sweetalert2');

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
	});
</script>
</body>
</html>