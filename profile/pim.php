<?php 
include('../authentication/session.php');
$mes='';
//for user name---------------------------------------------------------------------
$user_sql=mysqli_query($conn, "SELECT * FROM users WHERE uid='$session_id'");
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
$genderx='';

if ($gender==='f') {
    $genderx='Female';
}elseif($gender==='m'){
    $genderx='Male';
}

//check number of posts--------------------------------------------------------
$post_sql=mysqli_query($conn, "SELECT * FROM events WHERE uid = $session_id");
$post_number = 0;
while ($erow = mysqli_fetch_assoc($post_sql)) {
    $post_number++;
}

//change profile picuture----------------------------------------------
if (isset($_POST['change'])) {

    // echo $_FILES['image']['name']; exit();

    $name = $_FILES['image']['name'];
     $target_dir = "../media/profile_pictures/";
     $target_file = $target_dir . basename($_FILES["image"]["name"]);

     // Select file type
     $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

     // Valid file extensions
     $extensions_arr = array("jpg","jpeg","png","gif");

     // Check extension
     if( in_array($imageFileType,$extensions_arr) ){
     
      // Insert record
      $query = "UPDATE users SET profile_pic='$name' WHERE uid=$session_id";
      mysqli_query($conn,$query);
      
      // Upload file
      move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$name);
     }

     header('location:pim.php');
     
}

// exit();

//get profile picture---------------------------------------------------
$image_src = "../media/profile_pictures/".$profile_pic;

//update info----------------------------------------------------------

if(isset($_POST['update'])){
    $username =$_POST['username'];
    $fname =$_POST['fname'];
    $lname =$_POST['lname'];
    $email =$_POST['email'];
    $gender =$_POST['gender'];
    $phone = $_POST['phone'];
    $profession = $_POST['profession'];
    // $profile_pic = $_POST['profile_pic'];
    $linkedin = $_POST['linkedin'];
    $facebook = $_POST['facebook'];
    $twitter = $_POST['twitter'];
    $instagram = $_POST['instagram'];

    $update_query = "UPDATE users SET username='$username', fname='$fname', lname='$lname', email='$email', gender='$gender', phone='$phone', profession='$profession', linkedin='$linkedin', facebook='$facebook', twitter='$twitter', instagram='$instagram' WHERE uid=$session_id";
      mysqli_query($conn,$update_query);

    $mes='<script type="text/javascript">swal("Success!", "You have updated your personal information !", "success");</script>';
}
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
    <script type="text/javascript" src="../js/sweetalert.min.js"></script>

    <style type="text/css">
        body{
    padding-top: 68px;
    padding-bottom: 50px;
}
        .image-container {
            position: relative;
        }

        .image {
            opacity: 1;
            display: block;
            width: 100%;
            height: auto;
            transition: .5s ease;
            backface-visibility: hidden;
        }

        .middle {
            transition: .5s ease;
            opacity: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            text-align: center;
        }

        .image-container:hover .image {
            opacity: 0.3;
        }

        .image-container:hover .middle {
            opacity: 1;
        }
    </style>
