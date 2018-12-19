<?php 
	include 'config/connection.php';
	// session_start();
	// $session_id = $_SESSION['uid'];
	$fid = '';
	if ($_GET["id"]) {
		$fid = $_GET["id"];
	}

	$evaluation_form='';
	$announcement_form='';

	$event_sql=mysqli_query($conn, "SELECT * FROM events WHERE eid = '$fid'");
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
		$evaluate = $erow['evaluate'];
		$announcement = $erow['announcement'];
		$the_announcement = $erow['the_announcement'];
		$_SESSION['eid'] = $eid;	
		$tick = $ticket_price;

		if ($announcement==1) {
			$announcement_form='<div class="container">
			<div class="row">
				<div class="alert alert-success alert-dismissible" role="alert" style="width: 100%;">
			  	<button type="button" onclick="this.parentNode.parentNode.removeChild(this.parentNode);" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			  	<strong><i class="fa fa-warning"></i> Announcement!</strong> <marquee><p style="font-size:18pt; color:black;">'.$the_announcement.'</p></marquee>
				</div>
			</div>
		</div>';
		}

		if ($evaluate==1) {
			$evaluation_form='<section class="small jumbotron" style="display: block;">
					<form action="event_page.php?id='.$fid.'" method="post">
						<b style="">We would like to know what you think about this event.</b>
						<br><br>
					  <div class="row">

					  	<div class="col-sm-2"></div>

					    <div class="col-sm-4">

					      <input type="text" class="form-control form-control-sm" placeholder="Your name" name="name" required>
					    </div>
					    <div class="col-sm-4">
					      <input type="email" class=" form-control form-control-sm" placeholder="Email address" name="emails" required>
					    </div>

					  	<div class="col-sm-2"></div>
					   </div> <br>
					   <div class="row">
					  	<div class="col-sm-2"></div>
					    <div class="col-sm-4" >
					      <b>How would you rate this event?</b>
					    </div>
					    <div class="col-sm-4" style="text-align: left;">
					    	<div class="custom-control custom-radio">
						  <input type="radio" id="customRadio1" name="rating" class="custom-control-input" value="excellent" required>
						  <label class="custom-control-label" for="customRadio1">Excellent</label>
						</div>
						<div class="custom-control custom-radio">
						  <input type="radio" id="customRadio2" name="rating" class="custom-control-input" value="good">
						  <label class="custom-control-label" for="customRadio2">Good</label>
						</div>
						<div class="custom-control custom-radio">
						  <input type="radio" id="customRadio3" name="rating" class="custom-control-input" value="fair">
						  <label class="custom-control-label" for="customRadio3">Fair</label>
						</div>
						<div class="custom-control custom-radio">
						  <input type="radio" id="customRadio4" name="rating" class="custom-control-input" value="poor">
						  <label class="custom-control-label" for="customRadio4">Poor</label>
						</div>
						<div class="custom-control custom-radio">
						  <input type="radio" id="customRadio5" name="rating" class="custom-control-input" value="terrible">
						  <label class="custom-control-label" for="customRadio5">Terrible</label>
						</div>
					    </div>
					    
					  	<div class="col-sm-2"></div>

					   </div>
					   <br>

					   <div class="row">
					  	<div class="col-sm-2"></div>
					    <div class="col-sm-8" style="text-align: left;">
					    	<b>Do you have any other comments for us?</b>
					      <textarea type="text" class="form-control form-control-sm" placeholder="First name" name="comment"></textarea>
					      <br>
					      <button class="btn btn-primary btn-sm" type="submit" style="float: left;" name="submit">Submit</button>
					    </div>
					    <div class="col-sm">
					      <!-- <input type="text" class=" form-control form-control-sm" placeholder="Last name"> -->
					    </div>

					  	<div class="col-sm-2"></div>
					   </div> 
					   
					</form>
				</section>';
		}

		$v='';

		if($video){
			$v = 1;
		}else{
			$v= 0;
		}

		if ($etype=='paid') {
		$ticket = "GHS ".$ticket_price;
		
		}else{
			$ticket = strtoupper("free");
		}
	}
