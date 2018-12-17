<?php
include 'config/connection.php';
if (isset($_POST['change'])) {

    $name = $_FILES['image']['name'];
     $target_dir = "media/profile_pictures/";
     $target_file = $target_dir . basename($_FILES["image"]["name"]);

     // Select file type
     $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

     // Valid file extensions
     $extensions_arr = array("jpg","jpeg","png","gif");

     // Check extension
     if( in_array($imageFileType,$extensions_arr) ){
     
      // Insert record
      $query = "UPDATE users SET profile_pic='$name' WHERE uid=72";
      mysqli_query($conn,$query);
      
      // Upload file
      move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$name);

     }
}

$sql = "select profile_pic from users where uid=72";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

$image = $row['profile_pic'];
$image_src = "media/profile_pictures/".$image;


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <title>Test</title>
</head>

<body>
  
<form class="container small" method="POST" action="test.php" enctype="multipart/form-data">
<label for="formGroupExampleInput">Change Profile Picture</label>
<div class="form-row">
  <div class="form-group col-9">
    <input type="file" class="form-control" name="image" required />
  </div>
  <div class="form-group col">
    <input class="btn btn-secondary btn-sm" type="submit" name="change" />
  </div>
</div>                                                        
</form>

<!-- <form action="test.php" method="POST" enctype="multipart/form-data">
    <label>File: </label><input type="file" name="image" />
    <input type="submit"  name="save" />
</form> -->

<br><br>
<img src='<?php echo $image_src;  ?>' width="200">

 

</body>

</html>
