<?php 
/*
 模式修正符 ： s
如果设定了此修正符，那么.将匹配所有的字符包括换行符(\n)
*/

$pattern='/t.st/s';
$str="t\nst";
/*
$str="t
st";//其实在windows里面就等价于$str="t\r\nst"
*/
var_dump(preg_match_all($pattern,$str,$arr));
var_dump($arr);

?>