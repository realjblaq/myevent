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

        $listx .='<option value="'.$eid.'">'.strtoupper($enamex).'</option>';
    }

$event_id = '';
$list='';
if (isset($_POST['check'])) {
    $event_id= $_POST['event'];

    $reg_sqlx=mysqli_query($conn, "SELECT * FROM evaluation WHERE eid = '$event_id'");
    $list='';    
    $no=0;
    while ($erow = mysqli_fetch_assoc($reg_sqlx)) {
        $name = $erow['name'];
        $email = $erow['email'];
        $rating = $erow['rating'];
        $comment = $erow['comment'];
        $no++;
        $list.='<tr>
                  <th scope="row">'.$no.'</th>
                  <td>'.$name.'</td>
                  <td>'.$email.'</td>
                  <td>'.$rating.'</td>
                  <td>'.$comment.'</td>
                </tr>';
    }
}
$event_ids = '';
$mess='';
if (isset($_POST['activate'])) {
    $event_ids= $_POST['event'];

    $updat_sqls = "UPDATE events SET announcement='1' WHERE eid=$event_ids";
        if ($conn->query($updat_sqls) === TRUE) {
            $mess = '<script type="text/javascript">
                    swal("Announcement is on!", {
                      icon: "success",
                      button: true,
                      timer: false,
                    });
                    </script>';
        }
}

if (isset($_POST['deactivate'])) {
    $event_ids= $_POST['event'];

    $updat_sqls = "UPDATE events SET announcement='0' WHERE eid=$event_ids";
        if ($conn->query($updat_sqls) === TRUE) {
            $mess = '<script type="text/javascript">
                    swal("Announcement is off!", {
                      icon: "error",
                      button: true,
                      timer: false,
                    });
                    </script>';
        }
}

$announcement = '';
$the_event='';
if (isset($_POST['announce'])) {
    $the_event= $_POST['event'];
    $announcement= $_POST['announcement'];

    $updat_sqls = "UPDATE events SET the_announcement='$announcement' WHERE eid=$the_event";
        if ($conn->query($updat_sqls) === TRUE) {
            $mess = '<script type="text/javascript">
                    swal("Announcement sent!", {
                      icon: "success",
                      button: true,
                      timer: false,
                    });
                    </script>';
        }    

}
// echo $event_id;
// exit();
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
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-toggle.min.css">
    <script type="text/javascript" src="../js/sweetalert.min.js"></script>
</head>
<body>
<?php echo $mess; ?>
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
<!--<?php include 'navcontent.php'; ?> -->
    
    <div class="content small">
        <h5>Announcement</h5> <br>
       Select an event to add announcement.
       <div class="row">
           <div class="col-4">
                <form method="POST" action="announcement.php">
                   <select class="form-control form-control-sm" name="event">
                      <?php echo $listx; ?>
                    </select>
                    <br>
                    <label>Input announcement here and press <span style="color: blue;">blue button</span> to show it!</label>
                    <textarea class="form-control form-control-sm" name="announcement" placeholder="Announcement goes here"></textarea>
                    <br>
                    <button class="btn btn-success btn-sm" name="activate" style="float: left;">On Announcement</button>
                    <button class="btn btn-danger btn-sm" name="deactivate" style="float: right;">Off Announcement</button>
                    <br><hr class="hr"></hr>
                    <button class="btn btn-primary btn-sm" name="announce" style="float: right;">Submit Announcement</button>
                    <!-- <input type="checkbox" data-toggle="toggle"/> -->
                </form>
           </div>
           <div class="col">

                <!-- <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Rating</th>
                      <th scope="col">Comment</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php echo $list; ?>
                    
                  </tbody>
                </table> -->
           </div>
       </div>
    </div>
           
    </div> 
    <!-- whole page end -->
    
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/sweetalert.min.js"></script>
    <script type="text/javascript" src="../js/popper.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="../js/jquery.mCustomScrollbar.js"></script>
    <script type="text/javascript" src="../js/flatpickr.js"></script>
    <script type="text/javascript" src="../js/bootstrap-toggle.min.js"></script>
    
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


    $('li.collapse li').click(function() {
        $(this).parent().find('li').removeClass('act');
        $(this).addClass('linkactive');
    // $('li').removeClass();
    // $(this).parent().addClass('linkactive');
    });

    </script>

    
    
</body>
</html>