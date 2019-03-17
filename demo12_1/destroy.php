<?php 
    session_start();
    session_unset(); //释放所有的会话变量
    session_destroy(); //销毁一个会话中的全部数据
    setcookie(session_name(),'',time()-3600,'/'); //销毁一个保存在客户端的卡号(session id)
?>