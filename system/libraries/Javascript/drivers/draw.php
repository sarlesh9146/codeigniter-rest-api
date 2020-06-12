<?php
header("Content-type: image/png");
$img_width = 600;
$img_height = 600;
 
$img = imagecreatetruecolor($img_width, $img_height);
$white = imagecolorallocate($img, 255, 255, 255);
$blue  = imagecolorallocate($img, 0, 0, 255);
imagefill($img, 0, 0, $white);
 
//imagepolygon($img, [100, 100, 0, 200, 50, 300,150,300,200,200], 5, $blue);
imagefilledpolygon($img, [$img_width*5/10, $img_height*1/10, $img_width*4/10, $img_height*2/10, $img_width*4.5/10, $img_height*3/10, $img_width*5.5/10, $img_height*3/10, $img_width*6/10, $img_height*2/10], 5, $blue);
imagepng($img);
?>