<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?php 
/*
preg_replace第一个参数与第二个参数传数组，一一对应的去替换！
*/
$pattern=array(
		'/<div(.*?)>(.*?)<\/div>/',
		'/<p(.*?)>(.*?)<\/p>/'
);
$str1=array(
		'<a$1 href="http://sifangku.com">$2</a>',
		'<span$1>我是span标签啦！$2</span>'
);
$str='dwqdwq<div style="color:red;font-size:25px;">测试成为绯闻绯闻绯闻</div><p>asdawd</p>dwd<div>我是后面那个div</div>';

echo '替换后的：'.preg_replace($pattern, $str1, $str,-1,$count);
var_dump($count);
echo '<br /><br /><br /><br />';
echo '原来的字符串：'.$str;
?>
</body>
</html>