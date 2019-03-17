<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?php 
/*
preg_match_all()
第四个参数（可选）：
	PREG_PATTERN_ORDER
	PREG_SET_ORDER
	PREG_OFFSET_CAPTURE
第五个参数（可选）：可以传一个值,来表示从目标字符串的哪个位置开始搜索（单位是字节）。
*/
$pattern='/t(.*?)(s)t/';
$str='adwdwqdqwdqwtest      tdqwst     test  tvrgrgrst';
var_dump(preg_match_all($pattern, $str,$arr,PREG_OFFSET_CAPTURE));
var_dump($arr);
?>
</body>

</html>