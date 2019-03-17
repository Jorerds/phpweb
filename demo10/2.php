<?php 
    header('Content-type:image/jpeg');
    $img=imagecreatefromjpeg('image/crz1.jpg'); //可传输本地图片地址或者URL地址
    $img_src=imagecreatefrompng('image/logo.png');
    $color_font=imagecolorallocate($img, 255,255,255);
    $widsss=imagesx($img); //图像的长度
    $hieht=imagesy($img); //图像的高度
    $water_width=imagesx($img_src);
    $water_herght=imagesy($img_src);
    $post=imagettfbbox(50, 0,  'font/OctemberScript.ttf', '1024eds.com'); //列出字符串的四个角的坐标
    $whide=$post[2]-$post[0]; //用右下角的x轴的值减去左下角的x轴得出这个字符串的长度
    imagefttext($img, 50, 0, $widsss-1-$whide, $hieht-2, $color_font, 'font/OctemberScript.ttf', '1024eds.com'); //制作文字水印
    /*
      imagecopy($img, $img_src, 100,100, 0, 0, $water_width, $water_herght);//把一张图片拷贝到一张图片上 图片水印
      $img：目标图像资源
      $img_src：水印图像资源
      100：所要拷贝到目标图像资源上的坐标（X轴位置）
      100：所要拷贝到目标图像资源上的坐标（Y轴位置）
      0：从水印图像资源的X坐标为0的位置开始拷贝
      0：从水印图像资源的Y坐标为0的位置开始拷贝
      $water_width：所要拷贝的水印图像的长度
      $water_herght：所要拷贝的水印图像的高度
     */
    imagecopymerge($img, $img_src, 100,100, 0, 0, $water_width, $water_herght,10);//把一张图片拷贝到一张图片上 图片水印(能调节水印透明度)
    imagejpeg($img);
    imagedestroy($img);


?>