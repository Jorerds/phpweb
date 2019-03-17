<?php 
/*
模式修正符 ： i
	在和模式进行匹配时不区分大小写
*/
/*
$pattern='/test/i';
$str='       test   TEST  Test  TeSt        ';
var_dump(preg_match_all($pattern,$str,$arr));
var_dump($arr);
*/

/*
 模式修正符 ： m
 多行匹配，如果目标字符串 中没有"\n"字符, 或者模式中没有出现^或$, 设置这个修饰符不产生任何影响
使用条件：
	1)目标字符串中必须包含"\n"
		在字符串中出现"\n"就表示新的一行开始
	2)正则表达式中必须要出现^或者$
学前须知：
	\r:回车符
	\n:换行符
模式修正符m的作用
	多行匹配
	
*/

$pattern='/test\r*$/m';
//$str="test\ntest\ntest\ntest";
$str="test
test
test
test";//$str="test\r\ntest\r\ntest\r\ntest";
/*
$str="test
test
test
test";
//在windows操作系统中你所看到的换行（现象 ）其实是通过两个字符来完成的(\r\n)
//在Linux操作系统中看到的换行（现象），就是通过\n来完成的
*/
var_dump(preg_match_all($pattern,$str,$arr));
var_dump($arr);


?>