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
 	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

</head>
<body>


	<nav class="navbar navbar-inverse navbar-dark bg-dark flex-row ml-md-auto d-none d-md-flex">

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

		    <div class="col-lg-4" style="margin-bottom: 40px">
		    	<div class="card">
				    <div class="card-img-top" alt="Card image cap" style="width: 100%;height:300px;background-image: url(../img/event1.jpg); background-size: contain;"></div>
				    <div class="card-body" style="position: relative;">
				      <h5 class="card-title">Event 1</h5>
				      <div style="height: 120px;">
				      	<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
				      </div>
				      
				      <a href="#" class="btn btn-primary" style="position:absolute;bottom:0;margin-bottom: 15px;">Event Details</a>
				    </div>
				    <div class="card-footer">
				      <small class="text-muted">Published on: 27-10-18</small>
				    </div>
				  </div>
		    </div>

		    <div class="col-lg-4" style="margin-bottom: 40px">
		    	<div class="card">
				    <div class="card-img-top" alt="Card image cap" style="width: 100%;height:300px;background-image: url(../img/event3.jpg); background-size: contain;"></div>
				    <div class="card-body" style="position: relative;">
				      <h5 class="card-title">Event 1</h5>
				      <div style="height: 120px;">
				      	<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
				      </div>
				      
				      <a href="#" class="btn btn-primary" style="position:absolute;bottom:0;margin-bottom: 15px;">Event Details</a>
				    </div>
				    <div class="card-footer">
				      <small class="text-muted">Published on: 27-10-18</small>
				    </div>
				  </div>
		    </div>

		    <div class="col-lg-4" style="margin-bottom: 40px">
		    	<div class="card">
				    <div class="card-img-top" alt="Card image cap" style="width: 100%;height:300px;background-image: url(../img/event2.jpg); background-size: contain;"></div>
				    <div class="card-body" style="position: relative;">
				      <h5 class="card-title">Event 1</h5>
				      <div style="height: 120px;">
				      	<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
				      </div>
				      
				      <a href="#" class="btn btn-primary" style="position:absolute;bottom:0;margin-bottom: 15px;">Event Details</a>
				    </div>
				    <div class="card-footer">
				      <small class="text-muted">Published on: 27-10-18</small>
				    </div>
				  </div>
		    </div>

	  	</div>
	</div>	

	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/sweetalert.min.js"></script>
	<script type="text/javascript" src="../js/popper.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.bundle.js"></script>


</body>
</html>