<?php
    header('content-type:image/jpeg');  
    $img=imagecreatetruecolor(300,300);  //新建一个真彩色图像
    $color1=imagecolorallocate($img, 154, 221, 45);
    $color2=imagecolorallocate($img, 229, 41, 120);
    imagefill($img, 0, 0, $color1);
    imagejpeg($img);
    imagedestroy($img);



?>