</head>
<body>

    <?php echo $event_post_message;
    echo $mes; ?>

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
<!--                 <?php include 'navcontent.php'; ?>
 -->
                       <span>
                        <h5>Personal Information</h5>
                        </span>

                        <div class="row container">
                           <div class="col">
                               <div class="container">
                                <!-- ---------------------------------------------------------------------------------------col 1 -->
        <div class="row">
            <div class="col">
                <div class="card">

                    <div class="card-body">
                        <div class="card-title mb-4">
                            <div class="d-flex justify-content-start">
                                <div class="image-container">
                                    <img src="<?php echo $image_src; ?>" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                                    <!-- <div class="middle">
                                        <input type="button" class="btn btn-secondary" id="btnChangePicture" value="Change" />
                                        <input type="file" style="display: none;" id="profilePicture" name="file" />
                                    </div> -->
                                </div>
                                <div class="userData ml-3">
                                    <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"><a href="javascript:void(0);">@<?php echo $username; ?></a></h2>
                                    <h6 class="d-block"><a href="javascript:void(0)"><?php echo number_format($post_number); ?></a> Published Events</h6>
                                    <!-- <h6 class="d-block"><a href="javascript:void(0)">300</a> Blog Posts</h6> -->
                                </div>
                                <div class="ml-auto">
                                    <input type="button" class="btn btn-primary d-none" id="btnDiscard" value="Discard Changes" />
                                </div>
                            </div>
                        <div class="row" style="float: right;">
                            <div class="col">
                                <button class="btn btn-primary btn-sm" onclick="show_hide()">Edit Info</button>
                            </div>
                        </div>

                        </div>

                        <div class="row small">
                            <div class="col-12">
                                <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Basic Info</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#connectedServices" role="tab" aria-controls="connectedServices" aria-selected="false">Social Media</a>
                                    </li>
                                </ul>
                                <div class="tab-content ml-1" id="myTabContent">
                                    <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                                        

                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label style="font-weight:bold;">Full Name</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                <?php echo ucfirst($fname).' '. ucfirst($lname); ?>
                                            </div>
                                        </div>
                                        <hr  />

                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label style="font-weight:bold;">Gender</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                <?php echo ucfirst($gender); ?>
                                            </div>
                                        </div>
                                        <hr />
                                        
                                        
                                        <div class="row">
                                            <div class="col-sm-4 ">
                                                <label style="font-weight:bold;">Profession</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                <?php echo ucfirst($profession); ?>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-4 ">
                                                <label style="font-weight:bold;">Phone No.</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                <?php echo $phone; ?>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-4 ">
                                                <label style="font-weight:bold;">Email</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                <?php echo $email; ?>
                                            </div>
                                        </div>
                                        <hr />

                                    </div>
                                    <div class="tab-pane fade" id="connectedServices" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                                       <img src="../img/facebook.png" width="20"> <span>@<?php echo $facebook; ?></span><br><br>
                                       <img src="../img/twitter.png" width="20"> <span>@<?php echo $twitter; ?></span><br><br>
                                       <img src="../img/instagram.png" width="20"> <span>@<?php echo $instagram; ?></span><br><br>
                                       <img src="../img/linkedin.png" width="20"> <span>@<?php echo $linkedin; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
                           </div>
                           <div class="col">
                               <div class="container">
                                   <div class="row">
                                        <div class="col">
                                            <div class="card" id="edit_info" style="display: none;">
                                              <!-- <button type="button" class="bnt btn-primary btn-sm" onclick="edit()">Edit</button> -->
                                              <br>
                                              <div class="row">
                                                  <div class="col">
                                                    <!-- change picture------------------------------------------------------------ -->
                                                    <form class="container small" method="post" action="pim.php" enctype="multipart/form-data">
                                                            <label for="formGroupExampleInput">Change Profile Picture</label>
                                                           <div class="form-row">
                                                            <div class="form-group col-9">
                                                            <input type="file" class="form-control" name="image" required />
                                                        </div>
                                                        <div class="form-group col">
                                                        <button class="btn btn-secondary btn-sm" type="submit" name="change" style="float: right;">Change</button>
                                                        </div>
                                                        </div>                                                        
                                                    </form>
                                                    <!-- ---------------------------------------------------------------------- -->
                                                    <hr class="hr"></hr>
                                                    <form class="container small" method="post" action="pim.php">
                                                        
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                              <label for="inputEmail4">First Name</label>
                                                              <input type="text" class="form-control" id="" placeholder="" name="fname" value="<?php echo $fname; ?>">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                              <label for="inputPassword4">Last Name</label>
                                                              <input type="text" class="form-control" id="" placeholder="" name="lname" value="<?php echo $lname ?>">
                                                            </div>
                                                            </div>
                                                            <div class="custom-control custom-radio custom-control-inline">
                                                              <input type="radio" <?php echo ($gender=='f')?'checked':'' ?> id="female" name="gender" class="custom-control-input" value="f">
                                                              <label class="custom-control-label" for="female">Female</label>
                                                            </div>
                                                            <div class="custom-control custom-radio custom-control-inline">
                                                              <input type="radio" <?php echo ($gender=='m')?'checked':'' ?> id="male" name="gender" class="custom-control-input" value="m">
                                                              <label class="custom-control-label" for="male">Male</label>
                                                            </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                              <label for="">Username</label>
                                                              <input type="text" class="form-control" id="" placeholder="" name="username" value="<?php echo $username; ?>">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                              <label for="inputPassword4">Profession</label>
                                                              <input type="text" class="form-control" id="" placeholder="" name="profession" value="<?php echo $profession; ?>">
                                                            </div>
                                                            </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                              <label for="">Phone number</label>
                                                              <input type="text" class="form-control" id="" placeholder="" name="phone" value="<?php echo $phone; ?>">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                              <label for="inputPassword4">Email</label>
                                                              <input type="email" class="form-control" id="" placeholder="" name="email" value="<?php echo $email; ?>">
                                                            </div>
                                                            </div>
                                                            <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                              <label for="">LinkedIn</label>
                                                              <input type="text" class="form-control" id="" placeholder="" name="linkedin" value="<?php echo $linkedin; ?>">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                              <label for="inputPassword4">Facebook</label>
                                                              <input type="text" class="form-control" id="" placeholder="" name="facebook" value="<?php echo $facebook; ?>">
                                                            </div>
                                                            </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                              <label for="">Twiiter</label>
                                                              <input type="text" class="form-control" id="" placeholder="" name="twitter" value="<?php echo $twitter; ?>">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                              <label for="inputPassword4">Instagram</label>
                                                              <input type="text" class="form-control" id="" placeholder="" name="instagram" value="<?php echo $instagram; ?>">
                                                            </div>
                                                            </div>

                                                        <div class="form-group">
                                                        <button class="btn btn-primary btn-sm" type="submit" name="update" style="float: right;">Update</button>
                                                         </div>
                                                        <!-- <hr class="hr"></hr> -->

                                                  </form>
                                                  </div>
                                              </div>
                                           </div>
                                        </div>
                                   </div>
                               </div>
                           </div>
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


