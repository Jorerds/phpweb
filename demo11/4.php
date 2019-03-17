<?php 
    header('Content-type:text/html;charset=utf-8');
    $file=fopen('test.txt', 'a+');
    if (flock($file, LOCK_EX+LOCK_NB)){ //LOCK_NB意思是不希望在堵塞在加锁 直接放弃返回false
            var_dump(fwrite($file, '末尾'));
            flock($file, LOCK_UN);
            }else {
                echo '上锁失败';
            }
    
?>