<?php 
    header('Content-type:text/html;charset=utf-8');
    //var_dump(file_get_contents('test.txt'));
    file_put_contents('test.txt',  file_get_contents('http://www.baidu.com'));
     
?>