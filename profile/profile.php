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
<body style="padding-top: 60px; ">


	<nav class="navbar navbar-dark bg-dark sticky">

	  <a class="navbar-brand" href="#">
	  	<img src="../img/logo min.png" width="35" height="35" alt="">
	    <img src="../img/logowhite.png" width="150" height="30" alt="">
	  </a>

	<form class="form-inline">
    	<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    	<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
 	</form>

 	<!-- dropdown -->
 	<div class="nav-item dropdown" >
	    <a style="color: white;" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"> </i> Hi, <?php echo ucwords($login_session); ?></a>
	    <div class="dropdown-menu">
	      </i><a class="dropdown-item" href="../authentication/logout.php"><i class="fa fa-sign-out-alt"></i> Logout</a>
	    </div>
  	</div>
   	

     
	</nav> 
	<!-- end of nav -->

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