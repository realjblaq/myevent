<?php
header('Content-Type: image/png');
  require 'vendor/autoload.php';
  use Endroid\QrCode\QrCode;
if (isset($_POST['submit'])) {
   

  $qrcode = new QrCode(urldecode('http://www.google.com'));

  $targetfolderp = "../media/files/";
    $targetfolderp = $targetfolderp . basename( $_FILES['fileToUpload']['name']) ;
    $filename = basename( $_FILES['fileToUpload']['name']);

  if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $targetfolderp)){
  echo $qrcode->writeString();
  }
  die();
 
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <title>Document</title>
</head>

<body>
  

<form method="post">
 <input type="file" name="fileToUpload"/>
 <input type="submit" name="submit">
 </form>

</body>

</html>
