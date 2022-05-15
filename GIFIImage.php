<?php
// Melde alle PHP Fehler (siehe Changelog)
ini_set("gd.jpeg_ignore_warning", 1);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Ein bestehendes Bild nehmen
$im2 = imagecreatefromgif('killerlegs.gif');


// Hier wäre ein leeres Bild
//$im = imagecreatetruecolor(240, 80);
//$text_color = imagecolorallocate($im, 233, 14, 91);
//$white = imagecolorallocate($im, 255, 255, 255);
//$grey = imagecolorallocate($im, 100, 100, 100);
//$black = imagecolorallocate($im, 0, 0, 0);
//$font = 'C:\xampp\htdocs\fonts\arial.ttf';
// Text in Bild einfügen

$im1 = imagescale($im2 , 1200);
// content type header in HTML5 angeben - in diesem Falle image/jpeg
header('Content-Type: image/jpeg');

// Bild ausgeben
imagepng($im1);

// Speicher wieder freigeben
imagedestroy($im1);
?>