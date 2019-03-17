<?php
/*
\w：匹配任意一个 字母或者数字或者下划线
*/
$pattern='/t\wst/';
$str="abct3sts";
var_dump(preg_match_all($pattern, $str,$arr));
var_dump($arr);
?>