//------------------------------------------------------------------------------
	$fullname = '';
	$expectations = '';
	$messagex = '';
	$email = '';

	if (isset($_POST['register'])) {
		$fullname = $_POST['fullname'];
		$expectations = $_POST['expectations'];
		$email = $_POST['email'];

		$sql = "INSERT INTO register_event (eid, fullname, email, expectation)
	   	 	VALUES ('".$fid."','".$fullname."','".$email."','".$expectations."')";

	    	$result = mysqli_query($conn,$sql);

	   		if ($result) {

	   			$messagex = '<script type="text/javascript">swal("Good job!","You have registered.","success")</script>';
			}
			else
			{
				$messagex = "<script type='text/javascript'>swal('Error!', 'Registration failed!', 'error')</script>";		   
			}
	}

	//program outline--------------------------------------------------------------
	$outline_sql=mysqli_query($conn, "SELECT * FROM program_outline WHERE eid = '$fid' ORDER BY pid");
	$outline='';    
    while ($row = mysqli_fetch_assoc($outline_sql)) {
    	$pid_fetch = $row['pid'];
        $role_fetch =  $row['role'];
        $name_fetch =  $row['name'];
        $time_fetch =  $row['program_time'];

        $outline.='<tr>
			      <td>'.$role_fetch.'</td>
			      <td>'.$name_fetch.'</td>
			      <td>'.$time_fetch.'</td>
			   	 </tr>';
	}
//files fetch----------------------------------------------------------------------------
	$event_id = $_GET['id'];
	$filefetch_sql=mysqli_query($conn, "SELECT * FROM files WHERE eid = '$event_id'");
	$fileslist='';    
    while ($filerow = mysqli_fetch_assoc($filefetch_sql)) {
    	$file_id = $filerow['id'];
        $evid =  $filerow['eid'];
        $f_name =  $filerow['file_name'];

        $fileslist.='<tr>
				      <td style="text-align:left;">'.$f_name.'</td>
				      <td style="text-align:left;"><a href="download.php?id='.$event_id.'&filename='.$f_name.'" class="btn btn-success"> <i class="fa fa-download"></i> Download</a></td>
				    </tr>';

        // echo $f_name; exit();

    }

  //---download file---------------------------------------------------------
    if(isset($_REQUEST["file"])){
    // Get parameters
    $file = urldecode($_REQUEST["file"]); // Decode URL-encoded string
    $filepath = "images/" . $file;
    
    // Process download
    if(file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        flush(); // Flush system output buffer
        readfile($filepath);
        exit;
    }
}
//get the user (event creator)-----------------------------------------------------------------------
// $use_sql=mysqli_query($conn, "SELECT uid FROM events WHERE eid='$fid'");
// $rowe = mysqli_fetch_assoc($use_sql);
// $uid = $rowe['uid'];


///for user name---------------------------------------------------------------------
$user_sql=mysqli_query($conn, "SELECT * FROM users WHERE uid='$uid'");
$row = mysqli_fetch_assoc($user_sql);
$username =$row['username'];
$fname =$row['fname'];
$lname =$row['lname'];
$email =$row['email'];
$gender =$row['gender'];
$phone = $row['phone'];
$profession = $row['profession'];
$profile_pic = $row['profile_pic'];
$linkedin = $row['linkedin'];
$facebook = $row['facebook'];
$twitter = $row['twitter'];
$instagram = $row['instagram'];

//get profile picture---------------------------------------------------
$image_src = "media/profile_pictures/".$profile_pic;


