<?php
    header('Content-type:text/html;charset=utf-8');
    //var_dump(setcookie('name','奥巴马',time()+3600));
    //var_dump(setcookie('mans[name]','奥巴马',time()+3600)); 多维数组的cookie
    //var_dump(setcookie('memb[sdw]','老王',time()+3600));  多维数组cookie
    $id=uniqid(rand(000,999).'_'); //随机生成一个ID
    var_dump(setcookie('id',$id,time()+3600));

?>