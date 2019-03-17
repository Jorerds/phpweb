<html>
<head>
<meta charset="utf-8">
<title>正则表达式</title>
</head>
<body>
		<?php 
		  $var='/test/';      /*定界符不能是字母、数字和反斜线*/
		  $vsd='adstestsdwtestdsvesstest';
		  var_dump(preg_match_all($var, $vsd,$ard));
		  var_dump($ard);  //变成一个多维数组

		?>
		
		
</body>
</html>