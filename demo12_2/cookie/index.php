<?php 
header('Content-type:text/html;charset=utf-8');
    if (isset($_COOKIE['usrname']) && $_COOKIE['usrname']==='laowang'){ //检测cookie是否设置
        echo "欢迎回来{$_COOKIE['usrname']}"; //找到cookie
        echo "<a href='logout.php'>注销</a>";
    }else {
        echo "<a href='login.php'>请前往登录</a>"; //没找到cookie
    }
?>