<!-- 跳转公共函数 -->
<?php
    function skip($url,$pic,$mess){

        $html=<<<A
        <!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="refresh" content="3;URL={$url}" />
    <title>正在跳转</title>
    <link rel="stylesheet" type="text/css" href="style/css/remind.css" />
</head>
<body>
        <div class="notice"><span class="pic {$pic}"></span> {$mess}3秒后自动跳转！<br>
            <a href="{$url}">点击无需等待直接跳转</a>
        </div>
</body>
</html>

A;

    echo $html;
    exit();
    }
    /*设置登录的session检测*/
    function isLogin($link){
        if (isset($_SESSION['urs_name']) && isset($_SESSION['password'])){
            $query="SELECT * FROM  member WHERE  urs_name='{$_SESSION['urs_name']}' AND sha1(password)='{$_SESSION['password']}'";
            $result=execute($link,$query);
            if (mysqli_num_rows($result)==1){
                $data=mysqli_fetch_assoc($result);
                return $data['id'];
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

?>