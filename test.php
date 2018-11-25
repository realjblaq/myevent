<!DOCTYPE html>
<html>
<head>
	<title>MYeVENT-Test</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="favicon.png"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap-grid.min.css">
 	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/videopopup.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/flatpickr.css">
</head>
<body>

	<?php 

		$name= $_FILES['file']['name'];

		$tmp_name= $_FILES['file']['tmp_name'];

		$position= strpos($name, ".");

		$fileextension= substr($name, $position + 1);

		$fileextension= strtolower($fileextension);


		if (isset($name)) {

		$path= 'media/';
		if (empty($name))
		{
		echo "Please choose a file";
		}
		else if (!empty($name)){
		if (($fileextension !== "mp4") && ($fileextension !== "ogg") && ($fileextension !== "webm"))
		{
		echo "The file extension must be .mp4, .ogg, or .webm in order to be uploaded";
		}


		else if (($fileextension == "mp4") || ($fileextension == "ogg") || ($fileextension == "webm"))
		{
		if (move_uploaded_file($tmp_name, $path.$name)) {
		echo 'Uploaded!';
		}
		}
		}
		}
	?>


	<form action="" method='post' enctype="multipart/form-data">
		<input type="file" name="file"/>
		<br><br>
		<input type="submit" value="Upload"/>
	</form>
	</form>

	
	




<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/flatpickr.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.js"></script>
<script type="text/javascript" src="js/videopopup.js"></script>

 </body>
</html>