<?php
header('Content-type:text/html;charset=utf-8');
    if (isset($_COOKIE['usrname']) && $_COOKIE['usrname']==='laowang'){ //检测cookie是否设置 不要重复登陆
        //exit('您已经登陆成功了 请不要重复登陆'); //找到cookie
        header('Location:skip.php?url=index.php&info=您已经登陆成功了 请不要重复登陆！'); 
    }else {
    if (isset($_POST['submit'])) { //检测登录按钮变量是否存在
        if (isset($_POST['usrname']) && isset($_POST['password'])) { //检测用户名和密码变量是否存在
            if ($_POST['usrname']==='laowang' && $_POST['password']==='123456'){ //检测用户名和密码是否错误
                if(setcookie('usrname',$_POST['usrname'],time()+3600)){ //设置cookie存储
                        header('Location:skip.php?url=index.php&info=登录成功！'); //设置登录完成转跳页面
                }else {
                    echo 'cookie设置失败';
                }
            }else {
                   header('Location:skip.php?url=index.php&info=用户名或者密码失败！');
                 }
            
        }
    
    }
    }
?>

<html>
<head>
<meta charset="utf-8">
<title>登录模块</title>
</head>
<body>

<form method="post" action="login.php" >
		用户名：<input type="text" name="usrname" /><br />
		密&nbsp&nbsp&nbsp&nbsp码：<input type="password" name="password" /><br />
		<input type="submit" name="submit" value="登录" />
		</form>
</body>
</html>