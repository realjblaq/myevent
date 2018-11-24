<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no"/>
		<meta name="description" content="Rubik’s Cube">
		<meta name="keywords" content="Erno Rubik’s Cube">

		<link rel="stylesheet" type="text/css" href="../css/cardinal.css">
	</head>
	<body>
			        <!-- message body -->
					        <p>Just Hit the start button and follow the lead of Janji</p>
					        <button class="btn btn-round btn-primary" id="yellowcross">Begin Puzzle</button>
					        <button class="btn btn-round btn-primary" id="button-shuffle">Scramble</button>
							
							<!-- variable content -->
							<div id="contentChange"> </div>

							<br>
       						
       						<div id="btns" style="display: none;">
       							<button class="btn btn-round btn-primary" id="y_yc" style="margin-right: 5px;">Yes</button>
       							<button class="btn btn-round btn-primary" id="n_yc">No</button>       							
       						</div>
       						
       						<br>
       						<div id="contentChange2"> </div>
		<!-- javascript -->
		<script type="text/javascript" src="../js/jquery.js"></script>

		<!-- javascript for content change -->
		<script type="text/javascript">

							var yellowcross = '<p><div><img src="../img/career.png" width="200"></div>You begin solving the cube by creating a yellow cross...<br><br>yellow cross present?</p><br>';
							var y_yc = '<p>Now solving for the yellow corners</p>';
							var another = '<p>another one</p>';
							var y=0;

							$('#yellowcross').on('click',function(){
								$('#contentChange').html(yellowcross).show();
								document.getElementById('btns').style.display ='flex';
								y=1;

							});

							$('#y_yc').on('click',function(){
								$('#contentChange').html(y_yc).show();
								y = 2;
							});




							// function showPriceInput(){
							//   document.getElementById('priceInput').style.display ='flex';
							// }

							// $('#addEvent').on('click',function(){
							// 	$('#contentChange').html(addEvent).show();
							// });

							// $('#myEvent').on('click',function(){
							// 	$('#contentChange').html(myEvent).show();
							// });

		</script>
	</body>
</html>		