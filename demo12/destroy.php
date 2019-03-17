<?php 
   
    /*用遍历数组的方式可以进行一次删除多条cookie*/
    foreach ($_COOKIE['name'] as $key=>$val){
        var_dump(setcookie("name[{$key}]",'',time()-3600));
    }
?>