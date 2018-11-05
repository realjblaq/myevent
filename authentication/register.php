<?php 
include '../config/connection.php';
include 'registerproc.php';
?>


<!DOCTYPE html>
<html>
<head>
	<title>MYeVENT-Register</title>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../favicon.png"/>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/fontawesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/login_main.css">
	<link rel="stylesheet" type="text/css" href="../css/login_util.css">
	<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">


	<script type="text/javascript" src="../js/sweetalert.min.js"></script>
</head>
<body>
	<?php echo $message;?>

<script type="text/javascript" src="../js/sweetalert.min.js"></script>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 authwhiterapper">

				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title p-b-26">
						 <h1 class="h1 text-center">Register</h1>
					</span>
					<span class="login100-form-title p-b-48">
						<a href="../index.php"><img src="../img/logo min.png" style="width: 100px;"></a>
					</span>

					<div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
					  </div>
					  <input type="text" class="form-control" placeholder="First Name" aria-label="First Name" aria-describedby="basic-addon1" name="fname" required>
					</div>

					<div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
					  </div>
					  <input type="text" class="form-control" placeholder="Last Name" aria-label="Last Name" aria-describedby="basic-addon1" name="lname" required>
					</div>

					<div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
					  </div>
					  <input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" name="email" required>
					</div>

					<div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1"><i class="fa fa-at"></i></span>
					  </div>
					  <input type="text" class="form-control" placeholder="Type a username." aria-label="Username" aria-describedby="basic-addon1" name="username" required>
					</div>

					<div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
					  </div>
					  <input id="pass1" type="password" class="form-control" placeholder="New Password" aria-label="Password" aria-describedby="basic-addon1" name="pass1" required>
					</div>

					<div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
					  </div>
					  <input  id="pass2" type="password" class="form-control" placeholder="Repeat Password" aria-label="Password" aria-describedby="basic-addon1" name="pass2" required>
					</div>

					<label class="customradio"><span class="radiotextsty">Female</span>
					  <input type="radio" name="gender" value="f" required>
					  <span class="checkmark"></span>
					</label>        
					<label class="customradio"><span class="radiotextsty">Male</span>
					  <input type="radio" name="gender" value="m" required>
					  <span class="checkmark"></span>
					</label>

					<button type="submit" class="btn btn-primary btn-block authbtn" name="register">Register</button>

					
					<div class="text-center">
						<span class="txt1">
							Already have an account?
						</span>

						<a class="txt2" href="login.php" style="color: blue;">
							Sign In
						</a>
					</div>
				</form>

			</div>
		</div>
	</div>
	
	<!-- validate password -->
	<script type="text/javascript">		
		var pass1 = document.getElementById("pass1")
		, pass2 = document.getElementById("pass2");

		function validatePassword(){
		  if(pass1.value != pass2.value) {
		    pass2.setCustomValidity("Passwords Don't Match");
		  } else {
		    pass2.setCustomValidity('');
		  }
		}

		pass1.onchange = validatePassword;
		pass2.onkeyup = validatePassword;
	</script>


<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/sweetalert.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>
</html>