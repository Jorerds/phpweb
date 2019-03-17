<?php
/*
元字符：\d
代表0,1,2,3,4,5,6,7,8,9之中的任意一个数字
*/
$pattern='/t\dst/';
$str='abct1sts';
var_dump(preg_match_all($pattern, $str,$arr));
var_dump($arr);


/*
 元字符：\D
除了0,1,2,3,4,5,6,7,8,9之外的任意一个字符

$pattern='/t\Dst/';
$str='abct@sts';
var_dump(preg_match_all($pattern, $str,$arr));
var_dump($arr);
*/


?>