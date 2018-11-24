<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>video test</title>
	<style type="text/css">
		.booth{
			width: 400px;
			background: #ccc;
			border: 10px solid #ddd;
			margin:0 auto;
		}
	</style>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">

	<link rel="stylesheet" type="text/css" href="../css/cardinal.css">
</head>
<body>

	<!-- <div class="custom-file">
		<video id="video" width="400" height="300" autoplay></video>
		<canvas id="canvas" width="400" height="300"></canvas>
	</div> 
	<br> <br> -->

<div class="row" style="padding: 50px; text-align: center;">
	<div class="col" style="text-align: center;">
		<div style="display: inline-block;">
			<img src="../img/career.png">
		</div>
	</div>
	<div class="col" style="padding-top: 70px;">
		<h1 class="h1">TrueYou Inc.</h1>
		<code>
		<p style="color: #00b7c6; ">[__Find your career path__]</p>
		<p style="color: #00b7c6; ">[__Know your love language__]</p>
		<p style="color: #00b7c6; ">[__Know your personality__]</p>
		</code>

		<div class="row" style="text-align: justify; padding: 20px;">
			<p>Timbirds Incorporation is a mobile applicaton that is built to predict an individuals personality , love language and it also predicts your career path. The application test you in oder to predict who you are. download the app for best experience on job selection.</p>
		<form class="form-group">
			
		</div>
			<label>Enter your name to find your career path!</label>
			<input class="form-control" type="text" placeholder="Your name here"></input>
			<br>
			<button class="btn" style="background-color: #4f2170; color: white;">My Career Path</button>
		</form>
	</div>

	
</div>













<script type="text/javascript" src="../js/jquery.js"></script>

<script type="text/javascript">
	(function(){
		var video = document.getElementById('video'), 
		vendorUrl = window.URL || window.webkitURL;

		navigator.getMedia =	navigator.getUserMedia ||
								navigator.webKitGetUserMedia ||
								navigator.mozGetUserMedia ||
								navigator.msGetUserMedia;

		//capture video
		navigator.getMedia({
			video: true,
			audio: true
		}, function(stream){
			video.src = vendorUrl.createObjectURL(stream);
			video.play();
		}, function(error){
			//an error occured
			//error.code
		});

	});
</script>
</body>
</html>