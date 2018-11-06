<!DOCTYPE html>
<html>
<head>
	<title>fileUploadTest</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
</head>
<body>

					  	<!-- <div class="form-group">
				  		<label for="exampleFormControlTextarea1">Select Event Poster <small>(This helps promote your event better).</small></label>
						<div class="custom-file">
						  <input name="picture_upload" type="file" class="custom-file-input" id="customFile">
						  <label class="custom-file-label" for="customFile">Choose picture...</label>
						</div>
					</div> -->

<script type="text/javascript" src="../js/jquery.js"></script>


					<div class="input-group">
                <label class="input-group-btn">
                    <span class="btn btn-primary">
                        Browse&hellip; <input type="file" style="display: none;" value="yes" multiple>
                    </span>
                </label>
                <input type="text" class="form-control" readonly>
            </div>
            <span class="help-block">
                Try selecting one or more files and watch the feedback
            </span>

            <script type="text/javascript">
            	
            	$(function() {

				  // We can attach the `fileselect` event to all file inputs on the page
				  $(document).on('change', ':file', function() {
				    var input = $(this),
				        numFiles = input.get(0).files ? input.get(0).files.length : 1,
				        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
				    input.trigger('fileselect', [numFiles, label]);
				  });

				  // We can watch for our custom `fileselect` event like this
				  $(document).ready( function() {
				      $(':file').on('fileselect', function(event, numFiles, label) {

				          var input = $(this).parents('.input-group').find(':text'),
				              log = numFiles > 1 ? numFiles + ' files selected' : label;

				          if( input.length ) {
				              input.val(log);
				          } else {
				              if( log ) alert(log);
				          }

				      });
				  });
				  
				});
            </script>
        

</body>
</html>