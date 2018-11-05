<?php 
include('../authentication/session.php');
// echo $login_session;
?>
<!DOCTYPE html>
<html>
<head>
	<title>MYeVENT-Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

	<link rel="icon" type="image/png" href="../favicon.png"/>
	<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-grid.min.css">
 	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../css/dashboard.css">
	<link rel="stylesheet" type="text/css" href="../css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" type="text/css" href="../css/flatpickr.css">
</head>
<body>

	<div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header" >
                
                <a href="profile.php"><img src="../img/logowhite.png" style="width: 200px;"></a>

            </div>

            <ul class="list-unstyled components">
                <p><i class="fa fa-tachometer-alt"></i> Dashboard</p>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Manage Event</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#" id="addEvent"><i class="fa fa-plus-square" ></i>   Add Event</a>
                        </li>
                        <li>
                            <a href="#" id="editEvent"><i class="fa fa-edit" ></i>   Edit Events</a>
                        </li>
                        <li>
                            <a href="#" id="myEvents"><i class="fa fa-calendar-alt" ></i>   My Events</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li class="act">
                            <a href="#">Page 1</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                        <li>
                            <a href="#">Page 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Portfolio</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
                </li>
                <li>
                    <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
                </li>
            </ul>
            <ul class="list-unstyled ">
               <a href="../authentication/logout.php"> <p><i class="fa fa-sign-out-alt"></i> Logout</p></a>
            </ul>

        </nav>

        <!-- Page Content  -->
        <div id="content" class="dashcontent">

            <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navtop">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btntoggle btn-info ">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#"><i class="fa fa-user-edit userediticon"> </i> <?php echo ucwords($login_session); ?></a>
                            </li>
                            
                        </ul>
                        <div class="nav-item dropdown" ></div>
   	
                    </div>
                </div>
            </nav>
            <!-- nav end -->
<!-- lllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllll -->
                       <?php include 'navcontent.php'; ?>

            <div class="row myrow " id="contentChange">

            	<form class="jumbotron col-sm-8">

            		<div class="row form-group">

            			<div class="col">
            				<label for="exampleInputEmail1">Event Name</label>
				    		<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Example: Football match">
            			</div>

            			<div class="col">
            				<i class="fa fa-map-marker-alt"></i>
            				<label for="exampleInputEmail1">Venue</label>
				    		<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Example: Football match">
            			</div>
            		</div>

				 
				  <div class="form-group">
				    <label for="exampleFormControlTextarea1">Event Description</label> <small>(It should be short.)</small>
				    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Example: Students will play against lecturers."></textarea>
				  </div>

				  <div class="input-group form-group">
				    <div class="input-group-prepend date form_datetime" data-date-format="d-m-Y">
				    	<div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>					    
					</div>
					<input size="16" class="pick form-control" type="text" value="" placeholder="Select Date and Time">
				  </div>

				  <div class="row">
					<div class="col">
						<label class="form-group custom-control-inline" for="exampleFormControlTextarea1">Ticket Price:</label>
						<div class="custom-control custom-radio custom-control-inline form-group">
							<input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input" onclick="hidePriceInput()">
							<label class="custom-control-label" for="customRadioInline1">Free</label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input" onclick="showPriceInput()">
							<label class="custom-control-label" for="customRadioInline2">Paid</label>
						</div>
					</div>

					<div class="col" style="display: none;" id="priceInput">
						<div class="input-group form-group" >
							<div class="input-group-prepend date form_datetime" data-date-format="d-m-Y">
						    	<div class="input-group-text">GHS:</div>					    
							</div>
							<input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="1.00">
						</div>

						<div class="input-group form-group" id="priceInput">
							<div class="input-group-prepend date form_datetime" data-date-format="d-m-Y">
						    	<div class="input-group-text">QTY:</div>					    
							</div>
							<input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="1">
						</div>								
					</div>

				  </div>

				  
				  	<div class="form-group">
				  		<label for="exampleFormControlTextarea1">Select Event Poster <small>(This helps promote your event better).</small></label>
						<div class="custom-file">
						  <input type="file" class="custom-file-input" id="customFile">
						  <label class="custom-file-label" for="customFile">Choose picture...</label>
						</div>
					</div>

					<div class="form-group">
				  		<label for="exampleFormControlTextarea1">Select Video Advert <small>(This helps promote your event better).</small></label>
						<div class="custom-file">
						  <input type="file" class="custom-file-input" id="customFile">
						  <label class="custom-file-label" for="customFile">Choose video...</label>
						</div>
					</div>

					<button type="submit" class="btn btn-primary">Publish Event</button>



				</form>


            	 

            </div>



           

            

            <!-- <div class="line"></div>
            <div class="line"></div> -->

        </div>
        <!-- content end -->
    </div> 
    <!-- whoe page end -->
	
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/sweetalert.min.js"></script>
	<script type="text/javascript" src="../js/popper.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.bundle.js"></script>
	<script type="text/javascript" src="../js/jquery.mCustomScrollbar.js"></script>
	<script type="text/javascript" src="../js/flatpickr.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });

//-----------------------------------------------------------
    window.onscroll = function() {myFunction()};

	var navbar = document.getElementById("navtop");
	var sticky = navbar.offsetTop;

	function myFunction() {
	  if (window.pageYOffset >= sticky) {
	    navbar.classList.add("sticky")
	  } else {
	    navbar.classList.remove("sticky");
	  }
	}
//------------------------------------------------------------
	$('li.collapse li').click(function() {
		$(this).parent().find('li').removeClass('act');
		$(this).addClass('linkactive');
    // $('li').removeClass();
    // $(this).parent().addClass('linkactive');
	});

//-----------------------------------------------------------
	$('.pick').flatpickr({
		enableTime: true,
	    dateFormat: "Y-m-d H:i",
	    minDate: "today",
	});
//-----------------------------------------------------------
	function showPriceInput(){
	  document.getElementById('priceInput').style.display ='flex';
	}
	function hidePriceInput(){
	  document.getElementById('priceInput').style.display = 'none';
	}

    </script>

    
	
</body>
</html>