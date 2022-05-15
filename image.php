<?php
// Melde alle PHP Fehler (siehe Changelog)
ini_set("gd.jpeg_ignore_warning", 1);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Ein bestehendes Bild nehmen
$im2 = imagecreatefrompng('wgbs.png');
$im = imagecreatefromjpeg('pixel-jeff-version2.jpg');

// Hier wäre ein leeres Bild
//$im = imagecreatetruecolor(240, 80);
$text_color = imagecolorallocate($im, 233, 14, 91);
$white = imagecolorallocate($im, 255, 255, 255);
$grey = imagecolorallocate($im, 100, 100, 100);
$black = imagecolorallocate($im, 0, 0, 0);
$font = 'C:\xampp\htdocs\fonts\arial.ttf';
// Text in Bild einfügen
imagettftext($im, 50, 0, 600, 700, $white, $font, 'Yannic Schüpbach');
imagettftext($im, 50, 0, 600, 800, $white, $font, 'I2B');
$marge_right = 10;
$marge_bottom = 10;
$stamp = imagescale($im2, 100);
$sx = imagesx($im2);
$sy = imagesy($im2);
imagecopy($im, $stamp, 900, 400, 0, 0, imagesx($stamp), imagesy($stamp));
$im1 = imagescale($im , 1200);
// content type header in HTML5 angeben - in diesem Falle image/jpeg
header('Content-Type: image/jpeg');

// Bild ausgeben
imagepng($im1);

// Speicher wieder freigeben
imagedestroy($im1);

