<?php
/*
元字符：+
	匹配1次或多次其前面的字符
	放在+前面的那个字符可以出现1次，也可以出现多次
*/
$pattern='/te+st/';
$str='abctst';//+代表前面的字符出现1次或者多次，但是不能不出去，很显然我们这边一次都没有出现，我们没有匹配到符合特征的!
var_dump(preg_match_all($pattern,$str,$arr));
var_dump($arr);