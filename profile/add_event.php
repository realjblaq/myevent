<?php 
include('../authentication/session.php');
// echo $login_session;
    $event_post_message = '';
    $passerror = '';
    $picturename = '';
    $videoname = '';
    if(isset($_POST['publish_event']))
    {
            $event_name = $_POST['event_name'];
            $event_venue = $_POST['event_venue'];
            $event_description = $_POST['event_description'];
            $event_date = $_POST['event_date'];
            $free_paid = $_POST['free_paid'];
            $ticket_price = $_POST['ticket_price'];
            $ticket_quantity = $_POST['ticket_quantity'];
            // echo $event_name; exit();
            //-----------------------------------------------------------------------------

            //for poster
            $targetfolderp = "../media/images/";

            $picturename = basename($_FILES['picture_upload']['name']);
            $pexplode = explode(".", $picturename);
            $ptype = end($pexplode);
            $ptype = strtolower($ptype);
            $picturename = md5($picturename.time().$session_id).'.'.$ptype;//make the picture name unique


            $targetfolderp = $targetfolderp . $picturename ;
            $ok=1;
            $file_type=$_FILES['picture_upload']['type'];
            if ($file_type=="image/png" || $file_type=="image/gif" || $file_type=="image/jpeg"){
                move_uploaded_file($_FILES['picture_upload']['tmp_name'], $targetfolderp);
                                     
            }else {
             echo "You may only JPEGs or GIF files.<br>";
            }      

            //for video advert
            $targetfolderv = "../media/videos/";

            $videoname = basename($_FILES['video_upload']['name']);
            $vexplode = explode(".", $videoname);
            $vtype = end($vexplode);
            $vtype = strtolower($vtype);
            $videoname = md5($videoname.time().$session_id).'.'.$vtype;

            $targetfolderv = $targetfolderv . $videoname ;
            $ok2=1;
            $file_type2=$_FILES['video_upload']['type'];
            if ($file_type2=="video/mp4"){
                move_uploaded_file($_FILES['video_upload']['tmp_name'], $targetfolderv);
            }else {
             echo "You may only upload videos";
            }  
            
            //-----------------------------------------------------------------------------

            //$session_id
            $sql = "INSERT INTO events (uid, ename, etype, about, image, video, location, edate, ticket_qty, ticket_price)
            VALUES ('".$session_id."','".$event_name."','".$free_paid."','".$event_description."','".$picturename."','".$videoname."','".$event_venue."','".$event_date."','".$ticket_quantity."','".$ticket_price."')";

            $result = mysqli_query($conn,$sql);
           
            if ($result) {

                $event_post_message = '<script type="text/javascript">
                                setTimeout(function () {
                                    swal("Good job!","You have published your event.","success").then( function(val) {
                                        if (val == true) window.location.href = \'add_event.php\';
                                    });
                                }, 200);  
                            </script>';
            }
            else{
                $event_post_message = "<script type='text/javascript'>swal('Error!', 'Something went wroing!', 'error')</script>";        
            }
    }
    // else{
    //         $event_post_message = '<p style="color: red; margin-bottom: 5px;">Failed. Passwords do not match!</p>';         
    //     }

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
                            <a href="add_event.php" id="addEvent"><i class="fa fa-plus-square"></i>   Add Event</a>
                        </li>
                        <li>
                            <a href="edit_event.php" id="editEvent"><i class="fa fa-edit" ></i>   Edit Events</a>
                        </li>
                        <li>
                            <a href="#" id="myEvents"><i class="fa fa-calendar-alt" ></i>   Archived Events</a>
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
<!--                        <?php include 'navcontent.php'; ?>
 -->
                       <span>
                        <h5>Create an Event</h5>
                        </span>


            <div class="row myrow " id="contentChange">

                <form class="jumbotron col-sm-8 dashboardform" method="post" enctype="multipart/form-data">

                    <div class="row form-group">

                        <div class="col">
                            <label for="exampleInputEmail1">Event Name</label>
                            <input type="text" class="form-control" name="event_name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Example: Football match" required>
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
                            <input name="ticket_price" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="1.00" value="0.00" min="">
                        </div>

                        <div class="input-group form-group" id="priceInput">
                            <div class="input-group-prepend date form_datetime" data-date-format="d-m-Y">
                                <div class="input-group-text">QTY:</div>                        
                            </div>
                            <input name="ticket_quantity" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="1" value="0" min="">
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

                    <button name="publish_event" type="submit" class="btn btn-primary">Publish Event</button>

                </form>


                 

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
    // window.onscroll = function() {myFunction()};

    // var navbar = document.getElementById("navtop");
    // var sticky = navbar.offsetTop;

    // function myFunction() {
    //   if (window.pageYOffset >= sticky) {
    //     navbar.classList.add("sticky")
    //   } else {
    //     navbar.classList.remove("sticky");
    //   }
    // }
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