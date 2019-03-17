<?php
include 'inc/config.inc.php';
include 'inc/mysql.inc.php';
include 'inc/tool.inc.php';
$link=connect();
$urs_id=isLogin($link);
if (!$urs_id){
    skip('index.php','error','您没有登陆！');
}
if (session_id()){
    session_unset(); //释放所有的会话变量
    session_destroy(); //销毁一个会话中的全部数据
    setcookie(session_name(),'',time()-3600); //销毁一个保存在客户端的卡号(session id)到达了注销效果
    skip('index.php','ok','退出成功！');
}
?>