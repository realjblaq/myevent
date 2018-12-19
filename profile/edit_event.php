<?php 
include('../authentication/session.php');

$event_sqlx=mysqli_query($conn, "SELECT * FROM events WHERE uid = '$session_id' ORDER BY date_created DESC");
$listx='';    
    while ($erowx = mysqli_fetch_assoc($event_sqlx)) {
        $eid =  $erowx['eid'];
        // $uid =  $erowx['uid'];
        // $etype = $erowx['etype'];
        $enamex =  $erowx['ename'];
        // $about = $erow['about'];
        // $image =  $erow['image'];
        // $video =  $erow['video'];
        // $location =  $erow['location'];
        // $edate =  $erow['edate'];
        $date_createx =  $erowx['date_created'];
        // $ticket_qty = $erow['ticket_qty'];
        // $ticket_price = $erow['ticket_price'];
        // $_SESSION['eid'] = $eid;    
        // $tick = $ticket_price;


        $listx .='<hr class="hr"></hr>
            <div class="container-fluid">

                <div class="row alert alert-secondary">
                <div class="col">
                    '.strtoupper($enamex).'
                </div>
                <div class="col">
                    <small>Published on: <strong>'.date("D, d/M/Y", strtotime($date_createx)).' @ '.date("h:ia",strtotime($date_createx)).'</strong></small>
                </div>
                <div class="col-1" style="color:white;">
                    <button type="button" class="btn btn-secondary openBtn" data-toggle="" data-target="" onclick="edit_event(\''.$eid.'\')" >
                        <i class="fa fa-edit"></i> Edit
                    </button>





                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">

                    <form class=" col-sm-8 dashboardform" method="post" enctype="multipart/form-data">

                    <div class="row form-group">

                        <div class="col">
                            <label for="exampleInputEmail1">Event Name</label>
                            <input type="text" class="form-control" name="event_name" id="exampleInputEmail1" aria-describedby="emailHelp" value="'.$enamex.'" required>
                        </div>

                        <div class="col">
                            <i class="fa fa-map-marker-alt"></i>
                            <label for="exampleInputEmail1">Venue</label>
                            <input type="text" class="form-control" name="event_venue" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Example: Football match" required>
                        </div>
                    </div>

                 
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Event Description</label> <small>(It should be short.)</small>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="event_description" rows="3" placeholder="Example: Students will play against lecturers." required></textarea>
                  </div>

                  <div class="input-group form-group">
                    <div class="input-group-prepend date form_datetime" data-date-format="d-m-Y">
                        <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>                      
                    </div>
                    <input name="event_date" size="16" class="pick form-control" type="text" value="" placeholder="Select Date and Time" required>
                  </div>

                  <div class="row">
                    <div class="col">
                        <label class="form-group custom-control-inline" for="exampleFormControlTextarea1">Ticket Price:</label>
                        <div class="custom-control custom-radio custom-control-inline form-group">
                            <input type="radio" id="customRadioInline1" name="free_paid" class="custom-control-input" value="free" onclick="hidePriceInput()" required>
                            <label class="custom-control-label" for="customRadioInline1">Free</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline2" value="paid" name="free_paid" class="custom-control-input" onclick="showPriceInput()">
                            <label class="custom-control-label" for="customRadioInline2">Paid</label>
                        </div>
                    </div>

                    <div class="col" style="display: none;" id="priceInput">
                        <div class="input-group form-group" >
                            <div class="input-group-prepend date form_datetime" data-date-format="d-m-Y">
                                <div class="input-group-text">GHS:</div>                        
                            </div>
                            <input name="ticket_price" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="1.00" value="0.00">
                        </div>

                        <div class="input-group form-group" id="priceInput">
                            <div class="input-group-prepend date form_datetime" data-date-format="d-m-Y">
                                <div class="input-group-text">QTY:</div>                        
                            </div>
                            <input name="ticket_quantity" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="1" value="0">
                        </div>                              
                    </div>

                  </div>

                    <div class="form-group">
                        <label>Select Event Poster <small>(This helps promote your event better).</small></label>
                        <input name="picture_upload" type="file" class="form-control">
                     </div>

                     <div class="form-group">
                        <label>Select Video Advert <small>(This helps promote your event better).</small></label>
                        <input name="video_upload" type="file" class="form-control">
                     </div>

                </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success">Update</button>
                          </div>
                        </div>
                      </div>
                    </div>

                </div>
                <div class="col-2" style="color:white;">
                    <button class="btn btn-danger" onclick="delete_event(\''.$eid.'\')">
                       <i class="fa fa-trash"></i> Delete
                    </button>
                </div>
            </div>
                
            </div>';


    }

    
