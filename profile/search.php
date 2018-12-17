<?php 
	include('../config/connection.php');
	session_start();

	// if (isset($_SESSION['uid'])) {
	// 	header('location:profile.php');
	// }

	//search query------------------------------------------------------------------
	$search_value='';
if (isset($_POST['search'])) {
	$search_value = $_POST['search_value'];

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


$event_sql=mysqli_query($conn, "SELECT * FROM events WHERE (`ename` LIKE '%$search_value%') ORDER BY date_created DESC");
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

	$name_sql=mysqli_query($conn, "SELECT fname, lname FROM users WHERE uid = '$uid'");
	$nrow = mysqli_fetch_assoc($name_sql);
	$event_creator = $nrow['fname']." ".$nrow['lname'];


	$list .= '<div class="col-lg-4" style="margin-bottom: 15px;">
		    	<div class="card">

				    <img class="card-img-top zoom2" src="../media/images/'.$image.'" alt="Card image cap" style="height: 350px;">

					  <div class="card-body" style="height:240px;">
				      <h5 class="card-title" style="margin-bottom: 0.1rem;">'.strtoupper($ename).'</h5>
				      <cite class="card-text card_p"><small>'.ucfirst($about).'</small></cite>

				      <ul class="list-group list-group-flush">

					    <li class="list-group-item card_p" style="padding: -0.25rem 1.25rem;">
					    	<small><i class="fa fa-map-marker-alt iconcolors"> </i><b> ' .ucwords($location).'</b></small>
					    </li>

					    <li class="list-group-item">
					    <small>
					    <i class="fa fa-calendar-alt iconcolors"></i><b> '.$edate.'</b>
					    <i class="fa fa-clock iconcolors"></i><b> '.date("h:iA",strtotime($etime)).'</b>
					    </small>
					    </li>

					    <li class="list-group-item">
					    <small><i class="fa fa-ticket-alt iconcolors"></i> Rate: <b> '.strtoupper($ticket).'</b></small>
					    </li>

					  </ul> <br>

				      <a href="../event_page.php?id='.$eid.'" class="btn btn-primary btn-sm"><small>Event Details</small></a>

				    </div>

				    <div class="card-footer" style="height:40px; padding-top:5px;">
				      <small class="text-muted">Published: <b> '.$cdate.'</b>  By: <b>'.ucwords($event_creator).'</b></small>
				    </div>

				  </div>
		    </div>';
}

}elseif(empty($_POST['search_value'])){
	echo '<script type="text/javascript">alert("Nothing was found!");window.location = "../index.php";</script>';
}
	

?>
<!DOCTYPE html>
<html>
<head>
	<title>MYeVENT-Search</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="../favicon.png"/>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-grid.min.css">
 	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
<!-- 	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
 -->
	
</head>
<body class="pagebody" style="padding-top: 80px;">
	<nav class="navbar navbar-dark bg-dark sticky" id="navbar"">

	  <a class="navbar-brand" href="../index.php">
	  	<img src="../img/logo_min.png" width="35" height="35" alt="">
	    <img src="../img/logowhite.png" width="150" height="30" alt="">
	  </a>

	<form class="form-inline" method="post" action="search.php">
		<div class="input-group input-group-sm mb-3">
		  <div class="input-group-prepend">
		    <span class="input-group-text" id="inputGroup-sizing-sm">Search</span>
		  </div>
		  	<input type="search" class="form-control mr-sm-2" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="search_value"  value="<?php echo $search_value; ?>">
    		<button class="btn btn-outline-primary btn-sm my-2 my-sm-0" type="submit" name="search">Search</button>
		</div>
    	<!-- <input class="form-control mr-sm-2" type="search" value="<?php echo $search_value; ?>" aria-label="Search" name="search_value" >
    	<button class="btn btn-outline-primary my-2 my-sm-0" type="submit" name="search">Search</button> -->
 	</form>

 	<a class="btn btn-primary btn-sm my-2 my-sm-0" href="dashboard.php"><i class="fa fa-plus"></i> Create Event</a>

     <form class="form-inline my-2 my-lg-0" style="color: white;">
     	<a href="../authentication/login.php" class="a" style="color: white;"> Login</a>
     	<span style="width: 20px;">  </span>
      	<a href="../authentication/register.php" class="a" style="color: white;">Register</a>
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

 <script type="text/javascript" src="../js/jquery.js"></script>
 <script type="text/javascript" src="../js/sweetalert.min.js"></script>
 <script type="text/javascript" src="../js/bootstrap.bundle.js"></script>
 <script type="text/javascript" src="../js/bootstrap.min.js"></script>

 <script type="text/javascript">
 	
 </script>

 </body>
</html>