<?php 
    header('Content-type:text/html;charset=utf-8');
        session_start();

            if (isset($_SESSION['usrname']) && $_SESSION['usrname']==='laowang'){
                session_unset(); //释放所有的会话变量
                session_destroy(); //销毁一个会话中的全部数据
                setcookie(session_name(),'',time()-3600); //销毁一个保存在客户端的卡号(session id)到达了注销效果
                header('Location:skip.php?url=index.php&info=退出成功！');
              
            }else {
                header('Location:skip.php?url=index.php&info=注销失败！');
            }
        
        
?>