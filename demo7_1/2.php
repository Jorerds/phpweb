<?php 
$pattern='/t\sst/';
$str="abct sts";
var_dump(preg_match_all($pattern, $str,$arr));
var_dump($arr);
?>