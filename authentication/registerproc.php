<?php 

session_start();

	// register page
	$message = '';
	$passerror = '';
	if(isset($_POST['register']))
	{
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$email = $_POST['email'];
			$pass1 = $_POST['pass1'];
			$pass2 = $_POST['pass2'];
			$gender = $_POST['gender'];
			$username = $_POST['username'];

			$sql = "INSERT INTO users (fname, lname, email, username, password, gender)
	   	 	VALUES ('".$fname."','".$lname."','".$email."','".$username."',md5('".$pass1."'),'".$gender."')";

	    	$result = mysqli_query($conn,$sql);

	   		if ($result) {

	   			$message = '<script type="text/javascript">
								setTimeout(function () {
									swal("Good job!","You have registered.","success").then( function(val) {
										if (val == true) window.location.href = \'login.php\';
									});
								}, 200);  
							</script>';
			}
			else
			{
				$message = "<script type='text/javascript'>swal('Error!', 'something!', 'error')</script>";		   
			}
	}
	else{
			$passerror = '<p style="color: red; margin-bottom: 5px;">Failed. Passwords do not match!</p>';		   
		}
?>