<?php 
	session_start();
	$session_id=$_SESSION['uid'];

	if(!isset($_SESSION['uid'])){
	mysqli_close($conn); // Closing Connection
	header('Location: ../authentication/login.php'); // Redirecting To Home Page
	}
	include '../config/connection.php';

	$event_id=$_GET['event_id'];

//fetch outlines-----------------------------------------------------------------------
	$outline_sql=mysqli_query($conn, "SELECT * FROM program_outline WHERE eid = '$event_id'");
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
			      <td>
			      	<span class="col" ><a href="#" class="" style="text-decoration:none;"><i class="fa fa-edit"></i></a></span>
			      	<span class="col"><a href="#" class="" style="text-decoration:none;"><i class="fa fa-trash"></i></a></span>
			      </td>
			      </tr>';

		// header('location: event_edit.php?event_id=$_GET["event_id"]');
    }
        
//insert program outline----------------------------------------------------------------

	if(isset($_POST['add_outline']))
    {
        $role = $_POST['role'];
        $name = $_POST['name'];
        $time = $_POST['time'];
        
        $sql = "INSERT INTO program_outline (eid, role, name, program_time)
            	VALUES ('".$_GET['event_id']."','".str_replace("'","\'", $role)."','".str_replace("'","\'", $name)."','".$time."')";

        $result = mysqli_query($conn,$sql);
        if ($result) {
        	header("location:event_edit.php?event_id=".$event_id);
        }
    }

 //------------ upload file--------------------------------------------------------
    $fileMessage='';
    $filename='';
    if (isset($_POST['upload'])) {
    	$targetfolderp = "../media/files/";
	 	$targetfolderp = $targetfolderp . basename( $_FILES['fileToUpload']['name']) ;
	 	$filename = basename( $_FILES['fileToUpload']['name']);

	if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $targetfolderp)){
			
	 $fileMessage= '<script type="text/javascript">
	 				swal("File has been uploaded successfully!", {
	 				  icon: "success",
					  buttons: false,
					  timer: 1500,
					});
					</script>';
	}else {
	 $fileMessage ="Problem uploading file";
	 }

	 $file_sql = "INSERT INTO files (eid, file_name)
            	VALUES ('".$_GET['event_id']."','".$filename."')";

     $file_result = mysqli_query($conn,$file_sql);
    }

    //files fech---------------------------------------------------------
    $filefetch_sql=mysqli_query($conn, "SELECT * FROM files WHERE eid = '$event_id'");
	$fileslist='';    
    while ($filerow = mysqli_fetch_assoc($filefetch_sql)) {
    	$file_id = $filerow['id'];
        $evid =  $filerow['eid'];
        $f_name =  $filerow['file_name'];

        $fileslist.='<tr>
				    	<td>'.$f_name.'</td>
				    	<td><a href="#" class=""><i class="fa fa-trash"></i></a></td>
				    </tr>';

        // echo $evid; exit();

    }


//events fetch------------------------------------------------------------
    $event_sql=mysqli_query($conn, "SELECT * FROM events WHERE eid = '$event_id'");
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
		$template = $erow['template'];
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
//-------------------------------------------------update event
		$event_name = '';
        $event_venue = '';
        $event_description = '';
        $event_date = '';
        $free_paid ='';
        $ticket_price = '';
        $ticket_quantity = '';

	if (isset($_POST['update_event'])) {
		$event_name = $_POST['event_name'];
        $event_venue = $_POST['event_venue'];
        $event_description = $_POST['event_description'];
        $event_date = $_POST['event_date'];
        $free_paid = $_POST['free_paid'];
        $ticket_price = $_POST['ticket_price'];
        $ticket_quantity = $_POST['ticket_quantity'];
        $event_temp = $_POST['event_temp'];

        // $event_description = mysqli_real_escape_string($event_description);

        if ($free_paid=='free') {
        	$ticket_quantity=0;
        	$tick=0.00;
        }
        $updat_sql = "UPDATE events SET ename='$event_name', about='$event_description', edate='$event_date', location='$event_venue', ticket_qty='$ticket_quantity', ticket_price='$ticket_price', etype='$free_paid', template='$event_temp' WHERE eid=$event_id";
        if ($conn->query($updat_sql) === TRUE) {
        	$fileMessage= '<script type="text/javascript">
	 				swal("Event updated successfully!", {
	 				  icon: "success",
					  buttons: false,
					  timer: 1500,
					});
					</script>';

		    header("location:event_edit.php?event_id=".$event_id);
		} else {
		    echo "Error updating record: " . $conn->error;
		}
	}
	

