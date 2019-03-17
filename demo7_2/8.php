<?php 
/*
^或\A	匹配字符串开始位置
*/
$pattern='/^test/';
$str='testabc';
var_dump(preg_match_all($pattern,$str,$arr));
var_dump($arr);
?>