//activate evaluation form----------------------------------------------
$name = '';
$emails = '';
$rating = '';
$comment = '';
if (isset($_POST['submit'])) {
	$name =  $_POST['name'];
	$emails =  $_POST['emails'];
	$rating =  $_POST['rating'];
	$comment =  $_POST['comment'];

	$sql = "INSERT INTO evaluation (eid, name, email, rating, comment)
	   	 	VALUES ('".$fid."','".$name."','".$emails."','".$rating."','".$comment."')";

	    	$result = mysqli_query($conn,$sql);

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>MYeVENT-<?php echo ucfirst($ename);?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

	<link rel="icon" type="image/png" href="favicon.png"/>
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-grid.min.css">
 	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/dashboard.css">
		<script type="text/javascript" src="js/sweetalert.min.js"></script>

	<!-- <link rel="stylesheet" type="text/css" href="css/jquery.mCustomScrollbar.css"> -->
	<!-- <link rel="stylesheet" type="text/css" href="css/flatpickr.css"> -->
</head>
<body style="margin:auto; margin-top:75px;">

	<?php echo $messagex;?>

	<nav class="navbar navbar-dark bg-dark sticky" id="navbar"">

	  <a class="navbar-brand" href="index.php">
	  	<img src="img/logo_min.png" width="35" height="35" alt="">
	    <img src="img/logowhite.png" width="150" height="30" alt="">
	  </a>

		<a class="btn btn-primary btn-sm my-2 my-sm-0" href="index.php"><i class="fa fa-home"></i> Back to Homepage</a>

		<a class="btn btn-primary btn-sm my-2 my-sm-0" href="profile/dashboard.php"><i class="fa fa-plus"></i> Create Event</a>


     <form class="form-inline my-2 my-lg-0" style="color: white;">
     	<i class="fa fa-share-alt" title="Share this event"></i>
     	<span style="width: 20px;">  </span>
     	<a href="https://www.facebook.com" target="_blank" class="a" style="color: white;" title="Share on facebook"> <img src="img/facebook.png" width="15"></a>
     	<span style="width: 20px;">  </span>
      	<a href="https://www.twitter.com" target="_blank" class="a" style="color: white;" title="Share on twitter"> <img src="img/twitter.png" width="15"></a>
   		<span style="width: 20px;">  </span>
      	<a href="https://www.instagram.com" target="_blank" class="a" style="color: white;" title="Share on instagram"> <img src="img/instagram.png" width="15"></a>
   	 </form>

	</nav> 
	<!-- end of top nav -->

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript">

			$(document).ready(function(){
				// Gets the video src from the data-src on each button
				var $videoSrc;  
				$('.video-btn').click(function() {
				    $videoSrc = $(this).data( "src" );
				});
				console.log($videoSrc);  
				  
				// when the modal is opened autoplay it  
				$('#myModal').on('shown.bs.modal', function (e) {
				    
				// set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get
				$("#video").attr('src',$videoSrc + "?rel=0&amp;showinfo=0&amp;modestbranding=1&amp;autoplay=1"); 
				})  
				  
				// stop playing the youtube video when I close the modal
				$('#myModal').on('hide.bs.modal', function (e) {
				    // a poor man's stop video
				    // $("#video").attr('src',$videoSrc); 
				     window.location.reload();
				})  

				// $('.close').click(function(){
				// 	$('.embed-responsive-item')[0].contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*');
				// }); 


			});
			

	</script>

	<div class="container ">
			<!-- ---------------------------------------------------------------------scroll announcement -->

		<?php echo $announcement_form; ?>
<!-- ----------------------------------------------------------------------------------------- -->
		<div class="row">
			<div class="col"></div>
			<div class="col-9 center alert">
				<h1 class="display-4"><strong><?php echo strtoupper($ename);?></strong></h1>
				<!-- ------------------------------------------------------------------------------------------ -->
				<?php echo $evaluation_form; ?>
				<!--  -->
				<!-- ------------------------------------------------------------------------------------------ -->
				
				<section id="tabs">
							<div class="container">
				<!-- 		<h6 class="section-title h1">Tabs</h6>
				 -->		<div class="row">
							<div class="col-xs-12 ">
								<nav>
									<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
										<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fa fa-clipboard-list"></i> Event Details</a>
										<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fa fa-list-alt"></i> Program Outline</a>
										<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fa fa-video"></i> Watch Live</a>
										<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-files" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fa fa-file"></i> Files</a>
										<a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false"><i class="fa fa-address-card"></i> Organizer</a>
									</div>
								</nav>
								<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
									<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
										
										<!-- <h1 class="display-4"><strong><?php echo strtoupper($ename);?></strong></h1> -->
										<!-- <hr class="hr"></hr> -->
										<div >
											<img class="zoom" src="media/images/<?php echo $image;?>" width="310">
										</div>
										<br>
										<br>
										<br>
										<br>
										<div class="card" style="min-width: 623px;">
											<div class="card-body">
												<p style="">
													<?php echo $about;?>
												</p>
											</div>
										</div>
										<br>
										<!-- <hr class="hr"></hr> -->

										<!-- -------------------------------------------- -->

										<div class="container" >
										<!-- Button trigger modal -->

										<button type="button" class="btn btn-primary video-btn" data-toggle="modal" data-src="media/videos/<?php echo $video?>" data-target="#myModal">
										 <i class="fa fa-video"></i> | Watch the video advert
										</button>
										<!-- Modal -->
										<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										  <div class="modal-dialog" role="document">
										    <div class="modal-content">		      
										      <div class="modal-body">
										       <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="vidicon" style="display: none;">
										          <span aria-hidden="true">&times;</span>
										       </button>        
										        <!-- 16:9 aspect ratio -->
												<div class="embed-responsive embed-responsive-16by9">
												  <iframe class="embed-responsive-item" src="" id="video"  allowscriptaccess="always">></iframe>
												</div>       
										      </div>

										    </div>
										  </div>
										</div> 
								  
									</div>
									<!-- ---------------------------------------------------- -->

									<hr class="hr"></hr>

									<div>
										<span>
											<i class="fa fa-calendar-alt"> </i> <?php echo date("d/m/Y", strtotime($edate)); ?>
											<span style="margin:0px 0px 50px 50px;"></span>
											<i class="fa fa-clock"> </i> <?php echo date("h:iA",strtotime($edate)); ?>
										</span>
										<hr class="hr"></hr>
										<span>
											<i class="fa fa-map-marker-alt"> </i> <?php echo ucwords($location); ?>
										</span>
										<hr class="hr"></hr>
										<span>
											Rate: <h5><strong><?php echo $ticket; ?></strong></h5> 							
										</span>
										<hr class="hr"></hr>

									<!-- <div class="container jumbotron">
										<h5 class="center">Want to attend this event? Register here.</h5>
											<br>
										<form method="post" action="">						  
										  <div class="form-group">
										    <small class="form-text text-muted">Full Name</small>
										    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter your full name" name="fullname" required>
										  </div>

										  <div class="form-group">
										    <small class="form-text text-muted">Email</small>
										    <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Email address" name="email" required>
										  </div>

										  <div class="form-group">
										    <small id="emailHelp" class="form-text text-muted">What are your expectations from the this event?</small>
										    <textarea type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="What are your expectations?" name="expectations" required></textarea>
										  </div>
										    <button type="submit" class="btn btn-primary" name="register">Register</button>
										</form>
									</div> -->

									<div class="container jumbotron" style="display: none;" id="buy">
										<h5 class="center">Buy Tickets For This Event</h5>
											<br>
										<form method="post" action="event_page.php">						  
										  <div class="form-row">
											    <div class="form-group col-md-6">
											      <small for="inputEmail4">Full Name</small>
											      <input type="email" class="form-control" id="inputEmail4" placeholder="Enter your full name" name="email">
											    </div>
											    <div class="form-group col-md-6">
											      <small for="inputPassword4">Quantity</small>
											      <input type="number" class="form-control" id="inputPassword4" placeholder="" value="" min="1" name="qty">
											    </div>
											</div>
											<div class="wrapper">
												<div class="form-group">
													<small class="form-group custom-control-inline" for="exampleFormControlTextarea1">Payment Method:</small>
						                        <div class="custom-control custom-radio custom-control-inline form-group">
						                            <input type="radio" id="customRadioInline1" name="mobile_money" class="custom-control-input" value="free" required checked>
						                            <label class="custom-control-label" for="customRadioInline1">MTN</label>
						                        </div>
						                        <div class="custom-control custom-radio custom-control-inline">
						                            <input type="radio" id="customRadioInline2" value="paid" name="mobile_money" class="custom-control-input" disabled>
						                            <label class="custom-control-label" for="customRadioInline2">AirtelTigo</label>
						                        </div>
												</div>
												
											</div>
											<div class="form-row">
											    <div class="form-group col-md-6">
												  <small for="inputPassword4">Mobile money number</small>
												  <input type="text" class="form-control" id="mobile" placeholder="Mobile number" name="mobile_number">
												</div>
												<div class="form-group col-md-6">
												  <small for="inputPassword4">Email (Provide a correct email address)</small>
												  <input type="email" class="form-control" id="mobile" placeholder="Email" name="email">
												</div>
											</div>
											<div class="wrapper">
										    	<button type="submit" class="btn btn-primary" name="buy">Buy</button>
											</div>
										</form>
									</div>
									<hr class="hr"></hr>


									<div class="container jumbotron">
										<h5 class="center">Want to attend this event? Register here.</h5>
											<br>
										<form method="post" action="">						  
										  <div class="form-group">
										    <small class="form-text text-muted">Full Name</small>
										    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter your full name" name="fullname" required>
										  </div>

										  <div class="form-group">
										    <small class="form-text text-muted">Email</small>
										    <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Email address" name="email" required>
										  </div>

										  <div class="form-group">
										    <small id="emailHelp" class="form-text text-muted">What are your expectations from the this event?</small>
										    <textarea type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="What are your expectations?" name="expectations" required></textarea>
										  </div>
										    <button type="submit" class="btn btn-primary" name="register">Register</button>
										</form>
									</div>
									</div>

									</div>
									<!-- program outline -->
									<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
										<table class="table table-hover" style="width: 800px; text-align: left;">
										  <thead>
										    <tr>
										      <th scope="col">Role</th>
										      <th scope="col">Name</th>
										      <th scope="col">Time</th>
										    </tr>
										  </thead>
										  <tbody>
										    <?php echo $outline; ?>

										  </tbody>
										</table>
									</div>
									<!-- live feed -->
									<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
										<div class="embed-responsive embed-responsive-16by9">
											<iframe width="560" height="315" src="https://www.youtube.com/embed/pg-dBpRcar0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
										  <!-- <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe> -->
										</div>
									</div>
									<!--  -->
									<div class="tab-pane fade" id="nav-files" role="tabpanel" aria-labelledby="nav-about-tab">
										<table class="table table-hover" style="width: 800px;">
										  <thead style="text-align: left;">
										    <tr>
										      <th scope="col">File Name</th>
										      <th scope="col">Action</th>
										    </tr>
										  </thead>
										  <tbody>
										    <?php echo $fileslist; ?>

										   </tbody>
										</table>
									</div>
									<!-- organizer-------------------------------------------------------- -->
									<div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
										<div class="container">
										  <div class="row">
										    <div class="col-md-6 img">
										      <img src="<?php echo $image_src; ?>"  alt="profile picture" class="rounded-circle" width="200" height="200">
										    </div>
										    <div class="col-md-6 details">
										      <blockquote>
										        <h5><?php echo $fname.' '.$lname; ?></h5>
										      	<span>Username: @<?php echo $username; ?></span><br>
										        <small><cite title="Source Title"><?php echo $profession; ?>  <i class="icon-map-marker"></i></cite></small>
										      </blockquote>
										      <p>
										        <?php echo $email; ?> <br>
										        <?php echo $phone; ?>
										      </p>
										      <span> <img src="img/facebook.png" width="20"> <br><?php echo $facebook; ?></span><br>
										      <span> <img src="img/twitter.png" width="20"> <br><?php echo $twitter; ?></span><br>
										      <span> <img src="img/instagram.png" width="20"> <br><?php echo $instagram; ?></span><br>
										      <span> <img src="img/linkedin.png" width="20"> <br><?php echo $linkedin; ?></span><br>
										      
										    </div>
										  </div>
										</div>
									</div>
								</div>
							
							</div>
						</div>
					</div>
				</section>
				<div>					
				</div>
				
			</div>
			<div class="col"></div>
		</div>

		
		
	</div>
		
		
	
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/sweetalert.min.js"></script>
	<script type="text/javascript" src="js/popper.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.bundle.js"></script>
	<script type="text/javascript" src="js/jquery.mCustomScrollbar.js"></script>
	<script type="text/javascript" src="js/flatpickr.js"></script>

	<script type="text/javascript">

		$(document).ready(function(){
			var tick = <?php echo $tick; ?>;

			if (tick>0) {
				document.getElementById('buy').style.display ='inline-block';
			}

			var vid = '<?php echo $video; ?>';
			if (typeof vid===null) {
				document.getElementById('vidicon').style.display ='none';

			 }// else{
			// 	document.getElementById('vidicon').style.display ='inline-block';
			// }
		});


		
	</script>
</body>
</html>