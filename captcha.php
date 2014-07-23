<?php
header('Content-type: image/png');
$code = strtoupper(substr(md5(time()), 0, 5));
session_start();
$_SESSION['captcha'] = $code;
$im = @imagecreate(100, 50) or die("Cannot create image");
$background_color = imagecolorallocate($im, 230, 230, 250);
$text_color = imagecolorallocate($im, 233, 14, 91);
$line_color = imagecolorallocate($im, 255, 255, 255);

imageline($im, 0, 0, 20, 20, $line_color);
imagestring($im, 10, 15, 15, $code, $text_color);
imagepng($im);

