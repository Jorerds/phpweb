<?php
    /*设置验证码函数*/
    function vcode($width=150,$height=40,$count_elemt=5,$fontpx=30,$count_pixel=100,$count_huxi=3){
        header('Content-type:image/jpeg');
        $ef=array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','v','t','w','z'); //用数组存储验证码的字符串
        $string='';
        for($c=0;$c<$count_elemt;$c++){
            $string.=$ef[rand(0,count($ef)-1)]; //用循环来控制验证码字符串的输出
        }
        $img=imagecreatetruecolor($width, $height); //生成一张图片
        $color_bg=imagecolorallocate($img, rand(180,255), rand(180,255),  rand(180,255));//随机的背景颜色
        $color_di=imagecolorallocate($img, rand(0,150), rand(0,150), rand(0,150));//随机的像素点颜色
        $color_huxi=imagecolorallocate($img, rand(0,100), rand(0,100), rand(0,100));//随机的弧线颜色
        $color_zifu=imagecolorallocate($img, rand(10,90), rand(10,90), rand(10,90)); //随机的字符串颜色
        imagefill($img, 0, 0, $color_bg);
        for ($i=0;$i<$count_pixel;$i++){
            imagesetpixel($img, rand(0,$width-1), rand(0,$height-1), $color_di); //画一个单一的像素点，for循环控制点的数量
        }
        for($b=0;$b<$count_huxi;$b++){
            imagearc($img, rand(0,$width/2), rand(0,$height), $width, $height, rand(0,$width/2), rand($width/2,$width), $color_huxi); //画弧线 for循环控制弧线数量
        }
        //imagestring($img, 5, 50,10,'abcd', $color_zifu);
        imagefttext($img, $fontpx, 10, rand(10,15), rand(50,40), $color_zifu, 'font/Panton-BlackCaps.otf', $string); //调用 FreeType 2 文本来绘制字符串
        imagejpeg($img); //输出图像到浏览器或文件
        imagedestroy($img);
        return $string;
    }