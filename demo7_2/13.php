<?php 
/*
[^]匹配方括号中的任意一个字符
*/
$pattern='/t[^e]st/';
$str='abct@st';
var_dump(preg_match_all($pattern,$str,$arr));
var_dump($arr);
?>