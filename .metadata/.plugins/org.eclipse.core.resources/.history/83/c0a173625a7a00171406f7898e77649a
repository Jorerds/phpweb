<?php 
    header('Content-type:text/html;charset=utf-8');
            if (isset($_COOKIE['usrname']) && $_COOKIE['usrname']==='laowang'){
                if(setcookie('usrname',$_POST['usrname'],time()-3600)){
                    header('Location:skip.php?url=index.php&info=退出成功！');
              
            }else {
                header('Location:skip.php?url=index.php&info=注销失败！');
            }
        
        }
?>