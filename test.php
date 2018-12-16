  <?php
/**
 * QR Code + Logo Generator
 *
 * http://labs.nticompassinc.com
 */
$data = isset($_GET['data']) ? $_GET['data'] : 'localhost/myevent/index.php';
$size = isset($_GET['size']) ? $_GET['size'] : '200x200';
$logo = isset($_GET['logo']) ? $_GET['logo'] : 'img/logo_min.png';
header('Content-type: image/png');
// Get QR Code image from Google Chart API
// http://code.google.com/apis/chart/infographics/docs/qr_codes.html
$QR = imagecreatefrompng('https://chart.googleapis.com/chart?cht=qr&chld=H|1&chs='.$size.'&chl='.urlencode($data));
if($logo !== FALSE){
  $logo = imagecreatefromstring(file_get_contents($logo));
  $QR_width = imagesx($QR);
  $QR_height = imagesy($QR);
  
  $logo_width = imagesx($logo);
  $logo_height = imagesy($logo);
  
  // Scale logo to fit in the QR Code
  $logo_qr_width = $QR_width/3;
  $scale = $logo_width/$logo_qr_width;
  $logo_qr_height = $logo_height/$scale;
  
  imagecopyresampled($QR, $logo, $QR_width/3, $QR_height/3, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);
}
imagepng($QR);
imagedestroy($QR);
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
  


 

</body>

</html>
