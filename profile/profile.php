<?php 
include('../authentication/session.php');
// echo $_SESSION['uid'];exit();
?>
<!DOCTYPE html>
<html>
<head>
	<title>MYeVENT-Home</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="../favicon.png"/>
	<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-grid.min.css">
 	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">

</head>
<body class="bodypadding">


	<?php include '../topnav.php'; ?>

<br>      	

 <div class="container">
 		<div class="row">
 			<?php 
			echo $list;
 			?>
	  	</div>
	</div>	

	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/sweetalert.min.js"></script>
	<script type="text/javascript" src="../js/popper.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.bundle.js"></script>


</body>
</html>