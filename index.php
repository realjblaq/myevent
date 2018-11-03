<!DOCTYPE html>
<html>
<head>
	<title>MYeVENT-Home</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="favicon.png"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap-grid.min.css">
 	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
<!-- 	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
 -->
	
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

		    <div class="col-lg-4" style="margin-bottom: 40px">
		    	<div class="card">
				    <div class="card-img-top" alt="Card image cap" style="width: 100%;height:300px;background-image: url(img/event1.jpg); background-size: contain;"></div>
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
				    <div class="card-img-top" alt="Card image cap" style="width: 100%;height:300px;background-image: url(img/event3.jpg); background-size: contain;"></div>
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
				    <div class="card-img-top" alt="Card image cap" style="width: 100%;height:300px;background-image: url(img/event2.jpg); background-size: contain;"></div>
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

	  	<button class="btn" id="pop">alert</button>

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