<?php 
include '../config/connection.php';
session_start();

$session_id=$_SESSION['uid'];

//for user name
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
	$etype = '';
	$about = '';
	$image =  '';
	$video =  '';
	$location = '';
	$edate =  '';
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

	//check event type (free or paid)

	if ($etype=='paid') {
		$ticket = "GHS ".$ticket_price;
	}else{
		$ticket = "free";
	}

	if (date("y/m/d")==date("y/m/d", strtotime($date_create))) {
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

	//user full name
	$name_sql=mysqli_query($conn, "SELECT fname, lname FROM users WHERE uid = '$uid'");
	$nrow = mysqli_fetch_assoc($name_sql);
	$event_creator = $nrow['fname']." ".$nrow['lname'];


	// for index and profile page
	$list .= '<div class="col-lg-4" style="margin-bottom: 15px;">
		    	<div class="card">
				    <img class="card-img-top" src="../media/images/'.$image.'" alt="Card image cap" style="height: 350px;">
					  <div class="card-body">
				      <h5 class="card-title" style="margin-bottom: 0.1rem;">'.strtoupper($ename).'</h5>
				      <p class="card-text card_p">'.ucfirst($about).'</p>
				      <ul class="list-group list-group-flush">

					    <li class="list-group-item" style="padding: -0.25rem 1.25rem;">
					    	<i class="fa fa-map-marker-alt iconcolors"> </i> ' .ucwords($location).'
					    	<br>
					    	<i class="fa fa-calendar-alt iconcolors"></i> '.$edate. '  <i class="fa fa-clock iconcolors"></i> '.date("h:iA",strtotime($edate)).'
					    </li>

					    <li class="list-group-item"><i class="fa fa-ticket-alt iconcolors"></i> Rate: <b> '.strtoupper($ticket).'</b></li>
					  </ul> <br>
				      <a href="../event_page.php?id='.$eid.'" class="btn btn-primary">Event Details</a>
				    </div>
				    <div class="card-footer">
				      <small class="text-muted">Published: <b> '.$cdate.'</b>  By: <b>'.ucwords($event_creator).'</b></small>
				    </div>
				  </div>
		    </div>';

		    // for edit_event
		    // $listx .='<hr class="hr"></hr>
      //       <div class="container-fluid">

      //           <div class="row alert alert-secondary">
      //           <div class="col">
      //               '.strtoupper($ename).'
      //           </div>
      //           <div class="col">
      //               <small>Published on: '.$date_create.'</small>
      //           </div>
      //           <div class="col-1">
      //               <button class="btn btn-secondary">
      //                   <i class="fa fa-edit"></i> Edit
      //               </button>
      //           </div>
      //           <div class="col-2">
      //               <button class="btn btn-danger">
      //                  <i class="fa fa-trash"></i> Delete
      //               </button>
      //           </div>
      //       </div>
                
      //       </div>';

}

?>