//------------------------------------------------------------
    $('li.collapse li').click(function() {
        $(this).parent().find('li').removeClass('act');
        $(this).addClass('linkactive');
    // $('li').removeClass();
    // $(this).parent().addClass('linkactive');
    });
    //-----------------------------------------------
    // $(document).ready(function () {
    //         $imgSrc = $('#imgProfile').attr('src');
    //         function readURL(input) {

    //             if (input.files && input.files[0]) {
    //                 var reader = new FileReader();

    //                 reader.onload = function (e) {
    //                     $('#imgProfile').attr('src', e.target.result);
    //                 };

    //                 reader.readAsDataURL(input.files[0]);
    //             }
    //         }
    //         $('#btnChangePicture').on('click', function () {
    //             // document.getElementById('profilePicture').click();
    //             if (!$('#btnChangePicture').hasClass('changing')) {
    //                 $('#profilePicture').click();
    //             }
    //             else {
    //                 // change
    //             }
    //         });
    //         $('#profilePicture').on('change', function () {
    //             readURL(this);
    //             $('#btnChangePicture').addClass('changing');
    //             $('#btnChangePicture').attr('value', 'Confirm');
    //             $('#btnChangePicture').attr('name', 'Confirm');
    //             $('#btnDiscard').removeClass('d-none');
    //             // $('#imgProfile').attr('src', '');
    //         });
    //         $('#btnDiscard').on('click', function () {
    //             // if ($('#btnDiscard').hasClass('d-none')) {
    //             $('#btnChangePicture').removeClass('changing');
    //             $('#btnChangePicture').attr('value', 'Change');
    //             $('#btnDiscard').addClass('d-none');
    //             $('#imgProfile').attr('src', $imgSrc);
    //             $('#profilePicture').val('');
    //             // }
    //         });
    //     });

        function show_hide(){
            // document.getElementById('edit_info');
            var x = document.getElementById("edit_info");
              if (x.style.display === "none") {
                x.style.display = "block";
              } else {
                x.style.display = "none";
              }
        }

    </script>

    
    
</body>
</html>