<?php 
include '../config/connection.php';
session_start();

if (!isset($_SESSION['uid'])) {
	mysqli_close($conn); // Closing Connection
    echo '<script type="text/javascript">alert("You have to login first!");window.location = "../authentication/login.php";</script>';
}

$session_id=$_SESSION['uid'];

//for user name
$ses_sql=mysqli_query($conn, "SELECT username FROM users WHERE uid='$session_id'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['username'];

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

$event_sql=mysqli_query($conn, "SELECT * FROM events WHERE edate>= CURDATE() ORDER BY date_created DESC");
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
					    <i class="fa fa-clock iconcolors"></i><b> '.date("h:iA",strtotime($edate)).'</b>
					    </small>
					    </li>

					    <li class="list-group-item"><i class="fa fa-ticket-alt iconcolors">
					    <small></i> Rate: <b> '.strtoupper($ticket).'</b></small>
					    </li>

					  </ul> <br>
				      <a href="../event_page.php?id='.$eid.'" class="btn btn-primary btn-sm"><small>Event Details</small></a>
				    </div>
				    <div class="card-footer" style="height:40px; padding-top:5px;">
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