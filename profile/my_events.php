<?php 
include('../authentication/session.php');

$event_sqlx=mysqli_query($conn, "SELECT * FROM events WHERE uid = '$session_id' AND edate>= CURDATE() ORDER BY date_created DESC");
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
        $edate =  $erowx['edate'];
        $date_createx =  $erowx['date_created'];
        // $ticket_qty = $erow['ticket_qty'];
        // $ticket_price = $erow['ticket_price'];
        // $_SESSION['eid'] = $eid;    
        // $tick = $ticket_price;


        $listx .='<tr>
                  <td>'.strtoupper($enamex).'</td>
                  <td>'.$edate.'</td>
                  <td>'.$date_createx.'</td>
                </tr>';
    }

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
            <h5>Archived Events</h5>
        </span>

            <table class="table table-hover" style="">
              <thead>
                <tr>
                  <th scope="col">Event Name</th>
                  <th scope="col">Event Date</th>
                  <th scope="col">Date Created</th>
                </tr>
              </thead>
              <tbody>
                <?php echo $listx; ?>
              </tbody>
            </table>

                 

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

    </script>

    
    
</body>
</html>