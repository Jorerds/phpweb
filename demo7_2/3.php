<?php
/*
元字符：{n}  n代表自己写的一个数字
	表示其前面字符恰好出现n次
	放在{n}前面的那个字符正好出现n次
*/
$pattern='/te{3}st/';
$str='abcteeest';
var_dump(preg_match_all($pattern,$str,$arr));
var_dump($arr);