?>
<!DOCTYPE html>
<html>
<head>
	<title>MYeVent-Edit Event</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="../favicon.png"/>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-grid.min.css">
 	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/flatpickr.css">
    <script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/sweetalert.min.js"></script>
</head>
<body>

	<div class="wrapper" style="padding: 30px;">	
		<div class="row">
			<a href="edit_event.php" class="btn btn-primary"><i class="fa fa-tachometer-alt"></i> Back to Dashboard</a>
		</div>	
		<br>
		<div class="row">
			<div class="col" style="border-right: 1px solid #bebebe;">
				<!-- Edit event----------------------------------------------------- -->
				<span class="row alert" style="border-bottom: 1px solid #bebebe;">EDIT EVENT</span>
				<span class="row">
					
		            <!-- <div class="row myrow " id="contentChange"> -->

		                <form class="" method="post" style="padding-right: 5px;">

		                    <div class="row form-group">
		                    	<div class="col">
		                            <label for="exampleInputEmail1">Select Template</label>
		                            <select class="form-control" name="event_temp" value="<?php echo $template; ?>" required>
		                            	<option value="<?php echo $template; ?>"><?php echo ucfirst($template); ?></option>
		                            	<option value="birthday">Birthday</option>
		                            	<option value="church">Church Service</option>
		                            	<option value="concert">Concert</option>
		                            	<option value="conference">Conference</option>
		                            	<option value="funeral">Funeral</option>
		                            	<option value="meeting">Meeting</option>
		                            	<option value="party">Party</option>
		                            	<option value="wedding">Wedding</option>
		                            	<option value="default">MYeVENT Default</option>
		                            </select>
		                        </div>

		                        <div class="col">
		                            <label for="exampleInputEmail1">Event Name</label>
		                            <input type="text" class="form-control" name="event_name" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $ename; ?>" required>
		                        </div>

		                        <div class="col">
		                            <i class="fa fa-map-marker-alt"></i>
		                            <label for="exampleInputEmail1">Venue</label>
		                            <input type="text" class="form-control" name="event_venue" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $location; ?>" required>
		                        </div>
		                    </div>

		                 
		                  <div class="form-group">
		                    <label for="exampleFormControlTextarea1">Event Description</label> <small>(It should be short.)</small>
		                    <textarea class="form-control" id="exampleFormControlTextarea1" name="event_description" rows="3" value="" required><?php echo $about; ?></textarea>
		                  </div>

		                  <div class="input-group form-group">
		                    <div class="input-group-prepend date form_datetime" data-date-format="d-m-Y">
		                        <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>                      
		                    </div>
		                    <input name="event_date" size="16" class="pick form-control" type="text" value="<?php echo $edate; ?>" required>
		                  </div>

		                  <div class="row">
		                    <div class="col">
		                        <label class="form-group custom-control-inline" for="exampleFormControlTextarea1">Ticket Price:</label>
		                        <div class="custom-control custom-radio custom-control-inline form-group">
		                            <input type="radio" <?php echo ($etype=='free')?'checked':'' ?> id="customRadioInline1" name="free_paid" class="custom-control-input" value="free" onclick="hidePriceInput()" required>
		                            <label class="custom-control-label" for="customRadioInline1">Free</label>
		                        </div>
		                        <div class="custom-control custom-radio custom-control-inline">
		                            <input type="radio" <?php echo ($etype=='paid')?'checked':'' ?> id="customRadioInline2" value="paid" name="free_paid" class="custom-control-input" onclick="showPriceInput()">
		                            <label class="custom-control-label" for="customRadioInline2">Paid</label>
		                        </div>
		                    </div>

		                    <div class="col" style="display: flex;" id="priceInput">
		                        <div class="input-group form-group" >
		                            <div class="input-group-prepend date form_datetime" data-date-format="d-m-Y">
		                                <div class="">GHS:</div>                        
		                            </div>
		                            <input name="ticket_price" type="number" class="form-control" id="ticket_price" aria-describedby="emailHelp" placeholder="" value="<?php echo $tick; ?>" min="" readonly>
		                        </div>

		                        <div class="input-group form-group" id="priceInput">
		                            <div class="input-group-prepend date form_datetime" data-date-format="d-m-Y">
		                                <small class="">QTY:</small>                        
		                            </div>
		                            <input name="ticket_quantity" type="number" class="form-control" id="ticket_quantity" aria-describedby="emailHelp" placeholder="" value="<?php echo $ticket_qty; ?>" min="" readonly>
		                        </div>                              
		                    </div>

		                  </div>

		                    <div class="form-group">
		                        <label>Select Event Poster <small>(This helps promote your event better).</small></label>
		                        <input name="picture_upload" type="file" class="form-control" value="../media/images/<?php echo $image; ?>">
		                     </div>

		                     <div class="form-group">
		                        <label>Select Video Advert <small>(This helps promote your event better).</small></label>
		                        <input name="video_upload" type="file" class="form-control" value="../media/videos/test.php">
		                     </div>

		                    <button name="update_event" type="submit" class="btn btn-primary" style="float: right;">Update</button>

		                </form>
		            <!-- </div> -->
				</span>
			</div>
			<!-- Program outline----------------------------------------------------- -->
			<div class="col-4" style="border-right: 1px solid #bebebe;">
				<span class="row alert" style="border-bottom: 1px solid #bebebe;">ADD PROGRAM OUTLINE</span>
				<span class="row container">
					<form method="post" action="event_edit.php?event_id=<?php echo $_GET['event_id']; ?>" style="margin-bottom: 14px;"> 
						<div class="form-row">
						    <div class="col-4">
						      <input type="text" class="form-control" placeholder="Role" required name="role">
						    </div>
						    <div class="col-5">
						      <input type="text" class="form-control" placeholder="Name" required name="name">
						    </div>
						    <div class="col-2">
						      <input type="text" class="time form-control" placeholder="Time" name="time">
						    </div>
						    <div class="col-1">
						    	<button type="submit" name="add_outline" class="btn btn-primary"><i class="fa fa-plus"></i></button>
						    </div>
						</div>
					</form>
				</span>
				<br>
				<span class="row">
					<table class="table table-hover table-striped" >
					  <thead class="thead-dark" style="padding: -0.25rem;">
					    <tr>
					      <!-- <th scope="col">#</th> -->
					      <th scope="col">Role</th>
					      <th scope="col">Name</th>
					      <th scope="col">Time</th>
					      <th scope="col">Action</th>
					    </tr>
					  </thead>
					  <tbody>
					    <!-- <tr> -->
					       <?php echo $outline; ?>
					    <!-- </tr> -->
					  </tbody>
					</table>
				</span>
				
			</div>
			<!-- Add file------------------------------------------------- -->
			<div class="col-3" style="">
				<span class="row alert" style="border-bottom: 1px solid #bebebe;">
					<?php echo $fileMessage; ?>
					ADD FILE
				</span>
				<span class="row">
					<form method="post" enctype="multipart/form-data">
						<input name="fileToUpload" type="file" class="form-control" required>
						<button class="btn btn-primary" style="width: 100%;" name="upload"><i class="fa fa-upload"></i> Upload</button>
					</form>
				</span>
				<span class="row">
					<table class="table table-hover table-striped">
					  <thead class="thead-dark" style="padding: -0.25rem;">
					    <tr>
					      <th scope="col">File Name</th>
					      <th scope="col">action</th>
					    </tr>
					  </thead>
					  <tbody>
					    <!-- <tr>
					    	<td>File.pdf</td>
					    	<td><button class="btn btn-danger"><i class="fa fa-trash"></i></button></td>
					    </tr> -->
					    <?php echo $fileslist; ?>
					  </tbody>
					</table>
				</span>

			</div>
		</div>

	</div>
	
	

 	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/sweetalert.min.js"></script>
 	<script type="text/javascript" src="../js/bootstrap.bundle.js"></script>
 	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/flatpickr.js"></script>

 	<script type="text/javascript">
 		$(function(){
 			

 		});
 		function showPriceInput(){
	      document.getElementById('ticket_price').readOnly=false;
	      document.getElementById('ticket_quantity').readOnly=false;
	    }
	    function hidePriceInput(){
	      document.getElementById('ticket_price').readOnly=true;
	      document.getElementById('ticket_quantity').readOnly=true;
	    }
	    //-----------------------------------------------------------
	    $('.time').flatpickr({
	        enableTime: true,
		    noCalendar: true,
		    dateFormat: "H:i",
	    });
	    //----------------------------------------------------------
	    $('.pick').flatpickr({
	        enableTime: true,
	        dateFormat: "Y-m-d H:i",
	        minDate: "today",
	    });

 	</script>
</body>
</html>