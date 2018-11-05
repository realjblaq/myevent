<!DOCTYPE html>
<html>
<head>
	<title>MYeVENT-Home</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="favicon.png"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap-grid.min.css">
 	<!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/flatpickr.css">
	
</head>
<body>
	
	


 <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/flatpickr.js"></script>

<script type="text/javascript" src="js/bootstrap.bundle.js"></script>

<input class="pick" data-date-format="Y-m-d"/>

<script type="text/javascript">
	$('.pick').flatpickr({
		enableTime: true,
    dateFormat: "Y-m-d H:i"
	});
</script>

 </body>
</html>