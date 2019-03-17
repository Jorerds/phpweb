<?php 
/*
 .与*配合
 
 .*配合使用默认情况下是 贪婪匹配(尽可能多的去匹配字符)
*/
/*
$pattern='/t.*t/';
$str='abctstdwqdwqdqwdqwdwqtdwqdwqdqwdwqt';
var_dump(preg_match_all($pattern,$str,$arr));
var_dump($arr);
*/

/*
//.*后面加上一个?可以解决贪婪匹配的问题， 懒惰匹配
$pattern='/t.*?t/';
$str='abctstdwqdwqdqwdqwdwqtdwqdwqdqwdwqt';
var_dump(preg_match_all($pattern,$str,$arr));
var_dump($arr);
*/

//.*后面加上一个?可以解决贪婪匹配的问题， 懒惰匹配
$pattern='/1.*?t/';
$str='ab1ctstdwqdwqdq1wdqwdwqtdwqdwqdqwdwqt';
var_dump(preg_match_all($pattern,$str,$arr));
var_dump($arr);



?>