<?php 
/*
[]匹配方括号中的任意一个字符
*/
$pattern='/t[abcde]st/';
$str='dwqdwtestqdqwtastdwqdwqdwqdwqtbst';
var_dump(preg_match_all($pattern,$str,$arr));
var_dump($arr);
?>