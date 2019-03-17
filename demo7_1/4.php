<?php 
/*
元字符：.
	匹配除换行符以外的任意一个字符,如果真的只是想匹配一个普通的.那么在正则表达式的时候请把.使用\来转义
*/
$pattern='/t.st/';
$str="abctests";
var_dump(preg_match_all($pattern, $str,$arr));
var_dump($arr);
?>