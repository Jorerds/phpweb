<?php 
header('Content-type:text/html;charset=utf-8');
    session_start();
    if (isset($_SESSION['usrname']) && $_SESSION['usrname']==='laowang'){ //检测session是否设置
        echo "欢迎回来{$_SESSION['usrname']}"; //找到session
        echo "<a href='logout.php'>注销</a>";
    }else {
        echo "<a href='login.php'>请前往登录</a>"; //没找到session
    }
?>