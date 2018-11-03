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

			$sql = "INSERT INTO users (fname, lname, email, password, gender)
	   	 	VALUES ('".$fname."','".$lname."','".$email."',md5('".$pass1."'),'".$gender."')";

	    	$result = mysqli_query($conn,$sql);

	   		if ($result) {

	   			$message = '<script type="text/javascript">
								setTimeout(function () {
									swal("Good job!","You have registered.","success").then( function(val) {
										if (val == true) window.location.href = \'../authentication/login.php\';
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

// $firstname = '';
// 	//login page
// 	if (isset($_POST['login'])){

// 		$loginmessage = '';
// 		$lemail = $_POST['email'];
// 		$lpass = $_POST['pass'];

// 		$lpass = md5($lpass);
// 		$lsql = "SELECT uid FROM users WHERE email = '$lemail' AND password = '$lpass'";

// 		$result = mysqli_query($conn, $lsql);

// 		if ($result) {
// 			while ($arr = mysqli_fetch_array($result)) {
// 				$loginmessage =  "Login successfull";
// 			}
// 		}

// 		$row = mysqli_num_rows($result);
// 		if (!$row) {
// 			$loginmessage =  "Invalid login details!";
// 		}

		// $result = $conn->query($lsql);

		// if ($result->num_rows > 0) {
		//     // output data of each row
		//     while($row = $result->fetch_assoc()) {
		//     	$firstname = $row["fname"];

		//     	$_SESSION['firstname'] = $firstname;
		// 		header('Location:../index.php');
		      
		//     }
		// }else{
		// 	$firstname = "Nothing.";
		// }


		// $result = mysqli_query($conn,$lsql);

		// $firstname = mysql_result($result, 1); 

		// while($row = mysql_fetch_array($result, MYSQL_ASSOC)) { 
		// 	$firstname = $row['fname']; 
			// $_SESSION['firstname'] =$firstname;
		// 	//$place .= $row['place']; 
		// 	//Instead of the above run a query using the $row array. 
		// }  

		// if (mysqli_num_rows($result)==1) {
		// 	$_SESSION['firstname'] = $firstname;
		// 	$_SESSION['test'] = "nothing inside";
		// 	header('Location:../index.php');
		// }else{
		// 	$message = '<p style="color:red; margin-bottom:10px;">Wrong email or password!</p>';
		// }

// 	}else{
// 				header("location: ../authentication/login.php");

// 		$loginmessage = "Wrong login details!";
// 	}
// ?>