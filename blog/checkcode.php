<?php
session_start();
$image_width=100;
$image_height=40;
$word1 = 'qwertyuiopasdfghjklzxcvbnm';
$word2 = strtoupper($word1);
$word3 = '0123456789';
$word = $word1.$word2.$word3;
$number = "";
for($i=0;$i<4;$i++)
{
    $number.=$word[rand(0,61)];
}
$_SESSION['checkcode']=strtoupper($number);
$image=imagecreate($image_width, $image_height);
imagecolorallocate($image, 255, 255, 235);
for($i=0;$i<200;$i++)
{
    $x = rand(0, $image_width);
    $y = rand(0,$image_height);
    $color = imagecolorallocate($image, rand(0,255), rand(0,255), rand(0,255));
    imagesetpixel($image, $x, $y, $color);
}
for($i=0;$i<4;$i++)
{
    $color = imagecolorallocate($image, rand(0,100), rand(0,100), rand(0,100));
    imageline($image, rand(0,$image_width), rand(0,$image_height), rand(0,$image_width), rand(0,$image_height), $color);
    $color1[] = $color; 
}

for($i=0;$i<4;$i++)
{
    $x=15+21*$i;
    $y=30;
    imagettftext($image, 18,rand(0,60), $x, $y,$color1[$i],'./MSYHBD.TTC', $number[$i]);
}
imagerectangle($image, 0, 0, $image_width-1, $image_height-1, $color);
header("content-type:image/png");
imagepng($image);
imagedestroy($image);
?>