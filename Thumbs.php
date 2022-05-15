<?php
//gibt direction der Ordner an
$dir =('Bilder/');
$files = scandir($dir);
//prüft ob es Bilder im Ordner hat
if ($files !== false) {
    foreach($files as $f) {
        if ($f == '..' || $f == '.') continue;
        //thumbnails mit 200 px breite
        create_thumb($f,"small_thumbs/",200);
        //bild mit 500px breite
        create_thumb($f,"thumbs/",500);




    }
}

//prüft was füpr ein Bild Typ es ist und fragt die Image Size ab
function create_thumb($file,$export_directory,$new_width){
    global $dir;
    $supported_format = array('gif','jpg','jpeg','png');
    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    if (in_array($ext, $supported_format)){
        $condition = GetImageSize($dir.$file); // image format?




        if($condition[2] == 1) //gif
            $old_image = imagecreatefromgif($dir.$file);
        if($condition[2] == 2) //jpg
            $old_image = imagecreatefromjpeg($dir.$file);
        if($condition[2] == 3) //png
            $old_image = imagecreatefrompng($dir.$file);




        $width  = imagesx($old_image);
        $height = imagesy($old_image);


        //definiert die neuen masse
        $new_height = ceil($height/ ($width/$new_width));
        if($new_width>$width){
            $new_height = $height;
            $new_width = $width;
        }

        $new_image = imagecreatetruecolor($new_width,$new_height );
        // kopiert das Bild in die kleinere Variante
        imagecopyresampled($new_image, $old_image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
        // exportiert das bild ins directory mit filenamen = $file
        imagejpeg($new_image, $export_directory.$file);



    }

}


?>