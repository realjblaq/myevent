<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>video test</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<style type="text/css">
		.booth{
			width: 400px;
			background: #ccc;
			border: 10px solid #ddd;
			margin:0 auto;
		}
	</style>
</head>
<body>

	<div class="custom-file">
		<video id="video" width="400" height="300" autoplay></video>
		<canvas id="canvas" width="400" height="300"></canvas>
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