<!DOCTYPE html>
<html>
<head>
	<title>jquery</title>
	<link rel="stylesheet" type="text/css" href="../css/cardinal.css">
</head>
<body>

<main class="main" style="text-align: center;">
	<header id="head" style="cursor: pointer;">
		Something Down
	</header>
	<div class="content" style="background-color: grey; border-radius: 5px; color: white; display: none;">
		<ul>
				<a href=""><li>You</li>	</a>
				<a href=""><li>Are</li></a>	
				<a href=""><li>Sliding</li></a>	
				<a href=""><li>Down</li></a>	
		</ul>
	</div>
	<div>Something else</div>
</main>

<script type="text/javascript" src="../js/jquery.js"></script>

<script type="text/javascript">
	
	$(document).ready(function(){

			$('#head').click(function(){

					$('.content').slideToggle(500);
					$('content ul a').css('text decoration', 'none');
			});

	});

</script>


</body>
</html>