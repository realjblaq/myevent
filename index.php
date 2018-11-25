<?php 
	include('config/connection.php');
	session_start();

	$eid =  '';
	$uid =  '';
	$ename =  '';
	$about = '';
	$image =  '';
	$video =  '';
	$location = '';
	$date =  '';
	$date_create =  '';
	$ticket = '';
	$event_creator = '';
	$cdate = '';


$event_sql=mysqli_query($conn, "SELECT * FROM events ORDER BY date_created DESC");
$list = '';
while ($erow = mysqli_fetch_assoc($event_sql)) {
	$eid =  $erow['eid'];
	$uid =  $erow['uid'];
	$etype = $erow['etype'];
	$ename =  $erow['ename'];
	$about = $erow['about'];
	$image =  $erow['image'];
	$video =  $erow['video'];
	$location =  $erow['location'];
	$edate =  $erow['edate'];
	$date_create =  $erow['date_created'];
	$ticket_qty = $erow['ticket_qty'];
	$ticket_price = $erow['ticket_price'];
	$_SESSION['eid'] = $eid;
	$etime = $erow['edate'];


	//check event type (free or paid)

	if ($etype=='paid') {
		$ticket = "GHS ".$ticket_price;
	}else{
		$ticket = "free";
	}

	if (date("y-m-d")==date("y-m-d", strtotime($date_create))) {
		$cdate= "Today";
		
			} else{
				$cdate= date("d/m/Y", strtotime($date_create));
			}

	if (date("y-m-d")==date("y-m-d", strtotime($edate))) {
		$edate= "<span style='color:#079b07;'>Today</span>";
		
			} elseif (date("y-m-d")>date("y-m-d", strtotime($edate))) {
				$edate= "<span style='color:red;'>Past</span>";
			} elseif (date("y-m-d")<date("y-m-d", strtotime($edate))){

				$edate= date("d/m/Y", strtotime($edate));
			}
	//2018-11-04 00:10:45

	$name_sql=mysqli_query($conn, "SELECT fname, lname FROM users WHERE uid = '$uid'");
	$nrow = mysqli_fetch_assoc($name_sql);
	$event_creator = $nrow['fname']." ".$nrow['lname'];


	$list .= '<div class="col-lg-4" style="margin-bottom: 15px;">
		    	<div class="card">
				    <img class="card-img-top" src="media/images/'.$image.'" alt="Card image cap" style="height: 350px;">
					  <div class="card-body">
				      <h5 class="card-title" style="margin-bottom: 0.1rem;">'.strtoupper($ename).'</h5>
				      <p class="card-text card_p">'.ucfirst($about).'</p>
				      <ul class="list-group list-group-flush">

					    <li class="list-group-item" style="padding: -0.25rem 1.25rem;">
					    	<i class="fa fa-map-marker-alt iconcolors"> </i> ' .ucwords($location).'
					    	<br>
					    	<i class="fa fa-calendar-alt iconcolors"></i> '.$edate. '  <i class="fa fa-clock iconcolors"></i> '.date("h:iA",strtotime($etime)).'
					    </li>

					    <li class="list-group-item"><i class="fa fa-ticket-alt iconcolors"></i> Rate: <b> '.strtoupper($ticket).'</b></li>
					  </ul> <br>
				      <a href="event_page.php?id='.$eid.'" class="btn btn-primary">Event Details</a>
				    </div>
				    <div class="card-footer">
				      <small class="text-muted">Published: <b> '.$cdate.'</b>  By: <b>'.ucwords($event_creator).'</b></small>
				    </div>
				  </div>
		    </div>';
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>MYeVENT-Home</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="favicon.png"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap-grid.min.css">
 	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!-- 	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
 -->
	
</head>
<body class="pagebody" style="padding-top: 80px;">
	<nav class="navbar navbar-dark bg-dark sticky" id="navbar"">

	  <a class="navbar-brand" href="#">
	  	<img src="img/logo min.png" width="35" height="35" alt="">
	    <img src="img/logowhite.png" width="150" height="30" alt="">
	  </a>

	<form class="form-inline">
    	<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    	<button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
 	</form>

 	<a class="btn btn-primary my-2 my-sm-0" href="authentication/login.php"><i class="fa fa-plus"></i> Create Event</a>

     <form class="form-inline my-2 my-lg-0" style="color: white;">
     	<a href="authentication/login.php" class="a" style="color: white;"> Login</a>
     	<span style="width: 20px;">  </span>
      	<a href="authentication/register.php" class="a" style="color: white;">Register</a>
   	 </form>

	</nav> 
	<!-- end of nav --> 

 <div class="container">
		<div class="row">

		    <?php 
		    	echo $list;
		    ?>
		    
		    

	</div>	
</div>
	

	


 <script type="text/javascript" src="js/jquery.js"></script>
 <script type="text/javascript" src="js/sweetalert.min.js"></script>
 <script type="text/javascript" src="js/bootstrap.bundle.js"></script>
 <script type="text/javascript" src="js/bootstrap.min.js"></script>

 <!-- <script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
</script> -->

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