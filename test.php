<!DOCTYPE html>
<html>
<head>
	<title>MYeVENT-Home</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="favicon.png"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap-grid.min.css">
 	<!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	
</head>
<body>
	<nav class="navbar navbar-dark bg-dark">

	  <a class="navbar-brand" href="#">
	  	<img src="img/logo min.png" width="35" height="35" alt="">
	    <img src="img/logowhite.png" width="150" height="30" alt="">
	  </a>

	<form class="form-inline">
    	<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    	<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
 	</form>

     <form class="form-inline my-2 my-lg-0" style="color: white;">
     	<a href="authentication/login.php" class="a" style="color: white;"> Login</a>
     	<span style="width: 20px;">  </span>
      	<a href="authentication/register.php" class="a" style="color: white;">Register</a>
   	 </form>

	</nav> 
	<!-- end of nav -->

<!-- 	<i class="fa fa-user">JUSTICE</i>
 -->	
<br>      	

 <div class="container">
		<div class="row">
		    <div class="col-lg-4" >
		    	<div class="card">
				    <img class="card-img-top" src="img/event1.jpg" alt="Card image cap" style="height: 350px;">
					  <div class="card-body">
				      <h5 class="card-title" style="margin-bottom: 0.1rem;"><?php echo strtoupper("Project 2 Defence");  ?></h5>
				      <p class="card-text" style="margin-bottom: 0rem;">Project presentation by Valley View final year students.</p>
				      <ul class="list-group list-group-flush">

					    <li class="list-group-item" style="padding: -0.25rem 1.25rem;">
					    	<i class="fa fa-map-marker-alt"></i> <b>Lab 1, Valley View University </b>
					    	<br>
					    	<i class="fa fa-calendar-alt"></i> 26-10-18  <i class="fa fa-clock"></i> 5:50pm
					    </li>

					    <li class="list-group-item"><i class="fa fa-ticket-alt"></i><b> Ticket: </b> FREE</li>
					  </ul> <br>
				      <a href="#" class="btn btn-primary">Event Details</a>
				    </div>
				    <div class="card-footer">
				      <small class="text-muted">Published on: 27-10-18</small>
				    </div>
				  </div>
		    </div>

		    
		    

	</div>	
	


 <script type="text/javascript" src="js/jquery.js"></script>
 <script type="text/javascript" src="js/sweetalert.min.js"></script>
 <script type="text/javascript" src="js/bootstrap.bundle.js"></script>
 <script type="text/javascript" src="js/bootstrap.min.js"></script>

 <script type="text/javascript">
 	
 	// function salert(){
		// const toast = swal.mixin({
		//   toast: true,
		//   position: 'top-end',
		//   showConfirmButton: false,
		//   timer: 3000
		// });

		// toast({
		//   type: 'success',
		//   title: 'Signed in successfully'
		// })

		// swal("Good job!","You have registered.","success");
 	// }
 </script>

 </body>
</html>