?>
<!DOCTYPE html>
<html>
<head>
    <title>MYeVENT-Edit Event</title>
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
    <script type="text/javascript" src="../js/sweetalert.min.js"></script>
</head>
<body>

    <?php echo $event_post_message; ?>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header" >
                
                <a href="profile.php"><img src="../img/logowhite.png" style="width: 200px;"></a>

            </div>

            <ul class="list-unstyled components">
                <a href="dashboard.php"><p><i class="fa fa-tachometer-alt"></i> Dashboard</p></a>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Manage Event</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="add_event.php" id="addEvent"><i class="fa fa-plus-square" ></i>   Add Event</a>
                        </li>
                        <li>
                            <a href="edit_event.php" id="editEvent"><i class="fa fa-edit" ></i>   Edit Events</a>
                        </li>
                        <li>
                            <a href="my_events.php" id="myEvents"><i class="fa fa-calendar-alt" ></i>   Archived Events</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="pim.php">Personal Info</a>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Reports</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li class="act">
                            <a href="attenders.php"><i class="fa fa-list-ul"></i> Registered Addenders</a>
                        </li>
                        <li>
                            <a href="ticket_monitor.php"><i class="fa fa-ticket-alt"></i> Ticket Monitoring</a>
                        </li>
                        <li>
                            <a href="feedback.php"><i class="fa fa-comments"></i> Events Feedback</a>
                            
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="announcement.php">Announcement <i class="fa fa-bullhorn"></i></a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="profile.php" class="article">Back to Home page</a>
                </li>
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
                                <a class="nav-link" href=""><i class="fa fa-user-edit userediticon"> </i> <?php echo ucwords($login_session); ?></a>
                            </li>
                             <li class="nav-item active">
                                <a class="nav-link" href="../authentication/logout.php"><i class="fa fa-sign-out-alt userediticon"> </i> Logout</a>
                            </li>
                            <!-- <li class="nav-item active">
                               <a class="nav-link" href="../authentication/logout.php"> <p><i class="fa fa-sign-out-alt"></i> Logout</p></a>
                            </li> -->
                            
                        </ul>
                        <div class="nav-item dropdown" ></div>
    
                    </div>
                </div>
            </nav>
            <!-- nav end -->
<!-- lllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllll -->
                       <!-- <?php include 'navcontent.php'; ?> -->

            <span>
                <h5>Edit your Events</h5>
            </span>

            <!-- content begin  -->
            <?php echo $listx; ?>               

            </div>

        </div>
        <!-- content end -->
    </div> 
    <!-- whole page end -->
    
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


    $('.openBtn').on('click',function(){
        $('.modal-body').load('getContent.php?id=2',function(){
            $('#myModal').modal({show:true});
        });
    });
//--------------------------------------------------------------
    function delete_event(event){
        swal({
                  title: "Are you sure?",
                  text: "Once deleted, you cannot recover this event!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {'.mysqli_query($conn, $sql).'
                    window.location.href = 'delete_event.php?bookingID='+event;
                  } else {
                    swal("Your event is safe!");

                    }
                });
    }
//------------------------------------------------------------------
    function edit_event(event){            
        window.location.href = 'event_edit.php?event_id='+event;                
    }

    </script>

    
    
</body>
</html>