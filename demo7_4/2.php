<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?php 
/*
preg_replace()
参数说明：
	第一个参数：正则表达式
	第二个参数：要替换成的字符串
	第三个参数：目标字符串
	第四个参数(可选)：默认是-1，就是替换所有符合特征部分的！
	第五个参数(可选):你可以放一个变量在这边
*/
$pattern='/<div(.*?)>(.*?)<\/div>/';
$str1='<a$1 href="http://sifangku.com">$2</a>';
$str='dwqdwq<div style="color:red;font-size:25px;">测试成为绯闻绯闻绯闻绯dwqdwqdwq闻cqdwqdqw</div>dqwwdqdwq<div>我是后面那个div</div>';
if(preg_match($pattern, $str,$arr)){
	echo '替换后的：'.preg_replace($pattern, $str1, $str,-1,$count);
	var_dump($count);
}else{
	echo '对不起，没有找到！';
}
echo '<br /><br /><br /><br />';
echo '原来的字符串：'.$str;
?>

</body>

</html>