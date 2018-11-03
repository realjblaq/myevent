<?php 
	include('loginproc.php'); // Includes Login Script

	if(isset($_SESSION['uid'])){
	header("location: ../profile/profile.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>MYeVENT-Login</title>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../favicon.png"/>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/fontawesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/login_main.css">
	<link rel="stylesheet" type="text/css" href="../css/login_util.css">
	<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">

</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				
				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title p-b-26">
						 <h1 class="h1 text-center">Login</h1>
						 <p >Please login with your <strong style="color: green;">username</strong>  and <strong style="color: green;">password</strong>.</p>
					</span>
					<span class="login100-form-title p-b-48">
						<a href="../index.php"><img src="../img/logo min.png" style="width: 100px;"></a>
					</span>

					<?php echo $error; ?>

					<div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
					  </div>
					  <input type="text" class="form-control" placeholder="User name" aria-label="Username" aria-describedby="basic-addon1" required name="username">
					</div>

					<div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
					  </div>
					  <input type="Password" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1" required name="pass">
					</div>

					<button type="submit" name="login" class="btn btn-primary btn-block authbtn" style="margin-bottom: 50px;">Login</button>

					
					<div class="text-center">
						<span class="txt1">
							Don’t have an account?
						</span>

						<a class="txt2" href="register.php" style="color: red;">
							Sign Up
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	


<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>