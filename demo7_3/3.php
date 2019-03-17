<?php 
/*
 模式修正符 ： U
禁止贪婪匹配
*/

$pattern='/a.*f/U';//等价于$pattern='/a.*?f/';
$str='      adwqdwqdwqdwqwf    aveegregregef';
var_dump(preg_match_all($pattern,$str,$arr));
var_dump($arr);


//模式修正符是可以多个搭配使用的
$pattern='/a.*f/Ui';
$str='      Adwqdwqdwqdwqwf    aveegregregef';
var_dump(preg_match_all($pattern,$str,$arr));
var_dump($arr);
?>