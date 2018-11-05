<?php 
include '../config/connection.php';
session_start();

$session_id=$_SESSION['uid'];

$ses_sql=mysqli_query($conn, "SELECT username FROM users WHERE uid='$session_id'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['username'];
if(!isset($login_session)){
mysql_close($conn); // Closing Connection
header('Location: login.php'); // Redirecting To Home Page
}

//load the page with events

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
	$ename =  $erow['ename'];
	$about = $erow['about'];
	$image =  $erow['image'];
	$video =  $erow['video'];
	$location =  $erow['location'];
	$date =  $erow['date'];
	$date_create =  $erow['date_created'];
	$ticket = "FREE";

	if (date("y-m-d")==date("y-m-d", strtotime($date_create))) {
		$cdate= "Today";
		
			} else{
				$cdate= date("d-m-Y", strtotime($date_create));
			}

	if (date("y-m-d")==date("y-m-d", strtotime($date))) {
		$date= "Today";
		
			} elseif (date("y-m-d")>date("y-m-d", strtotime($date))) {
				$date= "Past";
			} elseif (date("y-m-d")<date("y-m-d", strtotime($date))){

				$date= date("d-m-Y", strtotime($date));
			}

	//2018-11-04 00:10:45

	$name_sql=mysqli_query($conn, "SELECT fname, lname FROM users WHERE uid = '$uid'");
	$nrow = mysqli_fetch_assoc($name_sql);
	$event_creator = $nrow['fname']." ".$nrow['lname'];


	$list .= '<div class="col-lg-4" style="margin-bottom: 15px;">
		    	<div class="card">
				    <img class="card-img-top" src="../img/event1.jpg" alt="Card image cap" style="height: 350px;">
					  <div class="card-body">
				      <h5 class="card-title" style="margin-bottom: 0.1rem;">'.strtoupper($ename).'</h5>
				      <p class="card-text" style="margin-bottom: 0rem;">'.ucfirst($about).'</p>
				      <ul class="list-group list-group-flush">

					    <li class="list-group-item" style="padding: -0.25rem 1.25rem;">
					    	<i class="fa fa-map-marker-alt iconcolors"> </i> ' .ucwords($location).'
					    	<br>
					    	<i class="fa fa-calendar-alt iconcolors"></i> '.$date. '  <i class="fa fa-clock iconcolors"></i> '.date("h:iA",strtotime($date)).'
					    </li>

					    <li class="list-group-item"><i class="fa fa-ticket-alt iconcolors"></i> Ticket: <b> '.strtoupper($ticket).'</b></li>
					  </ul> <br>
				      <a href="#" class="btn btn-primary">Event Details</a>
				    </div>
				    <div class="card-footer">
				      <small class="text-muted">Published: <b> '.$cdate.'</b>  By: <b>'.ucwords($event_creator).'</b></small>
				    </div>
				  </div>
		    </div>';
}

?>