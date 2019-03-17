<?php
if (empty($_POST['urs_name'])){
    skip('login.php','error','用户名不得为空！');
}
if (mb_strlen($_POST['urs_name'])>20){
    skip('login.php','error','用户名不存在！');
}
if (empty($_POST['password'])){
    skip('login.php','error','密码不能为空！');
}
if (strtolower($_POST['vcode'])!=strtolower($_SESSION['vcode'])){
    skip('login.php','error','验证码不正确！');
}
if (empty($_POST['lifeTime']) || is_numeric($_POST['lifeTime']) || $_POST['lifeTime']>2592000){
    $_POST['lifeTime']=2592000;
}
