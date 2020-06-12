<?php 
header("content-type:image/jpeg");
$width=500;
$height=500;
$img= imagecreatetruecolor($width, $height);
$white=imagecolorallocate($img, 255, 255, 255);
$blue=imagecolorallocate($img, 0, 0, 255);
imagefill($img, 0, 0, $white);
imagefilledpolygon($img, [100,100,0,200,200,200], 3, $blue);
imagejpeg($img);
?>