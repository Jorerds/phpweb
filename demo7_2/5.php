<?php
/*
元字符：{n,m}  表示其前面的字符至少出现n次，最多出现m次
*/
$pattern='/te{3,5}st/';
$str='abcteeeeeest';
var_dump(preg_match_all($pattern,$str,$arr));
var_dump($arr);