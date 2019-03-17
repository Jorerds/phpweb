<?php
/* var_dump($_POST);*/  //用POST来获取表单数据
    
    var_dump($_GET) //用GET用可以获取表单传输，但不安全
    
    
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>预定义超全局数据变量</title>
</head>
<body>
	<!--  <form method="post"> <!--用POST来获取表单数据
		姓名：<input type="text" name='user' /><br />
		性别：<input type="text" name='sex' /><br />   
		<input type="submit" value='提交' />
		</form>   -->
		<form method="get">    <!-- 用GET来获取表单数据  -->
				姓名：<input type="text" name='user' /><br />
				性别：<input type="text" name='sex' /><br />
				<input type="submit" value='提交' />
		</form>
		
</body>
</html>