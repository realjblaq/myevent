<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript">
	
	var addEvent = '<p>Add event</p>';
	var editEvent = '<p>Edit event</p>';
	var myEvent = '<p>My event</p>';

	$('#addEvent').on('click',function(){
		$('#contentChange').html(addEvent).show();
	}); 

	$('#editEvent').on('click',function(){
		$('#contentChange').html(editEvent).show();
	}); 	

	$('#myEvents').on('click',function(){
		$('#contentChange').html(myEvent).show();
	}); 

</script>