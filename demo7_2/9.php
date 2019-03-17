<?php 
/*
$或\A	匹配字符串的结束位置
*/
$pattern='/test$/';
$str='dwqdtestwqdwqdwqtest';
var_dump(preg_match_all($pattern,$str,$arr));
var_dump($arr);
?>