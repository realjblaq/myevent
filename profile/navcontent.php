	<link rel="icon" type="image/png" href="../favicon.png"/>
	<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-grid.min.css">
 	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../css/dashboard.css">
	<link rel="stylesheet" type="text/css" href="../css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" type="text/css" href="../css/flatpickr.css">
    <script type="text/javascript" src="../js/sweetalert.min.js"></script>	

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript">
	
	var addEvent = '<form class="jumbotron col-sm-8 dashboardform" method="post" enctype="multipart/form-data">'+

            		'<div class="row form-group">'+

            			'<div class="col">'+
            				'<label for="exampleInputEmail1">Event Name</label>'+
				    		'<input type="text" class="form-control" name="event_name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Example: Football match" required>'+
            			'</div>'+

            			'<div class="col">'+
            				'<i class="fa fa-map-marker-alt"></i>'+
            				'<label for="exampleInputEmail1">Venue</label>'+
				    		'<input type="text" class="form-control" name="event_venue" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Example: Football match" required>'+
            			'</div>'+
            		'</div>'+

				 
				  '<div class="form-group">'+
				    '<label for="exampleFormControlTextarea1">Event Description</label> <small>(It should be short.)</small>'+
				    '<textarea class="form-control" id="exampleFormControlTextarea1" name="event_description" rows="3" placeholder="Example: Students will play against lecturers." required></textarea>'+
				  '</div>'+

				  '<div class="input-group form-group">'+
				    '<div class="input-group-prepend date form_datetime" data-date-format="d-m-Y">'+
				    	'<div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>'+					    
					'</div>'+
					'<input name="event_date" size="16" class="pick form-control" type="text" value="" placeholder="Select Date and Time" required>'+
				  '</div>'+

				  '<div class="row">'+
					'<div class="col">'+
						'<label class="form-group custom-control-inline" for="exampleFormControlTextarea1">Ticket Price:</label>'+
						'<div class="custom-control custom-radio custom-control-inline form-group">'+
							'<input type="radio" id="customRadioInline1" name="free_paid" class="custom-control-input" value="free" onclick="hidePriceInput()" required>'+
							'<label class="custom-control-label" for="customRadioInline1">Free</label>'+
						'</div>'+
						'<div class="custom-control custom-radio custom-control-inline">'+
							'<input type="radio" id="customRadioInline2" value="paid" name="free_paid" class="custom-control-input" onclick="showPriceInput()">'+
							'<label class="custom-control-label" for="customRadioInline2">Paid</label>'+
						'</div>'+
					'</div>'+

					'<div class="col" style="display: none;" id="priceInput">'+
						'<div class="input-group form-group" >'+
							'<div class="input-group-prepend date form_datetime" data-date-format="d-m-Y">'+
						    	'<div class="input-group-text">GHS:</div>'+					    
							'</div>'+
							'<input name="ticket_price" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="1.00" value="0.00">'+
						'</div>'+

						'<div class="input-group form-group" id="priceInput">'+
							'<div class="input-group-prepend date form_datetime" data-date-format="d-m-Y">'+
						    	'<div class="input-group-text">QTY:</div>'+					    
							'</div>'+
							'<input name="ticket_quantity" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="1" value="0">'+
						'</div>'+								
					'</div>'+

				  '</div>'+

                    '<div class="form-group">'+
                        '<label>Select Event Poster <small>(This helps promote your event better).</small></label>'+
                        '<input name="picture_upload" type="file" class="form-control">'+
                     '</div>'+

                     '<div class="form-group">'+
                        '<label>Select Video Advert <small>(This helps promote your event better).</small></label>'+
                        '<input name="video_upload" type="file" class="form-control">'+
                     '</div>'+

					'<button name="publish_event" type="submit" class="btn btn-primary">Publish Event</button>'+

				'</form>';
	var editEvent = '<p>Edit event</p>';
	var myEvent = '<p>My event</p>';

	$('#addEvent').on('click',function(){
		$('#contentChange').html(addEvent).show();
	}); 

	$('#editEvent').on('click',function(){
		$('#contentChange').html(editEvent).show();
	}); 	

	$('#myEvents').on('click',function(){
		$('#contentChange').html(myEvent).show();
	}); 

</script>

<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/sweetalert.min.js"></script>
	<script type="text/javascript" src="../js/popper.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.bundle.js"></script>
	<script type="text/javascript" src="../js/jquery.mCustomScrollbar.js"></script>
	<script type="text/javascript" src="../js/flatpickr.js"></script>