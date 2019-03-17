<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?php
/*
preg_match()
执行一个正则表达式匹配
参数说明：
	第一个参数:正则表达式
	第二个参数：目标字符串
	第三个参数（可选）：放一个变量，执行完成之后，里面会有匹配到的部分以及等等一些数据！
	第四个参数（可选）：可以传PREG_OFFSET_CAPTURE进入(那么第三个参数那个变量里面的数据就会有匹配到的部分的偏移值)，默认传的是0
	第五个参数（可选）：可以传一个值,来表示从目标字符串的哪个位置开始搜索（单位是字节）。
*/
$pattern='/t(.*?)st/';
$str='adwdwqdqwdqwtest      tdqwst     test  tvrgrgrst';
var_dump(preg_match($pattern, $str,$arr));
var_dump($arr);
if(preg_match($pattern, $str,$arr,PREG_OFFSET_CAPTURE)){
	echo '找到啦！<br />';
	var_dump($arr);
}else{
	echo '没找到！';
}

?>
</body>
</html>