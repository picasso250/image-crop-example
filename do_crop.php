<?php
if(isset($_POST['crop_image']))
{
  $y1=$_POST['top'];
  $x1=$_POST['left'];
  $w=$_POST['width'];
  $h=$_POST['height'];
  $image="images/timg.jpg";

  list( $width,$height ) = getimagesize( $image );
  $newwidth = 720;
  $newheight = 405;

  $im = imagecreatefromjpeg($image);
  $dest = imagecreatetruecolor($newwidth,$newheight);

  imagecopyresampled($dest,$im,0,0,$x1,$y1,$newwidth,$newheight,$w,$h);
  imagejpeg($dest,"images/crop_image.jpg", 100);

  // header("content-type:image/jpeg");
  // readfile("images/crop_image.jpg");
  echo "images/crop_image.jpg"."?t=$x1+$y1+$w+$h";
}
