<?php 
	include '../config/connection.php';
	session_start();
	$error = '';

	if (isset($_POST['login'])) {
		if (empty($_POST['username']) || empty($_POST['pass'])) {
			$error = "<p style='color:red;'>Username or Password is invalid</p>";
		}else{
			$username = $_POST['username'];
			$pass = $_POST['pass'];
			$pass = md5($pass);
			
			// $email = stripcslashes($email);
			// $pass = stripcslashes($pass);
			// $email = mysqli_real_escape_string($email);
			// $pass = mysqli_real_escape_string($pass);

			$query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' AND password = '$pass' ");
			$rows = mysqli_num_rows($query);
			if ($rows>0) {
				// if (!empty($query)) {
					while ($list = mysqli_fetch_assoc($query)) {
						$_SESSION['uid'] = $list['uid'];
						header('Location: ../profile/profile.php');
					}
				// }
			}
			else{
				$error = "<p style='color:red;'>Username or Password is invalid!</p>";
			}
			
			// $rows = mysqli_num_rows($query);
			// if ($rows==1) {
			// 	$_SESSION['email'] = $email;
			// 	header('Location: ../profile/profile.php');
			// }else{
			// 	$error = "<p style='color:red;'>Username or Password is invalid</p>";
			// }

			mysqli_close($conn);

		}
	}
?>