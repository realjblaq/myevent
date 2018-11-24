<?php 
	include 'config/connection.php';
	$fid = '';
	if ($_GET["id"]) {
		$fid = $_GET["id"];
	}


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
		$_SESSION['eid'] = $eid;	
		$tick = $ticket_price;

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
	<link rel="stylesheet" type="text/css" href="css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" type="text/css" href="css/flatpickr.css">
</head>
<body style="margin:auto; margin-top:75px;">

	<nav class="navbar navbar-dark bg-dark sticky" id="navbar"">

	  <a class="navbar-brand" href="index.php">
	  	<img src="img/logo min.png" width="35" height="35" alt="">
	    <img src="img/logowhite.png" width="150" height="30" alt="">
	  </a>

		<a class="btn btn-primary my-2 my-sm-0" href="index.php"><i class="fa fa-home"></i> Back to Homepage</a>

		<a class="btn btn-primary my-2 my-sm-0" href="authentication/login.php"><i class="fa fa-plus"></i> Create Event</a>


     <form class="form-inline my-2 my-lg-0" style="color: white;">
     	<a href="authentication/login.php" class="a" style="color: white;"> Share</a>
     	<span style="width: 20px;">  </span>
      	<a href="authentication/register.php" class="a" style="color: white;">Share</a>
   		<span style="width: 20px;">  </span>
      	<a href="authentication/register.php" class="a" style="color: white;">Share</a>
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

		<div class="row">
			<div class="col"></div>
			<div class="col-7 center alert alert-light">
				
				<h1><strong><?php echo strtoupper($ename);?></strong></h1>
				<hr class="hr"></hr>
				<div>
					<img src="media/images/<?php echo $image;?>" width="300">
				</div>
				<br>
				<div class="alert alert-primary" style="background-color: #e2e7ed; border-color: #e2e7ed; color: #234264;">
					<?php echo $about;?>
				</div>
				<hr class="hr"></hr>

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
	<!-- end of video button -->

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

					<div class="container jumbotron">
						<h5 class="center">Want to attend this event? Register here.</h5>
							<br>
						<form>						  
						  <div class="form-group">
						    <small class="form-text text-muted">Full Name</small>
						    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter your full name">
						  </div>

						  <div class="form-group">
						    <small id="emailHelp" class="form-text text-muted">What are your expectations from the this event?</small>
						    <textarea type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="What are your expectations?"></textarea>
						  </div>
						    <button type="submit" class="btn btn-primary">Register</button>
						</form>
					</div>

					<hr class="hr"></hr>

					<div class="container jumbotron" style="display: none;" id="buy">
						<h5 class="center">Buy Tickets For This Event</h5>
							<br>
						<form>						  
						  <div class="form-row">
							    <div class="form-group col-md-6">
							      <small for="inputEmail4">Full Name</small>
							      <input type="email" class="form-control" id="inputEmail4" placeholder="Enter your full name">
							    </div>
							    <div class="form-group col-md-6">
							      <small for="inputPassword4">Quantity</small>
							      <input type="number" class="form-control" id="inputPassword4" placeholder="" value="1">
							    </div>
							</div>
						    <button type="submit" class="btn btn-primary">Buy</button>
						</form>
					</div>
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