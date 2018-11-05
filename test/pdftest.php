<?php
include '../config/connection.php';
$filename = '';
if (isset($_POST['upload'])) {

			$targetfolder = "pdffolder/";

			$targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;

			$ok=1;

			$file_type=$_FILES['file']['type'];

			if ($file_type=="application/pdf" || $file_type=="image/gif" || $file_type=="image/jpeg") {

			 if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))

			 {

			 $filename = basename($_FILES['file']['name']);

			 $query = "INSERT INTO test_file (file_name) VALUES ('".$filename."')";
			 mysqli_query($conn,$query);

			echo "The file ". $filename. " is uploaded";
			 }

			 else {

			 echo "Problem uploading file";

			 }

			}

			else {

			 echo "You may only upload PDFs, JPEGs or GIF files.<br>";

			}

				
			}

 
?>


<!DOCTYPE html>
<html>
<head>
	<title>PDF</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
</head>
<body>


	<form action="pdftest.php" method="post" enctype="multipart/form-data">
		<div class="form-group">
					<input type="file"  name="file" size="50" />

		</div>

		<br />

		<input type="submit" value="Upload" name="upload" />

	</form>
</body>
</html>